<?php

namespace App\Http\Controllers;

use App\Models\ContactQuery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'min:2', 'max:190'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        ContactQuery::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? '',
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return back()->with('success', 'Your message has been sent successfully! We will get back to you shortly.');
    }
}