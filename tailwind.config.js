const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "isi-biodata": `
                    radial-gradient(216.54% 190.66% at 3.36% 52.4%, rgba(230, 33, 41, 0.20) 0%, rgba(254, 249, 249, 0.20) 13.33%),
                    radial-gradient(33.38% 27.71% at 50% 90.93%, rgba(48, 79, 254, 0.26) 19.94%, rgba(0, 0, 0, 0.00) 88.14%),
                    radial-gradient(243.48% 120.47% at 6.76% 101.2%, rgba(255, 204, 0, 0.00) 81.01%, rgba(255, 204, 0, 0.28) 99.24%)`,
                "modal": 'radial-gradient(86.88% 72.4% at 5.14% -33.17%, #5F5FFF 0%, rgba(95, 95, 255, 0.00) 100%), radial-gradient(208.16% 172.4% at 70.23% 144.98%, rgba(255, 204, 0, 0.70) 0%, #FFF 33.56%)',
                "placement-test": 'radial-gradient(138.9% 86.65% at 3.63% 26.8%, rgba(95, 95, 255, 0.20) 0.94%, rgba(0, 0, 0, 0.00) 24.44%), radial-gradient(77.14% 100.16% at 104.22% 72.54%, rgba(230, 33, 41, 0.04) 0%, rgba(255, 255, 255, 0.20) 24.32%), radial-gradient(140.67% 150.74% at 28.98% 47.02%, rgba(230, 33, 41, 0.06) 0%, rgba(255, 255, 255, 0.00) 22.01%), radial-gradient(45.37% 66.14% at 116.56% 43.56%, rgba(95, 95, 255, 0.20) 0%, rgba(255, 255, 255, 0.20) 93.07%), radial-gradient(543.04% 264.29% at 84.77% -37.87%, #E7E6EE 53.82%, rgba(254, 205, 7, 0.71) 81.53%);'
            },
            colors: {
                transparent: "transparent",
                current: "currentColor",
                white: "#ffffff",
                primary: {
                    100: "#F0F0FF",
                    200: "#E1E1FF",
                    300: "#D3D3FF",
                    500: "#B6B6FF",
                    1100: "#5F5FFF",
                    1300: "#4D4DD0",
                    1600: "#33338B",
                    1700: "#2B2B73",
                    1900: "#191945",
                    2000: "#11112E",
                    2100: "#080817",
                },
                card: "#383850",
                secondary: "#606073",
                highlight: "#F8ED13",
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
