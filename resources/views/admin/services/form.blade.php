@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit Service' : 'Add Service';
    $isEdit = (bool) $item;
    $icons = ['Zap' => 'Energy (Zap)', 'Sun' => 'Solar (Sun)', 'Battery' => 'Storage (Battery)', 'Wrench' => 'Maintenance (Wrench)', 'Shield' => 'Security/Warranty (Shield)', 'Globe' => 'Global (Globe)', 'Leaf' => 'Eco (Leaf)', 'Activity' => 'Monitoring (Activity)'];
    $gallery = old('images', $item?->images ?? []);
    if (!is_array($gallery)) { $gallery = []; }
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit Service' : 'Add Service' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this solar service' : 'Create a new client-facing solar service' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.services.index') }}" class="admin-btn-outline">Back to Services</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.services.update', $item->id) : route('admin.services.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. Off-Grid Solar Setup"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-source>
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Slug (URL Segment) *</label>
                    <input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" placeholder="e.g. off-grid-solar-setup"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('slug') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm font-mono text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-target>
                    @error('slug')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Dashboard &amp; Card Icon *</label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($icons as $name => $label)
                        <button type="button" data-icon-btn data-icon-name="{{ $name }}"
                            class="flex flex-col items-center justify-center p-2.5 rounded-lg border transition text-center gap-1 cursor-pointer {{ old('icon_name', $item?->icon_name) === $name ? 'bg-(--admin-accent-muted) border-(--admin-accent) text-(--admin-accent)' : 'bg-(--admin-surface-2) border-(--admin-border) text-(--admin-text-secondary) hover:text-(--admin-text-primary)' }}">
                            @php
                                $ic = ['Zap' => 'zap', 'Sun' => 'sun', 'Battery' => 'battery', 'Wrench' => 'wrench', 'Shield' => 'shield', 'Globe' => 'globe', 'Leaf' => 'leaf', 'Activity' => 'activity'][$name];
                            @endphp
                            @include('admin.partials._svg-icons', ['icon' => $ic, 'size' => 18])
                            <span class="text-[10px] font-medium block truncate max-w-full">{{ $name }}</span>
                        </button>
                    @endforeach
                </div>
                <input type="hidden" name="icon_name" value="{{ old('icon_name', $item?->icon_name) }}" data-icon-value>
                @error('icon_name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @include('admin.partials._image-input', [
                    'name' => 'image',
                    'label' => 'Service Image',
                    'value' => old('image', $item?->image),
                    'hint' => 'Upload a file or paste a path. Max 5MB.',
                ])
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Accessibility Alt Text *</label>
                    <input type="text" name="alt" value="{{ old('alt', $item?->alt) }}" placeholder="e.g. Battery storage system inside a home garage"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('alt') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('alt')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5" data-gallery>
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Gallery Images</label>
                <input type="file" name="images_files[]" accept="image/*" multiple class="block w-full text-[12px] text-(--admin-text-secondary)
                    file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border file:border-(--admin-border) file:bg-(--admin-surface-2)
                    file:text-(--admin-text-primary) file:text-[12px] file:font-semibold file:cursor-pointer hover:file:bg-(--admin-border)/40">
                <p class="text-[11px] text-(--admin-text-muted)">Or paste existing image paths below:</p>
                <div class="space-y-2" data-gallery-list>
                    @foreach ($gallery as $i => $img)
                        <div class="flex items-center gap-2" data-gallery-row>
                            <input type="text" name="images[]" value="{{ $img }}" placeholder="/images/services/gallery-1.jpg"
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
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Description *</label>
                <textarea name="description" rows="4" placeholder="Provide details about what this service offers..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('description') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('description', $item?->description) }}</textarea>
                @error('description')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._rich-editor', [
                'name' => 'service_details',
                'label' => 'Service Details (Rich Content)',
                'value' => old('service_details', $item?->service_details),
            ])

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.services.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update Service' : 'Save Service' }}</button>
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
            if (document.querySelector("[data-icon-value]") && target.dataset.touched === "1") return;
            var slug = source.value.toLowerCase().replace(/[^a-z0-9\s-]/g, "").trim().replace(/\s+/g, "-").replace(/-+/g, "-");
            target.value = slug;
        });
        target.addEventListener("input", function () { target.dataset.touched = "1"; });
    }

    var iconValue = document.querySelector("[data-icon-value]");
    document.querySelectorAll("[data-icon-btn]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            document.querySelectorAll("[data-icon-btn]").forEach(function (b) {
                b.classList.remove("bg-(--admin-accent-muted)", "border-(--admin-accent)", "text-(--admin-accent)");
                b.classList.add("bg-(--admin-surface-2)", "border-(--admin-border)", "text-(--admin-text-secondary)");
            });
            btn.classList.add("bg-(--admin-accent-muted)", "border-(--admin-accent)", "text-(--admin-accent)");
            btn.classList.remove("bg-(--admin-surface-2)", "border-(--admin-border)", "text-(--admin-text-secondary)");
            if (iconValue) iconValue.value = btn.getAttribute("data-icon-name");
        });
    });

    var gallery = document.querySelector("[data-gallery]");
    var list = gallery?.querySelector("[data-gallery-list]");
    var addBtn = gallery?.querySelector("[data-gallery-add]");
    if (gallery && list && addBtn) {
        addBtn.addEventListener("click", function () {
            var row = document.createElement("div");
            row.className = "flex items-center gap-2";
            row.innerHTML = '<input type="text" name="images[]" placeholder="/images/services/gallery-1.jpg" class="flex-1 bg-(--admin-surface-2) border border-(--admin-border) text-sm font-mono text-[12.5px] text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">' +
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