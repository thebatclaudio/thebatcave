@php use App\Models\MarkdownPost; @endphp
@php
    /**
     * @var MarkdownPost $post
     */
@endphp

@section('title', $this->getTitle())

<div class="container px-4 pt-28">
    <h1 class="text-center text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white">{{ $post->title }}</h1>
    <p class="text-center font-bold text-gray-400 uppercase mt-5">{{ $post->date->format('d M Y') }}</p>

    <div class="content text-white mt-5 text-xl">
        <p>{!! $post->toHtml() !!}</p>
    </div>

    <div id="disqus_thread" class="mt-10"></div>

    @script
    <script>
      $wire.on('load-disqus', event => {
        let disqus_config = function() {
          this.page.url = event.detail.url;
          this.page.identifier = event.detail.identifier;
        };

        (function() {
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
