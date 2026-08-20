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
            'google-map' => 'url',
            'whatsapp-number' => 'tel',
            'whatsapp-message' => 'textarea',
            'messenger-username' => 'text',
            'facebook-url' => 'url',
            'linkedin-url' => 'url',
            'youtube-url' => 'url',
            'meta-title' => 'text',
            'meta-desc' => 'textarea',
            'meta-keywords' => 'text',
        ];

        $fieldLabels = [
            'brand-tagline' => 'Brand Tagline',
            'contact-email' => 'Contact Email',
            'phone-number' => 'Phone Number',
            'hq-address' => 'HQ Address',
            'google-map' => 'Google Map Embed URL',
            'whatsapp-number' => 'WhatsApp Number',
            'whatsapp-message' => 'WhatsApp Message',
            'messenger-username' => 'Messenger Username',
            'facebook-url' => 'Facebook URL',
            'linkedin-url' => 'LinkedIn URL',
            'youtube-url' => 'YouTube URL',
            'meta-title' => 'Meta Title',
            'meta-desc' => 'Meta Description',
            'meta-keywords' => 'Meta Keywords',
        ];

        $sectionMeta = [
            'general' => ['title' => 'General', 'color' => 'amber'],
            'chat-widgets' => ['title' => 'Chat Widgets', 'color' => 'green'],
            'seo' => ['title' => 'SEO', 'color' => 'blue'],
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