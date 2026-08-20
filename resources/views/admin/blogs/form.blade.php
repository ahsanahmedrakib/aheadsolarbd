@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit Blog' : 'Add Blog';
    $isEdit = (bool) $item;
    $gallery = old('images', $item?->images ?? []);
    if (!is_array($gallery)) { $gallery = []; }
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit Blog' : 'Add Blog' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this news article' : 'Create a new news article' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.blogs.index') }}" class="admin-btn-outline">Back to Blogs</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.blogs.update', $item->id) : route('admin.blogs.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. How Solar Panels Work in Bangladesh"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-source>
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Slug (URL Segment) *</label>
                    <input type="text" name="slug" value="{{ old('slug', $item?->slug) }}" placeholder="e.g. how-solar-panels-work"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('slug') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm font-mono text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition" data-slug-target>
                    @error('slug')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Category *</label>
                <input type="text" name="category" value="{{ old('category', $item?->category) }}" placeholder="e.g. Renewable Energy"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('category') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                @error('category')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags', implode(', ', $item?->tags ?? [])) }}" placeholder="solar, renewable, energy"
                        class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('tags')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Date</label>
                    <input type="text" name="date" value="{{ old('date', $item?->date) }}" placeholder="January 15, 2025"
                        class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('date')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            @include('admin.partials._image-input', [
                'name' => 'image_url',
                'label' => 'Blog Image',
                'value' => old('image_url', $item?->image_url),
            ])

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Content (Short Intro)</label>
                <textarea name="content" rows="5" placeholder="A brief summary of the article..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('content') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('content', $item?->content) }}</textarea>
                @error('content')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._rich-editor', [
                'name' => 'blog_details',
                'label' => 'Blog Details (Rich Content)',
                'value' => old('blog_details', $item?->blog_details),
            ])

            <div class="flex flex-col gap-1.5" data-gallery>
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Blog Gallery Images</label>
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

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.blogs.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update Blog' : 'Save Blog' }}</button>
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