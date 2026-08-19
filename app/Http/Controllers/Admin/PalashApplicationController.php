<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PalashApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PalashApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $activeTab = $request->query('status', 'all');
        if (!in_array($activeTab, ['all', 'new', 'replied', 'archived'], true)) {
            $activeTab = 'all';
        }

        $query = PalashApplication::query();
        if ($activeTab !== 'all') {
            $query->where('status', $activeTab);
        }
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('full_name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('mobile', 'like', "%{$search}%"));
        }
        $applications = $query->orderBy('id', 'desc')->get();

        $newCount = PalashApplication::where('status', 'new')->count();
        $repliedCount = PalashApplication::where('status', 'replied')->count();
        $archivedCount = PalashApplication::where('status', 'archived')->count();

        return view('admin.palash-applications.index', compact('applications', 'activeTab', 'newCount', 'repliedCount', 'archivedCount'));
    }

    public function edit(PalashApplication $palash_application): View
    {
        return view('admin.palash-applications.form', ['item' => $palash_application]);
    }

    public function update(Request $request, PalashApplication $palash_application): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,replied,archived'],
            'notes' => ['nullable', 'string'],
        ]);
        $palash_application->update($data);

        return redirect()->route('admin.palash-applications.index')->with('success', 'Palash application updated successfully.');
    }

    public function destroy(PalashApplication $palash_application): RedirectResponse
    {
        $palash_application->delete();

        return redirect()->route('admin.palash-applications.index')->with('success', 'Palash application deleted successfully.');
    }
}