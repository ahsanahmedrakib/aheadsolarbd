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
        <div class="w-28 h-20 rounded-lg border border-(--admin-border) bg-(--admin-surface-2) overflow-hidden shrink-0 flex items-center justify-center">
            @if ($value)
                <img src="{{ $value }}" alt="Preview" class="w-full h-full object-cover">
            @else
                <span class="text-[10px] text-(--admin-text-muted) px-2 text-center">No image</span>
            @endif
        </div>

        <div class="flex-1 flex flex-col gap-2">
            <input type="file" name="{{ $name }}_file" accept="image/*" class="block w-full text-[12px] text-(--admin-text-secondary)
                file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border file:border-(--admin-border) file:bg-(--admin-surface-2)
                file:text-(--admin-text-primary) file:text-[12px] file:font-semibold file:cursor-pointer hover:file:bg-(--admin-border)/40">
            <input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="/images/example.jpg" 
                class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition font-mono text-[12.5px]">
            @if ($hint)
                <p class="text-[11px] text-(--admin-text-muted)">{{ $hint }}</p>
            @endif
        </div>
    </div>
</div>