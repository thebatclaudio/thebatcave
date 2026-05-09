// Typewriter animation for homepage subtitle
document.addEventListener('DOMContentLoaded', () => initTypewriter());
document.addEventListener('livewire:navigated', () => initTypewriter());

function initTypewriter() {
    const textEl = document.getElementById('typewriter-text');
    const cursorEl = document.getElementById('typewriter-cursor');
    if (!textEl || !cursorEl) return;

    // Clear any existing timeout from a previous init
    if (window._typewriterTimeout) {
        clearTimeout(window._typewriterTimeout);
    }

    const phrases = ['Software engineer', 'caped crusader'];
    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function type() {
        const current = phrases[phraseIndex];

        if (isDeleting) {
            textEl.textContent = current.substring(0, charIndex - 1);
            charIndex--;
        } else {
            textEl.textContent = current.substring(0, charIndex + 1);
            charIndex++;
        }

        let typeSpeed = isDeleting ? 40 : 80;

        // Word fully typed — pause then start deleting
        if (!isDeleting && charIndex === current.length) {
            isDeleting = true;
            typeSpeed = 2000;
        }

        // Word fully deleted — move to next phrase
        if (isDeleting && charIndex === 0) {
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % phrases.length;
            typeSpeed = 500;
        }

        window._typewriterTimeout = setTimeout(type, typeSpeed);
    }

    // Start the animation after the fade-in completes
    setTimeout(type, 1600);
}
