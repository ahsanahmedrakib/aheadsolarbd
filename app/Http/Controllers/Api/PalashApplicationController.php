<?php

namespace App\Http\Controllers\Api;

use App\Models\PalashApplication;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class PalashApplicationController extends BaseApiController
{
    private const PHONE_REGEX = '/^[+]?[0-9\s\-()]{7,20}$/';

    public function index(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }
        $applications = PalashApplication::orderBy('created_at', 'desc')->get();
        return $this->ok($applications);
    }

    public function store(Request $request): JsonResponse
    {
        $ip = $this->ip($request);
        if (RateLimiter::tooManyAttempts('palash:' . $ip, 5)) {
            return $this->error('Too many requests. Please try again later.', 429);
        }
        RateLimiter::hit('palash:' . $ip, 15 * 60);

        $data = $request->json()->all();
        $fullName = trim((string) ($data['fullName'] ?? ''));
        $businessName = trim((string) ($data['businessName'] ?? ''));
        $mobile = trim((string) ($data['mobile'] ?? ''));
        $whatsapp = trim((string) ($data['whatsapp'] ?? ''));
        $email = trim((string) ($data['email'] ?? ''));
        $district = trim((string) ($data['district'] ?? ''));
        $thana = trim((string) ($data['thana'] ?? ''));
        $address = trim((string) ($data['address'] ?? ''));
        $services = is_array($data['services'] ?? null) ? $data['services'] : [];
        $hasBusiness = $data['hasBusiness'] ?? null;
        $experienceYears = trim((string) ($data['experienceYears'] ?? ''));
        $space = $data['space'] ?? null;
        $comments = trim((string) ($data['comments'] ?? ''));

        if (mb_strlen($fullName) < 2) {
            return $this->error('Full name must be at least 2 characters');
        }
        if (!preg_match(self::PHONE_REGEX, $mobile)) {
            return $this->error('Invalid mobile number');
        }
        if ($whatsapp !== '' && !preg_match(self::PHONE_REGEX, $whatsapp)) {
            return $this->error('Invalid WhatsApp number');
        }
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->error('Invalid email address');
        }
        if (mb_strlen($district) < 2) {
            return $this->error('District is required');
        }
        if (mb_strlen($thana) < 2) {
            return $this->error('Thana / Upazila is required');
        }
        if (mb_strlen($address) < 5) {
            return $this->error('Full address is required');
        }
        if (count($services) === 0) {
            return $this->error('Select at least one dealership interest');
        }
        if (!in_array($hasBusiness, ['yes', 'no'], true)) {
            return $this->error('Please select whether you have an existing business');
        }
        if (!in_array($space, ['own', 'rented', 'looking'], true)) {
            return $this->error('Please select your facility status');
        }

        $message = implode("\n", [
            'Business/Shop Name: ' . ($businessName ?: '-'),
            'Mobile: ' . $mobile,
            'WhatsApp: ' . ($whatsapp ?: '-'),
            'Email: ' . ($email ?: '-'),
            'District: ' . $district,
            'Thana/Upazila: ' . $thana,
            'Full Address: ' . $address,
            'Dealership Interest: ' . implode(', ', $services),
            'Existing Business: ' . ($hasBusiness === 'yes' ? 'Yes' : 'No (new investor)'),
            'Years of Experience: ' . ($experienceYears ?: '-'),
            'Facility Status: ' . $space,
            'Additional Comments: ' . ($comments ?: '-'),
        ]);

        $application = PalashApplication::create([
            'full_name' => $fullName,
            'business_name' => $businessName,
            'mobile' => $mobile,
            'whatsapp' => $whatsapp,
            'email' => $email,
            'district' => $district,
            'thana' => $thana,
            'address' => $address,
            'services' => $services,
            'has_business' => $hasBusiness,
            'experience_years' => $experienceYears,
            'space' => $space,
            'comments' => $comments,
            'status' => 'new',
            'raw_message' => $message,
        ]);

        return $this->ok($application);
    }

    public function update(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        $id = $data['id'] ?? null;
        if (!$id) {
            return $this->error('ID is required');
        }

        $application = PalashApplication::find($id);
        if (!$application) {
            return $this->error('Application not found', 404);
        }

        foreach (['status', 'notes'] as $key) {
            if (array_key_exists($key, $data)) {
                $application->{$key} = $data[$key];
            }
        }
        $application->save();

        return $this->ok($application);
    }

    public function destroy(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $id = $request->query('id');
        if (!$id) {
            return $this->error('Missing ID parameter');
        }

        PalashApplication::find($id)?->delete();
        return $this->ok();
    }
}