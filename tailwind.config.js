export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                midnight: '#0B1120',
                'midnight-light': '#1a2236',
                'neon-green': '#10B981',
                'neon-blue': '#3B82F6',
            },
        },
    },
    plugins: [],
};
