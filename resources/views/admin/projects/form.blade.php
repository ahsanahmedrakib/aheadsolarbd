@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit Project' : 'Add Project';
    $isEdit = (bool) $item;
    $gallery = old('images', $item?->images ?? []);
    if (!is_array($gallery)) { $gallery = []; }
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit Project' : 'Add Project' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this completed solar project' : 'Create a new completed solar project' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.projects.index') }}" class="admin-btn-outline">Back to Projects</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.projects.update', $item->id) : route('admin.projects.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. Residential Rooftop Solar Installation"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-source>
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Slug (URL Segment) *</label>
                    <input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" placeholder="e.g. residential-rooftop-solar-installation"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('slug') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm font-mono text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-target>
                    @error('slug')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Category *</label>
                    <input type="text" name="category" value="{{ old('category', $item?->category) }}" placeholder="e.g. Residential"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('category') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('category')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Client</label>
                    <input type="text" name="client" value="{{ old('client', $item?->client) }}" placeholder="e.g. Mr. Rahman"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('client') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('client')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Location</label>
                    <input type="text" name="location" value="{{ old('location', $item?->location) }}" placeholder="e.g. Dhaka, Bangladesh"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('location') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('location')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Featured</label>
                    <label class="flex items-center gap-2.5 cursor-pointer bg-(--admin-surface-2) border border-(--admin-border) rounded-lg px-3 py-2.5">
                        <input type="checkbox" name="is_featured" value="1" {{ $item?->is_featured ? 'checked' : '' }} class="w-4 h-4 accent-emerald-500">
                        <span class="text-sm text-(--admin-text-primary)">Feature on homepage</span>
                    </label>
                </div>
            </div>

            @include('admin.partials._image-input', [
                'name' => 'image_url',
                'label' => 'Project Image',
                'value' => old('image_url', $item?->image_url),
                'hint' => 'Upload a file or paste a path. Max 5MB.',
            ])

            <div class="flex flex-col gap-1.5" data-gallery>
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Gallery Images</label>
                <input type="file" name="images_files[]" accept="image/*" multiple class="block w-full text-[12px] text-(--admin-text-secondary)
                    file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border file:border-(--admin-border) file:bg-(--admin-surface-2)
                    file:text-(--admin-text-primary) file:text-[12px] file:font-semibold file:cursor-pointer hover:file:bg-(--admin-border)/40">
                <p class="text-[11px] text-(--admin-text-muted)">Or paste existing image paths below:</p>
                <div class="space-y-2" data-gallery-list>
                    @foreach ($gallery as $i => $img)
                        <div class="flex items-center gap-2" data-gallery-row>
                            <input type="text" name="images[]" value="{{ $img }}" placeholder="/images/projects/gallery-1.jpg"
                                class="flex-1 bg-(--admin-surface-2) border border-(--admin-border) text-sm font-mono text-[12.5px] text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                            <button type="button" data-gallery-remove class="admin-action-btn danger" title="Remove">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" data-gallery-add class="text-[12px] font-medium text-(--admin-accent) hover:underline flex items-center gap-1 w-fit cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                    Add gallery path
                </button>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Description *</label>
                <textarea name="description" rows="4" placeholder="Provide a short summary of the completed project..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('description') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('description', $item?->description) }}</textarea>
                @error('description')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._rich-editor', [
                'name' => 'project_details',
                'label' => 'Project Details (Rich Content)',
                'value' => old('project_details', $item?->project_details),
            ])

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.projects.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update Project' : 'Save Project' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    var source = document.querySelector("[data-slug-source]");
    var target = document.querySelector("[data-slug-target]");
    if (source && target) {
        source.addEventListener("input", function () {
            if (target.dataset.touched === "1") return;
            var slug = source.value.toLowerCase().replace(/[^a-z0-9\s-]/g, "").trim().replace(/\s+/g, "-").replace(/-+/g, "-");
            target.value = slug;
        });
        target.addEventListener("input", function () { target.dataset.touched = "1"; });
    }

    var gallery = document.querySelector("[data-gallery]");
    var list = gallery?.querySelector("[data-gallery-list]");
    var addBtn = gallery?.querySelector("[data-gallery-add]");
    if (gallery && list && addBtn) {
        addBtn.addEventListener("click", function () {
            var row = document.createElement("div");
            row.className = "flex items-center gap-2";
            row.innerHTML = '<input type="text" name="images[]" placeholder="/images/projects/gallery-1.jpg" class="flex-1 bg-(--admin-surface-2) border border-(--admin-border) text-sm font-mono text-[12.5px] text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">' +
                '<button type="button" data-gallery-remove class="admin-action-btn danger" title="Remove"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg></button>';
            list.appendChild(row);
            bindRow(row);
        });
        function bindRow(row) {
            row.querySelector("[data-gallery-remove]").addEventListener("click", function () { row.remove(); });
        }
        list.querySelectorAll("[data-gallery-row]").forEach(bindRow);
    }
});
</script>
@endpush