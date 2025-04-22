import defaultTheme from 'tailwindcss/defaultTheme';
const { addIconSelectors } = require("@iconify/tailwind");
const { addDynamicIconSelectors } = require("@iconify/tailwind")

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flyonui/dist/js/*.js',
        './node_modules/flyonui/dist/js/accordion.js',
        '.../path/to/flatpickr/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require("flyonui"),
        require("flyonui/plugin"),
        addIconSelectors(["mdi-light", "vscode-icons"]),
        addDynamicIconSelectors()
    ],
    flyonui: {
        vendors: true // Enable vendor-specific CSS generation
    }
};
