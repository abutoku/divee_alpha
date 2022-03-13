const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/welcome.blade.php',
        './public/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                diveblue: '#015DC6',
                divenavy:'#3E5155',
                paper: '#eae8e1',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
