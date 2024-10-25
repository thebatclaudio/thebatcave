@php use App\Models\MarkdownPost; @endphp
@php
    /**
     * @var MarkdownPost $post
     */
@endphp

@section('title', $this->getTitle())
<div class="animate-fade-delay">
    <div class="blog-article-header bg-cover bg-center" style="background-image: url({{ "/storage/post_images/".$post->image }})">
        <div class="h-full w-full py-60 bg-opacity-50 bg-black">
            <div class="w-9/12 mx-auto px-4">
                <h1 class="text-center text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white mt-10">{{ $post->title }}</h1>
                <p class="text-center font-black text-lg text-white uppercase mt-5">{{ $post->date->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    <div class="w-9/12 mx-auto px-4">
        <div class="content text-white mt-5 text-2xl">
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
