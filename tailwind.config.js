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
                'glow': '#7cf8b0',
                'glow-soft': '#4ade80',
                'glow-light': 'rgba(124, 248, 176, 0.12)',
            },
            backgroundImage: {
                'degrade-menu': 'linear-gradient(180deg, rgba(11,20,16,0.86), rgba(11,20,16,0.55))',
                'forest-bg': 'radial-gradient(1100px 700px at 78% -8%, rgba(124,248,176,0.10), transparent 60%),radial-gradient(900px 650px at 12% 6%, rgba(200,162,255,0.09), transparent 60%),radial-gradient(1200px 900px at 50% 120%, rgba(47,90,68,0.35), transparent 70%),var(--bark)',
            }
        
        },
    },

    plugins: [forms],
};
