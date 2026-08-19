@extends('layouts.app')

@section('content')
<section class="w-full relative min-h-187.5 overflow-hidden select-none">
    <div class="absolute inset-0 bg-linear-to-r from-forest-900/30 via-forest-900/30 to-forest-900/30 z-10"></div>
    <video class="absolute inset-0 w-full h-full object-cover" src="{{ url('/videos/project.mp4') }}" autoplay muted loop playsinline preload="auto"></video>
</section>

<section class="solar-container py-20 lg:py-25 bg-white select-none">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
        @foreach ($projects as $index => $project)
            <div class="reveal h-115" data-variant="fade-up" data-delay="{{ ($index % 3) * 120 }}">
                <a href="{{ url('projects/' . $project->slug) }}" class="relative h-full rounded-lg overflow-hidden shadow-sm group flex flex-col justify-end p-4 transition-transform duration-300 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image:url('{{ $project->image_url }}')"></div>
                    <div class="absolute inset-0 bg-linear-to-t from-accent-400/80 via-transparent to-transparent z-0"></div>
                    <div class="relative z-10 w-full rounded-xl p-5 backdrop-blur-md transition-all duration-300 border {{ $project->is_featured ? 'bg-gold-900/80 border-gold-500/30 shadow-lg' : 'bg-gold-900/40 backdrop-brightness-90 border-white/20 group-hover:bg-gold-900/70 group-hover:border-accent-500/30' }}">
                        <h3 class="font-heading text-lg lg:text-xl font-bold leading-snug tracking-tight text-white">{{ $project->title }}</h3>
                        @if ($project->description)
                            <p class="mt-2 text-sm text-white/80 line-clamp-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300 group-hover:max-h-20 group-hover:opacity-100 group-hover:mt-2">{{ $project->description }}</p>
                        @endif
                        <div class="mt-4 inline-flex items-center gap-2.5 text-xs font-semibold uppercase tracking-wider text-white group-hover:text-accent-400 transition-colors">
                            <span>View Details</span>
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-accent-500 text-gold-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
@endsection