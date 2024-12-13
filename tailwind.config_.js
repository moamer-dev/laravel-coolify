import plugin from "tailwindcss";
import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";
//import contentQueries from "@tailwindcss/container-queries";
// import sharedConfig from "tailwind-config";

const sharedConfig = {
    darkMode: ["class", '[data-theme="dark"]'],
    theme: {
        screens: {
            xs: "480px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
            "3xl": "1920px",
            "4xl": "2560px", // only need to control product grid mode in ultra 4k device
        },
        extend: {
            colors: {
                gray: {
                    0: "rgb(var(--gray-0) / <alpha-value>)",
                    50: "rgb(var(--gray-50) / <alpha-value>)",
                    100: "rgb(var(--gray-100) / <alpha-value>)",
                    200: "rgb(var(--gray-200) / <alpha-value>)",
                    300: "rgb(var(--gray-300) / <alpha-value>)",
                    400: "rgb(var(--gray-400) / <alpha-value>)",
                    500: "rgb(var(--gray-500) / <alpha-value>)",
                    600: "rgb(var(--gray-600) / <alpha-value>)",
                    700: "rgb(var(--gray-700) / <alpha-value>)",
                    800: "rgb(var(--gray-800) / <alpha-value>)",
                    900: "rgb(var(--gray-900) / <alpha-value>)",
                    1000: "rgb(var(--gray-1000) / <alpha-value>)",
                },
                background: "rgb(var(--background) / <alpha-value>)",
                foreground: "rgb(var(--foreground) / <alpha-value>)",
                muted: "rgb(var(--muted) / <alpha-value>)",
                "muted-foreground":
                    "rgb(var(--muted-foreground) / <alpha-value>)",
                primary: {
                    lighter: "rgb(var(--primary-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--primary-default) / <alpha-value>)",
                    dark: "rgb(var(--primary-dark) / <alpha-value>)",
                    foreground:
                        "rgb(var(--primary-foreground) / <alpha-value>)",
                },
                secondary: {
                    lighter: "rgb(var(--secondary-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--secondary-default) / <alpha-value>)",
                    dark: "rgb(var(--secondary-dark) / <alpha-value>)",
                    foreground:
                        "rgb(var(--secondary-foreground) / <alpha-value>)",
                },
                red: {
                    lighter: "rgb(var(--red-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--red-default) / <alpha-value>)",
                    dark: "rgb(var(--red-dark) / <alpha-value>)",
                },
                orange: {
                    lighter: "rgb(var(--orange-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--orange-default) / <alpha-value>)",
                    dark: "rgb(var(--orange-dark) / <alpha-value>)",
                },
                blue: {
                    lighter: "rgb(var(--blue-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--blue-default) / <alpha-value>)",
                    dark: "rgb(var(--blue-dark) / <alpha-value>)",
                },
                green: {
                    lighter: "rgb(var(--green-lighter) / <alpha-value>)",
                    DEFAULT: "rgb(var(--green-default) / <alpha-value>)",
                    dark: "rgb(var(--green-dark) / <alpha-value>)",
                },
                filter: {
                    "blur-20": "blur(20px)",
                    "blur-25": "blur(25px)",
                },
            },
            fontFamily: {
                inter: ["var(--font-inter)"],
                lexend: ["var(--font-lexend)"],
                ibmPlexSansArabic: ["var(--font-ibm-plex-sans-arabic)"],
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            // required these animations for the Loader component
            animation: {
                blink: "blink 1.4s infinite both;",
                "scale-up": "scaleUp 500ms infinite alternate",
                "spin-slow": "spin 4s linear infinite",
                popup: "popup 500ms var(--popup-delay, 0ms) linear 1",
                skeleton: "skeletonWave 1.6s linear 0.5s infinite",
                "spinner-ease-spin": "spinnerSpin 0.8s ease infinite",
                "spinner-linear-spin": "spinnerSpin 0.8s linear infinite",
                meteor: "meteor var(--duration) var(--delay) ease-in-out infinite",
                "pop-blob": "pop-blob 5s infinite",
            },
            backgroundImage: {
                skeleton: `linear-gradient(90deg,transparent,#ecebeb,transparent)`,
                "skeleton-dark": `linear-gradient(90deg,transparent,rgba(255,255,255,0.1),transparent)`,
            },
            keyframes: {
                blink: {
                    "0%": { opacity: "0.2" },
                    "20%": { opacity: "1" },
                    "100%": { opacity: "0.2" },
                },
                scaleUp: {
                    "0%": { transform: "scale(0)" },
                    "100%": { transform: "scale(1)" },
                },
                popup: {
                    "0%": { transform: "scale(0)" },
                    "50%": { transform: "scale(1.3)" },
                    "100%": { transform: "scale(1)" },
                },
                skeletonWave: {
                    "0%": {
                        transform: "translateX(-100%)",
                    },
                    "50%": {
                        /* +0.5s of delay between each loop */
                        transform: "translateX(100%)",
                    },
                    "100%": {
                        transform: "translateX(100%)",
                    },
                },
                spinnerSpin: {
                    "0%": {
                        transform: "rotate(0deg)",
                    },
                    "100%": {
                        transform: "rotate(360deg)",
                    },
                },
                meteor: {
                    "0%": { transform: "translateY(-20%) translateX(-50%)" },
                    "100%": { transform: "translateY(300%) translateX(-50%)" },
                },
                "pop-blob": {
                    "0%": { transform: "scale(1)" },
                    "33%": { transform: "scale(1.2)" },
                    "66%": { transform: "scale(0.8)" },
                    "100%": { transform: "scale(1)" },
                },
                "bg-position": {
                    "0%": { backgroundPosition: "0% 50%" },
                    "100%": { backgroundPosition: "100% 50%" },
                },
            },
            content: {
                underline: 'url("/public/underline.svg")',
            },
            boxShadow: {
                profilePic:
                    "0px 2px 4px -2px rgba(0, 0, 0, 0.10), 0px 4px 6px -1px rgba(0, 0, 0, 0.10)",
            },
            gridTemplateColumns: {
                18: "repeat(18, minmax(0, 1fr))",
            },
        },
    },
    plugins: [
        forms,
        //contentQueries,
        // @ts-ignore
        plugin(({ addVariant }) => {
            addVariant("not-read-only", "&:not(:read-only)");
        }),
    ],
};

const config = {
    prefix: "",
    content: [
        "./src/**/*.tsx",
        "./node_modules/rizzui/dist/*.{js,ts,jsx,tsx}",
        "../../packages/isomorphic-core/src/**/*.{js,ts,jsx,tsx}",
    ],
    presets: [sharedConfig],
};

export default config;
