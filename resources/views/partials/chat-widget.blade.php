@php
    $chat = \App\Support\SiteSettings::getSections();
    $chatSec = collect($chat)->firstWhere('id', 'chat-widgets');
    $fld = function ($id) use ($chatSec) {
        $v = collect($chatSec['fields'] ?? [])->firstWhere('id', $id)['value'] ?? null;
        return $v;
    };
    $tgl = function ($id, $def = true) use ($chatSec) {
        $c = collect($chatSec['toggles'] ?? [])->firstWhere('id', $id)['checked'] ?? null;
        return $c !== null ? $c : $def;
    };

    $showWhatsapp = $tgl('show-whatsapp');   $waNum = preg_replace('/[^0-9]/', '', $fld('whatsapp-number') ?? '');
    $showMessenger = $tgl('show-messenger'); $msgUser = $fld('messenger-username') ?? '';
    $showFacebook = $tgl('show-facebook');   $fbUrl = $fld('facebook-url') ?? '';
    $showLinkedin = $tgl('show-linkedin');   $liUrl = $fld('linkedin-url') ?? '';
    $showYoutube = $tgl('show-youtube');     $ytUrl = $fld('youtube-url') ?? '';

    $links = [];
    if ($showWhatsapp && $waNum) {
        $msg = $fld('whatsapp-message') ?? 'Hello! I would like to inquire about solar energy solutions.';
        $links[] = ['key' => 'whatsapp', 'title' => 'Chat on WhatsApp', 'aria' => 'WhatsApp', 'bg' => '#25D366', 'href' => 'https://wa.me/' . $waNum . '?text=' . urlencode($msg), 'icon' => 'whatsapp'];
    }
    if ($showMessenger && $msgUser) {
        $links[] = ['key' => 'messenger', 'title' => 'Chat on Messenger', 'aria' => 'Messenger', 'bg' => '#0084FF', 'href' => 'https://m.me/' . $msgUser, 'icon' => 'messenger'];
    }
    if ($showFacebook && trim((string) $fbUrl)) {
        $links[] = ['key' => 'facebook', 'title' => 'Visit our Facebook page', 'aria' => 'Facebook', 'bg' => '#1877F2', 'href' => $fbUrl, 'icon' => 'facebook'];
    }
    if ($showLinkedin && trim((string) $liUrl)) {
        $links[] = ['key' => 'linkedin', 'title' => 'Visit our LinkedIn page', 'aria' => 'LinkedIn', 'bg' => '#0A66C2', 'href' => $liUrl, 'icon' => 'linkedin'];
    }
    if ($showYoutube && trim((string) $ytUrl)) {
        $links[] = ['key' => 'youtube', 'title' => 'Subscribe to our YouTube channel', 'aria' => 'YouTube', 'bg' => '#FF0000', 'href' => $ytUrl, 'icon' => 'youtube'];
    }

    $chatOverrides = $chatWidgetOverrides ?? [];
    foreach ($chatOverrides as $key => $override) {
        foreach ($links as $i => $link) {
            if ($link['key'] !== $key) {
                continue;
            }
            $links[$i]['href'] = is_array($override) ? ($override['href'] ?? $link['href']) : $override;
            $links[$i]['title'] = is_array($override) ? ($override['title'] ?? $link['title']) : $link['title'];
            break;
        }
    }
@endphp

@if (count($links) > 0 && !request()->is('admin*'))
<div id="chat-widget" class="fixed top-1/2 right-[15px] translate-y-[-50%] z-50 opacity-0 translate-x-4 pointer-events-none transition-all duration-500">
    <div class="chat-idle flex flex-col gap-2">
        @foreach ($links as $i => $link)
            <div style="animation-delay: {{ 0.15 + $i * 0.1 }}s" class="chat-btn-pop group relative">
                <a href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer" title="{{ $link['title'] }}" aria-label="{{ $link['aria'] }}"
                   style="width:40px;height:40px;border-radius:50%;background:{{ $link['bg'] }};color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;transition:transform 0.2s"
                   onmouseenter="this.style.transform='scale(1.12)'" onmouseleave="this.style.transform='scale(1)'">
                    @if ($link['icon'] === 'whatsapp')
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    @elseif ($link['icon'] === 'messenger')
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 0C5.373 0 0 4.974 0 11.111c0 3.498 1.744 6.614 4.469 8.654V24l4.088-2.242c1.092.304 2.246.464 3.443.464 6.627 0 12-4.975 12-11.111C24 4.974 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26 6.559-6.96 3.131 3.259 5.887-3.259-6.559 6.961z"/></svg>
                    @elseif ($link['icon'] === 'facebook')
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    @elseif ($link['icon'] === 'linkedin')
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                    @elseif ($link['icon'] === 'youtube')
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    @endif
                </a>
                <span class="group-hover:opacity-100" style="position:absolute;right:calc(100% + 10px);top:50%;transform:translateY(-50%);background:#1e293b;color:#fff;font-size:11px;font-weight:600;padding:4px 10px;border-radius:6px;white-space:nowrap;opacity:0;transition:opacity 0.2s;pointer-events:none">
                    {{ $link['title'] }}
                </span>
            </div>
        @endforeach
    </div>
</div>

<script>
(function () {
    var w = document.getElementById("chat-widget");
    if (!w) return;
    var t = 150;
    var onScroll = function () {
        var visible = window.scrollY > t;
        w.classList.toggle("opacity-0", !visible);
        w.classList.toggle("translate-x-4", !visible);
        w.classList.toggle("pointer-events-none", !visible);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
})();
</script>
@endif