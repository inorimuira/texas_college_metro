const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            'white': '#ffffff',
            'primary': {
                100: '#F0F0FF',
                200: '#E1E1FF',
                300: '#D3D3FF',
                500: '#B6B6FF',
                1100: '#5F5FFF',
                1300: '#4D4DD0',
                1600: '#33338B',
                1700: '#2B2B73',
                1900: '#191945',
                2000: '#11112E',
                2100: '#080817',
            },
            'card': '#383850',
            'secondary': '#606073'
        },
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
