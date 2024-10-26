<div id="timeline" class="text-center text-white animate-fade-delay">
    @foreach($this->posts as $post)
        <div class="mx-auto mt-32">
            <div class="date text-sm mx-auto table lowercase">{{ $post->date->format('d M Y') }}</div>
            <a href="{{$post->url()}}" title="{{$post->title}}" wire:navigate>
                <div style="background-image: url({{ $post->imageUrl() }})"
                     class="content flex-col place-items-center relative mx-auto text-lg w-10/12 sm:w-9/12 bg-zinc-800 bg-gradient-to-t from-zinc-900 from-40% mt-6 mb-10 rounded-sm bg-cover bg-center">
                    <div class="bg-opacity-60 bg-black px-10 py-16 w-full">
                        <h3 class="text-3xl font-black mb-6 subpixel-antialiased">{{$post->title}}</h3>
                        <p class="mb-6 subpixel-antialiased">{{ $post->description }}</p>
                    </div>
                </div>
            </a>
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
