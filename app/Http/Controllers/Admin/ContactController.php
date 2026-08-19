<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $activeTab = $request->query('status', 'all');
        if (!in_array($activeTab, ['all', 'new', 'replied', 'archived'], true)) {
            $activeTab = 'all';
        }

        $query = ContactQuery::query();
        if ($activeTab !== 'all') {
            $query->where('status', $activeTab);
        }
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('subject', 'like', "%{$search}%"));
        }
        $queries = $query->orderBy('id', 'desc')->get();

        $newCount = ContactQuery::where('status', 'new')->count();
        $repliedCount = ContactQuery::where('status', 'replied')->count();
        $archivedCount = ContactQuery::where('status', 'archived')->count();

        return view('admin.contact.index', compact('queries', 'activeTab', 'newCount', 'repliedCount', 'archivedCount'));
    }

    public function edit(ContactQuery $contact): View
    {
        return view('admin.contact.form', ['item' => $contact]);
    }

    public function update(Request $request, ContactQuery $contact): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,replied,archived'],
            'notes' => ['nullable', 'string'],
        ]);
        $contact->update($data);

        return redirect()->route('admin.contact.index')->with('success', 'Contact query updated successfully.');
    }

    public function destroy(ContactQuery $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact query deleted successfully.');
    }
}