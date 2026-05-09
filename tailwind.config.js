/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        fontFamily: {
            'sans': ['Prompt'],
            'mono': ['Space Mono'],
        },
        extend: {
            animation: {
                'fade-delay': 'fadeInDelay 1.3s ease-in-out',
                'blink': 'blink 1s step-end infinite',
                'bounce-down': 'bounceDown 2s ease-in-out infinite',
            },

            keyframes: {
                fadeInDelay: {
                    '0%': {opacity: 0},
                    '70%': {opacity: 0},
                    '100%': {opacity: 1},
                },
                blink: {
                    '0%, 100%': {opacity: 1},
                    '50%': {opacity: 0},
                },
                bounceDown: {
                    '0%, 100%': {transform: 'translateY(0)', opacity: '0.6'},
                    '50%': {transform: 'translateY(8px)', opacity: '1'},
                },
            },
        },
    },
    safelist: [
        'mt-20',
        'mt-10',
        'mt-4',
        'text-6xl',
        'text-5xl',
        'text-4xl',
        'text-3xl',
        'text-2xl',
        'text-xl',
        'text-lg',
    ],
    plugins: [],
};

