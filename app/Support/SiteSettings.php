<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SiteSettings
{
    public const HARDCODED_FIELD_IDS = [
        'company-name',
        'site-logo',
        'admin-logo',
        'site-favicon',
    ];

    public const DEFAULT_SECTIONS = [
        'general' => [
            'brand-tagline' => 'Empowering Your Clean Energy Future',
            'contact-email' => 'info@aheadsolarbd.com',
            'phone-number' => '+88 01335 127 300',
            'hq-address' => 'House 12, Road 7, Sector 11, Uttara, Dhaka 1230',
        ],
        'chat-widgets' => [
            'whatsapp-number' => '+8801712947551',
            'whatsapp-message' => 'Hello Ahead Solar, I would like to inquire about solar energy solutions.',
            'messenger-username' => '61591154285690',
            'facebook-url' => 'https://www.facebook.com/profile.php?id=61591154285690',
            'linkedin-url' => 'https://www.linkedin.com/company/ahead-solar-ltd/',
            'youtube-url' => '',
        ],
        'seo' => [
            'meta-title' => 'Ahead Solar - Leading Renewable Energy Solutions',
            'meta-desc' => 'Top-rated solar panel installation, battery storage, and maintenance for residential and commercial properties.',
            'meta-keywords' => 'solar panels, green energy, battery storage, renewable energy, solar installation',
        ],
        'social' => [
            'social-fb' => 'https://www.facebook.com/profile.php?id=61591154285690',
            'social-x' => '',
            'social-li' => 'https://www.linkedin.com/company/ahead-solar-ltd/',
            'social-ig' => '',
            'social-youtube' => '',
            'google-map' => ' https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3393.9947761658013!2d90.39066177501897!3d23.87729687858403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5003133f351%3A0xc57cc5d4675738ff!2sAhead%20Center!5e1!3m2!1sen!2sbd!4v1784135178921!5m2!1sen!2sbd',
        ],
    ];

    public static function getSections(): array
    {
        $setting = Setting::first();
        return $setting?->sections ?? [];
    }

    public static function field(string $sectionId, string $fieldId): string
    {
        $sections = self::getSections();
        foreach ($sections as $section) {
            if (($section['id'] ?? null) === $sectionId) {
                foreach ($section['fields'] ?? [] as $field) {
                    if (($field['id'] ?? null) === $fieldId) {
                        return (string) ($field['value'] ?? '');
                    }
                }
            }
        }
        return self::DEFAULT_SECTIONS[$sectionId][$fieldId] ?? '';
    }

    public static function toggle(string $sectionId, string $toggleId, bool $default = false): bool
    {
        $sections = self::getSections();
        foreach ($sections as $section) {
            if (($section['id'] ?? null) === $sectionId) {
                foreach ($section['toggles'] ?? [] as $toggle) {
                    if (($toggle['id'] ?? null) === $toggleId) {
                        return (bool) ($toggle['checked'] ?? $default);
                    }
                }
            }
        }
        return $default;
    }

    public static function all(array $defaults): array
    {
        return $defaults;
    }

    public static function stripHardcodedFields(array $sections): array
    {
        return array_map(function ($section) {
            $fields = array_values(array_filter($section['fields'] ?? [], function ($field) {
                return !in_array($field['id'] ?? null, self::HARDCODED_FIELD_IDS, true);
            }));
            $result = $section;
            if ($fields) {
                $result['fields'] = $fields;
            } else {
                unset($result['fields']);
            }
            return $result;
        }, $sections);
    }
}