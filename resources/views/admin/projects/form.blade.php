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
        <form method="POST" action="{{ $isEdit ? route('admin.projects.update', $item->id) : route('admin.projects.store') }}" enctype="multipart/form-data" class="p-6 space-y-4" data-validate>
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. Residential Rooftop Solar Installation" data-rules="required|min:3|max:255" data-label="Project Title"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-source>
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Slug (URL Segment) *</label>
                    <input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" placeholder="e.g. residential-rooftop-solar-installation" data-rules="required" data-label="Slug"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('slug') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm font-mono text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-target>
                    @error('slug')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Category *</label>
                    <input type="text" name="category" value="{{ old('category', $item?->category) }}" placeholder="e.g. Residential" data-rules="required|max:100" data-label="Category"
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
                'isRequired' => !$isEdit,
                'hint' => 'Upload an image. Max 5MB.',
            ])

            <div class="flex flex-col gap-1.5" data-gallery>
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Gallery Images</label>
                <input type="file" name="images_files[]" accept="image/*" multiple data-gallery-file class="block w-full text-[12px] text-(--admin-text-secondary) bg-(--admin-surface-2) border border-(--admin-border) rounded-lg p-2 transition
                    file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border file:border-(--admin-border) file:bg-(--admin-surface-2)
                    file:text-(--admin-text-primary) file:text-[12px] file:font-semibold file:cursor-pointer hover:file:bg-(--admin-border)/40">
                <p class="text-[11px] text-(--admin-text-muted)">Max 10MB per image.</p>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 {{ count($gallery) ? '' : 'hidden' }}" data-gallery-list>
                    @foreach ($gallery as $img)
                        <div class="relative rounded-lg overflow-hidden border border-(--admin-border) aspect-square" data-gallery-row>
                            <img src="{{ $img }}" alt="" class="w-full h-full object-cover">
                            <input type="hidden" name="images[]" value="{{ $img }}">
                            <button type="button" data-gallery-remove class="absolute top-1 right-1 z-10 w-5 h-5 rounded-full bg-black/70 text-white flex items-center justify-center cursor-pointer hover:bg-red-600" title="Remove">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Project Description *</label>
                <textarea name="description" rows="4" placeholder="Provide a short summary of the completed project..." data-rules="required|min:10|max:500" data-label="Description"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('description') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('description', $item?->description) }}</textarea>
                @error('description')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._rich-editor', [
                'name' => 'project_details',
                'label' => 'Project Details (Rich Content)',
                'value' => old('project_details', $item?->project_details),
                'rules' => 'required|min:10',
                'dataLabel' => 'Project Details',
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
    var fileInput = gallery?.querySelector("[data-gallery-file]");
    var list = gallery?.querySelector("[data-gallery-list]");
    var files = [];

    function makeRemoveBtn(onClick) {
        var btn = document.createElement("button");
        btn.type = "button";
        btn.className = "absolute top-1 right-1 z-10 w-5 h-5 rounded-full bg-black/70 text-white flex items-center justify-center cursor-pointer hover:bg-red-600";
        btn.title = "Remove";
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>';
        btn.addEventListener("click", onClick);
        return btn;
    }

    function rebuildInput() {
        var dt = new DataTransfer();
        files.forEach(function (f) { dt.items.add(f); });
        fileInput.files = dt.files;
    }

    function renderNewFiles() {
        list.querySelectorAll("[data-new]").forEach(function (r) { r.remove(); });
        files.forEach(function (file, idx) {
            var row = document.createElement("div");
            row.className = "relative rounded-lg overflow-hidden border border-(--admin-border) aspect-square";
            row.dataset.new = "1";
            var img = document.createElement("img");
            img.className = "w-full h-full object-cover";
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            var btn = makeRemoveBtn(function () {
                files.splice(idx, 1);
                renderNewFiles();
                rebuildInput();
            });
            row.appendChild(img);
            row.appendChild(btn);
            list.appendChild(row);
        });
        list.classList.remove("hidden");
    }

    fileInput?.addEventListener("change", function () {
        files = [];
        var oversized = [];
        Array.prototype.forEach.call(fileInput.files, function (f) {
            if (f.size > 10 * 1024 * 1024) { oversized.push(f.name); return; }
            files.push(f);
        });
        renderNewFiles();
        if (oversized.length) {
            alert("Some images were skipped because they are larger than 10MB:\n" + oversized.join("\n"));
        }
    });

    if (gallery && list) {
        list.querySelectorAll("[data-gallery-row]").forEach(function (row) {
            var btn = row.querySelector("[data-gallery-remove]");
            if (btn) btn.addEventListener("click", function () { row.remove(); });
        });
    }
});
</script>
@endpush