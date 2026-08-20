@php
    $name = $name ?? 'image';
    $label = $label ?? 'Image';
    $value = $value ?? '';
    $required = $required ?? true;
    $hint = $hint ?? null;
@endphp
<div class="flex flex-col gap-1.5">
    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">
        {{ $label }}{{ $required ? ' *' : '' }}
    </label>

    <div class="flex flex-col sm:flex-row gap-3">
        <div id="preview-box-{{ $name }}" class="w-28 h-20 rounded-lg border border-(--admin-border) bg-(--admin-surface-2) overflow-hidden shrink-0 flex items-center justify-center">
            @if ($value)
                <img src="{{ $value }}" alt="Preview" class="w-full h-full object-cover">
            @else
                <span class="text-[10px] text-(--admin-text-muted) px-2 text-center">No image</span>
            @endif
        </div>

        <div class="flex-1 flex flex-col gap-2">
            <input type="file" name="{{ $name }}_file" accept="image/*" data-preview-box="preview-box-{{ $name }}" class="block w-full text-[12px] text-(--admin-text-secondary) bg-(--admin-surface-2) border border-(--admin-border) rounded-lg p-2 transition
                file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border file:border-(--admin-border) file:bg-(--admin-surface-2)
                file:text-(--admin-text-primary) file:text-[12px] file:font-semibold file:cursor-pointer hover:file:bg-(--admin-border)/40">
            @if ($hint)
                <p class="text-[11px] text-(--admin-text-muted)">{{ $hint }}</p>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var MAX_SIZE = 5 * 1024 * 1024;
    document.querySelectorAll("[data-preview-box]").forEach(function (input) {
        input.addEventListener("change", function () {
            var file = input.files && input.files[0];
            if (!file) return;
            if (file.size > MAX_SIZE) {
                alert("Image is too large. Maximum allowed size is 5MB.");
                input.value = "";
                return;
            }
            var box = document.getElementById(input.getAttribute("data-preview-box"));
            if (!box) return;
            box.innerHTML = "";
            var img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            img.className = "w-full h-full object-cover";
            box.appendChild(img);
        });
    });
});
</script>