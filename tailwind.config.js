const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "isi-biodata": `
                    radial-gradient(216.54% 190.66% at 3.36% 52.4%, rgba(230, 33, 41, 0.20) 0%, rgba(254, 249, 249, 0.20) 13.33%),
                    radial-gradient(33.38% 27.71% at 50% 90.93%, rgba(48, 79, 254, 0.26) 19.94%, rgba(0, 0, 0, 0.00) 88.14%),
                    radial-gradient(243.48% 120.47% at 6.76% 101.2%, rgba(255, 204, 0, 0.00) 81.01%, rgba(255, 204, 0, 0.28) 99.24%)`,
                "modal": 'radial-gradient(86.88% 72.4% at 5.14% -33.17%, #5F5FFF 0%, rgba(95, 95, 255, 0.00) 100%), radial-gradient(208.16% 172.4% at 70.23% 144.98%, rgba(255, 204, 0, 0.70) 0%, #FFF 33.56%)',
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
