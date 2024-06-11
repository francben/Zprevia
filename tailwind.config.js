import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Agrega tus colores personalizados aquí
                
                verde: {
                    50: '#E0F8F7',
                    100: '#B3EFEE',
                    200: '#80E4E3',
                    300: '#4DD9D8',
                    400: '#26CFCE',
                    500: '#01C4C3',
                    600: '#01B0AF',
                    700: '#019D9C',
                    800: '#01A69C',
                    900: '#007C79',
                },
                gris: {
                    50: '#f9fafb',
                    100: '#f3f4f6',
                    200: '#e5e7eb',
                    300: '#d1d5db',
                    400: '#9ca3af',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                },
                secondary: {
                  // Definición de los colores secundarios
                },
            },
            textColor: theme => ({
                ...theme('colors'),
            }),
            
        },
    },

    plugins: [forms, typography],
};
