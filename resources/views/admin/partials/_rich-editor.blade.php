@php
    $name = $name ?? 'content';
    $label = $label ?? 'Content';
    $value = $value ?? '';
@endphp
<div class="flex flex-col gap-1.5" data-rich-editor>
    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">{{ $label }}</label>

    <div class="rounded-lg border border-(--admin-border) overflow-hidden bg-(--admin-surface-2)">
        <div class="flex flex-wrap items-center gap-0.5 border-b border-(--admin-border) bg-(--admin-surface) px-1.5 py-1" data-rich-toolbar>
            @php
                $tools = [
                    'bold' => 'B', 'italic' => 'I', 'underline' => 'U', 'strike' => 'S',
                ];
            @endphp
            @foreach ($tools as $cmd => $lbl)
                <button type="button" data-rich-cmd="{{ $cmd }}" class="w-7 h-7 flex items-center justify-center rounded text-[12px] font-bold text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="{{ ucfirst($cmd) }}">
                    @if ($cmd === 'bold') <span class="font-bold">B</span>
                    @elseif ($cmd === 'italic') <span class="italic">I</span>
                    @elseif ($cmd === 'underline') <span class="underline">U</span>
                    @else <span class="line-through">S</span> @endif
                </button>
            @endforeach
            <span class="w-px h-5 bg-(--admin-border) mx-1"></span>
            <button type="button" data-rich-cmd="formatBlock" data-rich-val="H2" class="px-1.5 h-7 rounded text-[12px] font-semibold text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer">H2</button>
            <button type="button" data-rich-cmd="formatBlock" data-rich-val="H3" class="px-1.5 h-7 rounded text-[12px] font-semibold text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer">H3</button>
            <span class="w-px h-5 bg-(--admin-border) mx-1"></span>
            <button type="button" data-rich-cmd="insertUnorderedList" class="w-7 h-7 flex items-center justify-center rounded text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="Bullet list">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg>
            </button>
            <button type="button" data-rich-cmd="insertOrderedList" class="w-7 h-7 flex items-center justify-center rounded text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="Numbered list">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="10" x2="21" y1="6" y2="6"/><line x1="10" x2="21" y1="12" y2="12"/><line x1="10" x2="21" y1="18" y2="18"/><path d="M4 6h1v4"/><path d="M4 10h2"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"/></svg>
            </button>
            <button type="button" data-rich-cmd="formatBlock" data-rich-val="blockquote" class="w-7 h-7 flex items-center justify-center rounded text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="Quote">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
            </button>
            <button type="button" data-rich-cmd="createLink" class="w-7 h-7 flex items-center justify-center rounded text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="Insert link">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            </button>
            <button type="button" data-rich-cmd="undo" class="w-7 h-7 flex items-center justify-center rounded text-(--admin-text-secondary) hover:bg-(--admin-surface-2) hover:text-(--admin-text-primary) cursor-pointer" title="Undo">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 14 4 9l5-5"/><path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11"/></svg>
            </button>
        </div>
        <div class="max-h-96 overflow-y-auto">
            <div data-rich-editor-area contenteditable="true" class="prose-admin min-h-44 p-3 text-sm text-(--admin-text-primary) outline-none"></div>
        </div>
    </div>
    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @if ($errors->has($name))
        <span class="text-[11px] text-(--admin-danger)">{{ $errors->first($name) }}</span>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-rich-editor]").forEach(function (root) {
        var area = root.querySelector("[data-rich-editor-area]");
        var hidden = root.querySelector('input[type="hidden"]');

        area.innerHTML = hidden.value || "";

        function sync() {
            hidden.value = area.innerHTML;
        }

        area.addEventListener("input", sync);
        area.addEventListener("paste", function (e) {
            e.preventDefault();
            var html = (e.clipboardData || window.clipboardData).getData("text/html") ||
                (e.clipboardData || window.clipboardData).getData("text/plain");
            document.execCommand("insertHTML", false, html);
            sync();
        });

        root.querySelectorAll("[data-rich-cmd]").forEach(function (btn) {
            btn.addEventListener("click", function () {
                area.focus();
                var cmd = btn.getAttribute("data-rich-cmd");
                if (cmd === "createLink") {
                    var url = prompt("Enter link URL (https://...):");
                    if (url) document.execCommand("createLink", false, url);
                } else {
                    var val = btn.getAttribute("data-rich-val") || null;
                    document.execCommand(cmd, false, val);
                }
                sync();
            });
        });
    });
});
</script>
@endpush