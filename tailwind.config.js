const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        colors: {
            transparent: "transparent",
            white: {
                DEFAULT: "#FFFFFF",
                500: "#FAFAFA",
            },
            black: {
                DEFAULT: "#000000",
                100: "#DCDCDC",
                500: "#FAFAFA",
            },
            red: {
                DEFAULT: "#FF0000",
                400: "#FF0000",
            },

            peach: {
                DEFAULT: "#F8F1FD",
            },

            blue: {
                DEFAULT: "#0000FF",
                50: "#AEA5EE",
                100: "#81D4FA",
                60: "#F5F8FD",
                700: "#4538A1",
                800: "#3D41D8",
            },
            green: {
                50: "#DFFFE8",
                300: "#37E44D",
            },

            gray: {
                DEFAULT: "#969696",
                50: "#F5F8FD",
                100: "#F5F8FD",
                700: "#808080",
                800: "#3E3E3E",
            },
            purple: {
                200: "#B042FF",
                300: "#9300FF",
                400: "#7100F5",
            },
            cyan: {
                400: "#00ECFA",
                500: "#00B8EA",
            },
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
