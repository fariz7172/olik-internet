/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'purple': {
                    DEFAULT: '#B153D7',
                    50: '#F5E6FF',
                    100: '#E6CCFF',
                    200: '#D4A3FF',
                    300: '#C77FE8',
                    400: '#B153D7',
                    500: '#9B3DC2',
                    600: '#7E2FA0',
                    700: '#6B2888',
                    800: '#4D2FB2',
                    900: '#3A1F8C',
                },
            },
        },
    },
    plugins: [],
}
