@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Users'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Users</h2>
            <p class="admin-page-header-sub">Manage admin panel users ({{ $users->count() }} users)</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.users.create') }}" class="admin-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Add User
            </a>
        </div>
    </div>

    <div class="admin-table-card">
        @if ($users->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <p class="admin-empty-title">No users found</p>
                <p class="admin-empty-desc">Add a new admin panel user to get started</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-(--admin-accent-muted) text-(--admin-accent) flex items-center justify-center uppercase font-bold text-sm shrink-0">{{ mb_substr($user->name, 0, 1) }}</div>
                                        <div class="flex items-center gap-2 min-w-0">
                                            <p class="font-semibold text-[14.5px] text-(--admin-text-primary)">{{ $user->name }}</p>
                                            @if ($user->id === auth()->id())
                                                <span class="text-[10px] font-semibold uppercase tracking-wide text-(--admin-accent) bg-(--admin-accent-muted) px-1.5 py-0.5 rounded">you</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-mono text-[12px] text-(--admin-text-secondary)">{{ $user->email }}</span>
                                </td>
                                <td>
                                    @if ($user->role === 'superadmin')
                                        <span class="inline-block text-[11px] font-semibold px-2 py-1 rounded bg-amber-500/10 text-amber-500 border border-amber-500/30">Super Admin</span>
                                    @else
                                        <span class="inline-block text-[11px] font-semibold px-2 py-1 rounded bg-cyan-500/10 text-cyan-400 border border-cyan-500/30">Admin</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="admin-action-btn" title="Edit User">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-action-btn danger" title="Delete User">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection