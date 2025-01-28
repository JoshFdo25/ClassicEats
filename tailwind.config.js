import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            spacing: {
                '77': '19.5rem',
                '128': '32rem',
                '5': '1.2rem',
            },

            transitionDuration: {
                '1500': '1500ms',
                '2000': '2000ms',
                '3000': '3000ms',
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'playwrite-cu': ['"Playwrite CU"', 'cursive'],
            },
        },
    },

    darkMode: 'class',

    plugins: [forms],
};
