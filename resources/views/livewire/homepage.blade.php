<div class="flex flex-col h-screen animate-fade-delay">
    <div class="grow flex flex-col justify-center text-white text-center">
        <div>
            <h1 id="title" class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-9xl subpixel-antialiased uppercase whitespace-nowrap">Claudio La Barbera</h1>
            <h2 id="subtitle" class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl subpixel-antialiased lowercase whitespace-nowrap">
                <span id="typewriter-text"></span><span id="typewriter-cursor">_</span>
            </h2>
        </div>
    </div>

    @if($this->latestPost)
        <div class="shrink-0 text-center pb-12">
            <p class="px-4 text-sm sm:text-base md:text-lg text-zinc-400 subpixel-antialiased">
                ⚡ New Post:
                <a href="{{ $this->latestPost->url() }}"
                   wire:navigate
                   class="text-white hover:text-[#a53232] transition-colors duration-300">
                    {{ $this->latestPost->title }}
                </a>
            </p>
        </div>
    @endif
</div>

