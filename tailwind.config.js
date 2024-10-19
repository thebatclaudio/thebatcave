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
            },

            keyframes: {
                fadeInDelay: {
                    '0%': {opacity: 0},
                    '70%': {opacity: 0},
                    '100%': {opacity: 1},
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

