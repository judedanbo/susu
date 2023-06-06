import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const formKitTailwind = require("@formkit/themes/tailwindcss")
// import { FormKitVariants } from "@formkit/themes/tailwindcss";


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
        './resources/js/**/*.ts',
        './formkit.config.ts'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, formKitTailwind],
};
