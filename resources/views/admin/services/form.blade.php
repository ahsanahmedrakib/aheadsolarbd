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
        <form method="POST" action="{{ $isEdit ? route('admin.services.update', $item->id) : route('admin.services.store') }}" enctype="multipart/form-data" class="p-6 space-y-4" data-validate>
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. Off-Grid Solar Setup" data-rules="required|min:3|max:255" data-label="Service Title"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-source>
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Slug (URL Segment) *</label>
                    <input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" placeholder="e.g. off-grid-solar-setup" data-rules="required" data-label="Slug"
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
                <input type="hidden" name="icon_name" value="{{ old('icon_name', $item?->icon_name) }}" data-icon-value data-rules="required" data-label="Icon">
                @error('icon_name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @include('admin.partials._image-input', [
                    'name' => 'image',
                    'label' => 'Service Image',
                    'value' => old('image', $item?->image),
                    'isRequired' => !$isEdit,
                    'hint' => 'Upload an image. Max 5MB.',
                ])
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Accessibility Alt Text *</label>
                    <input type="text" name="alt" value="{{ old('alt', $item?->alt) }}" placeholder="e.g. Battery storage system inside a home garage" data-rules="required|min:5|max:255" data-label="Alt Text"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('alt') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('alt')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5" data-gallery>
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Gallery Images</label>
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
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Service Description *</label>
                <textarea name="description" rows="4" placeholder="Provide details about what this service offers..." data-rules="required|min:10|max:500" data-label="Description"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('description') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('description', $item?->description) }}</textarea>
                @error('description')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._rich-editor', [
                'name' => 'service_details',
                'label' => 'Service Details (Rich Content)',
                'value' => old('service_details', $item?->service_details),
                'rules' => 'required|min:10',
                'dataLabel' => 'Service Details',
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