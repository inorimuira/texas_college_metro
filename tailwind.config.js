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
            'secondary': '#606073',
            'highlight': '#F8ED13'
        },
        extend: {
            backgroundImage: {
                'client-gradient': `radial-gradient(100.71% 83.83% at 78.12% 116.65%, rgba(230, 33, 41, 0.30) 0%, rgba(255, 255, 255, 0.00) 61.01%), radial-gradient(81.71% 49.8% at 11.13% 77.64%, rgba(48, 79, 254, 0.15) 19.94%, rgba(0, 0, 0, 0.00) 88.14%), radial-gradient(243.48% 120.47% at 6.76% 101.2%, rgba(255, 204, 0, 0.00) 81.01%, rgba(255, 204, 0, 0.21) 99.24%), #E7E6EE`
            },
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
