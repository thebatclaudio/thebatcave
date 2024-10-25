<div class="sticky top-0 z-50">
    <a id="menu-button" :class="{'opened' : $wire.opened}" wire:click="toggleMenu">
        <i class="fa-solid fa-bars"></i>
    </a>

    <a href="/">
        <div id="logo-container">
            <h1 id="logo">the<span>bat</span>claud.<span>io</span></h1>
        </div>
    </a>

    <nav class="menu-wrapper" :class="{'opened' : $wire.opened}">
        <div class="icon-list">
            <ul class="menu-ul">
                <li>
                    <a href="/" class="link" wire:navigate><span data-letters="HOME">Home</span></a>
                </li>
                <li>
                    <a href="/about-me" class="link" wire:navigate><span data-letters="ABOUT ME">About Me</span></a>
                </li>
                <li>
                    <a href="/blog" class="blog link" title="thebatclaudio's blog" target="blank" wire:navigate><span
                            data-letters="BLOG">Blog</span></a>
                </li>
                <li>
                    <a href="//cv.thebatclaud.io" class="blog link" title="thebatclaudio's CV" target="blank"><span
                            data-letters="CV">CV</span></a>
                </li>
            </ul>

            <ul class="social-links-ul">
                <li>
                    <a href="https://www.linkedin.com/in/claudio-la-barbera/" title="Claudio La Barbera on LinkedIn"
                       target="_blank" class="social-link"><i class="fab fa-linkedin"></i></a>
                </li>
                <li>
                    <a href="https://www.github.com/thebatclaudio" title="Claudio La Barbera on GitHub" target="_blank"
                       class="social-link"><i class="fab fa-github-square"></i></a>
                </li>
                <li>
                    <a href="https://www.twitter.com/thebatclaudio" title="Claudio La Barbera on Twitter"
                       target="_blank" class="social-link"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/thebatclaudio" title="Claudio La Barbera on Facebook"
                       target="_blank" class="social-link"><i class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/thebatclaudio" title="Claudio La Barbera on Instagram"
                       target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>

            <div class="contact-me">
                <p>Get in touch</p>
                <p class="email-address"><a href="mailto:hello@thebatclaud.io" title="Send an email">hello[at]thebatclaud.io</a>
                </p>
            </div>
        </div>
    </nav>
</div>

@script
<script>
    document.addEventListener('livewire:navigated', () => {
        if ($wire.opened) {
            $wire.toggleMenu();
        }
    })
</script>
@endscript
