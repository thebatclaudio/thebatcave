<div id="timeline" class="text-center text-white font-mono animate-fade-delay">
    @foreach($this->posts as $post)
        <div class="mx-auto mt-32 palermo">
            <div class="date text-sm mx-auto table lowercase">{{ $post->date->format('d M Y') }}</div>
            <div class="content h-40 flex-col place-items-center relative mx-auto text-lg w-9/12 bg-zinc-800 bg-gradient-to-t from-zinc-900 from-40% py-10 mt-6 mb-10 rounded-sm">
                <h3 class="text-lg  mb-6">{{$post->title}}</h3>
                <a class="bg-zinc-900 text-white uppercase text-sm font-bold py-2 px-6 rounded hover:bg-red-950" href="{{$post->url()}}" wire:navigate>{{ __('Read') }}</a>
            </div>
        </div>
    @endforeach

    @if(!$this->postsEnded)
        <div x-intersect.full="$wire.loadMore()" class="p-4">
            <div wire:loading wire:target="loadMore"
                 class="loading-indicator">
                Loading more posts...
            </div>
        </div>
    @endif
</div>
