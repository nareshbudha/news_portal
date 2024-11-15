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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#0E5DAE",
                secondary: "#89dee2",
                third: "#800080",
                fourth: "#F8FAFC",
                fifth: "#f6d809",
                texthead: "#2e6dea",
                textpara: "#596579",
              },
        },
    },

    plugins: [forms],
};
