@php use App\Models\MarkdownPost; @endphp
@php
    /**
     * @var MarkdownPost $post
     */
@endphp

@section('metatags')
<!-- meta name="keywords" content="{{ $post->keywords }}" / -->

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ $post->url() }}" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->description }}" />
<meta property="og:image" content="{{ $post->imageUrl() }}" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ $post->url() }}" />
<meta name="twitter:title" content="{{ $post->title }}" />
<meta name="twitter:description" content="{{ $post->description }}" />
<meta name="twitter:image" content="{{ $post->imageUrl() }}" />
@endsection

@section('title', $this->getTitle())
<div class="relative animate-fade-delay">
    <div class="z-0 relative blog-article-header bg-cover bg-center"
         style="background-image: url({{ $post->imageUrl() }})">
        <div class="h-[100vh] bg-opacity-50 bg-black flex flex-col justify-center">
            <div class="w-9/12 mx-auto px-4">
                <h1 class="text-center text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white mt-10 subpixel-antialiased">{{ $post->title }}</h1>
                <p class="text-center font-black text-lg text-white uppercase mt-5">{{ $post->date->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    <div class="relative w-full mx-auto z-1 py-6 px-10 2xl:w-9/12">
        <div class="content text-white text-2xl subpixel-antialiased">
            <p>{!! $post->toHtml() !!}</p>
        </div>

        <div id="disqus_thread" class="mt-10"></div>

        @script
        <script>
            $wire.on('load-disqus', event => {
                let disqus_config = function () {
                    this.page.url = event.detail.url;
                    this.page.identifier = event.detail.identifier;
                };

                (function () {
                    const d = document, s = d.createElement('script');
                    s.src = 'https://{{ config('disqus.username') }}.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            });
        </script>

        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>
        @endscript
    </div>
</div>
