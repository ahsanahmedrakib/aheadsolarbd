<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SiteSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $sections = Setting::first()?->sections ?? [];
        if (empty($sections)) {
            $sections = $this->defaultSections();
        }

        return view('admin.settings.index', compact('sections'));
    }

    public function update(Request $request): RedirectResponse
    {
        $sections = $request->input('sections', []);
        if (!is_array($sections) || empty($sections)) {
            return redirect()->back()->with('error', 'Settings sections are required.');
        }

        $setting = Setting::firstOrNew([]);
        $setting->sections = $sections;
        $setting->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Settings saved successfully.');
    }

    private function defaultSections(): array
    {
        $defaults = SiteSettings::DEFAULT_SECTIONS;

        $fieldTypes = [
            'brand-tagline' => 'text',
            'contact-email' => 'email',
            'phone-number' => 'tel',
            'hq-address' => 'text',
            'whatsapp-number' => 'tel',
            'whatsapp-message' => 'textarea',
            'messenger-username' => 'text',
            'facebook-url' => 'text',
            'linkedin-url' => 'text',
            'youtube-url' => 'text',
            'meta-title' => 'text',
            'meta-desc' => 'textarea',
            'meta-keywords' => 'text',
            'social-fb' => 'text',
            'social-x' => 'text',
            'social-li' => 'text',
            'social-ig' => 'text',
            'social-youtube' => 'text',
            'google-map' => 'text',
        ];

        $fieldLabels = [
            'brand-tagline' => 'Brand Tagline',
            'contact-email' => 'Contact Email',
            'phone-number' => 'Phone Number',
            'hq-address' => 'HQ Address',
            'whatsapp-number' => 'WhatsApp Number',
            'whatsapp-message' => 'WhatsApp Message',
            'messenger-username' => 'Messenger Username',
            'facebook-url' => 'Facebook URL',
            'linkedin-url' => 'LinkedIn URL',
            'youtube-url' => 'YouTube URL',
            'meta-title' => 'Meta Title',
            'meta-desc' => 'Meta Description',
            'meta-keywords' => 'Meta Keywords',
            'social-fb' => 'Facebook URL',
            'social-x' => 'X (Twitter) URL',
            'social-li' => 'LinkedIn URL',
            'social-ig' => 'Instagram URL',
            'social-youtube' => 'YouTube URL',
            'google-map' => 'Google Map Embed URL',
        ];

        $sectionMeta = [
            'general' => ['title' => 'General', 'color' => 'amber'],
            'chat-widgets' => ['title' => 'Chat Widgets', 'color' => 'green'],
            'seo' => ['title' => 'SEO', 'color' => 'blue'],
            'social' => ['title' => 'Social Links', 'color' => 'purple'],
        ];

        $sections = [];
        foreach ($defaults as $sectionId => $fields) {
            $fieldsOut = [];
            foreach ($fields as $fieldId => $value) {
                $fieldsOut[] = [
                    'id' => $fieldId,
                    'label' => $fieldLabels[$fieldId] ?? ucwords(str_replace('-', ' ', $fieldId)),
                    'type' => $fieldTypes[$fieldId] ?? 'text',
                    'value' => $value,
                ];
            }
            $sections[] = [
                'id' => $sectionId,
                'title' => $sectionMeta[$sectionId]['title'] ?? ucwords(str_replace('-', ' ', $sectionId)),
                'iconName' => $sectionId,
                'color' => $sectionMeta[$sectionId]['color'] ?? 'slate',
                'fields' => $fieldsOut,
                'toggles' => [],
            ];
        }

        return $sections;
    }
}