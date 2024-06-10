/** @type {import('tailwindcss').Config} config */

const config = {
    content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
    theme: {
        colors: {
            black: '#111212',
            white: '#FFFFFF',
        },
        screens: {
            sm: '560px',

            md: '768px',

            lg: '992px',

            xl: '1440px',
        },
        fontSize: {
            h1d: '64px',
            h2d: '48px',
            h3d: '32px',
            sm: '13px',
            'button-m': '12px',
            'button-d': '14px',
        },
        borderRadius: {
            none: '0',
            sm: '4px',
            DEFAULT: '4px',
            md: '8px',
            lg: '12px',
            full: '9999px',
            large: '20px',
            larger: '32px',
        },
        container: {
            padding: {
                DEFAULT: '16px',
            },
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#DDFD54',
                    20: '#F0FDB9',
                    40: '#EBFD9F',
                    60: '#E6FD86',
                    80: '#E2FD6D',
                    100: '#DDFD54',
                },
                secondary: {
                    DEFAULT: '#0A1018',
                    20: '#4A77B2',
                    40: '#2B4466',
                    60: '#20334D',
                    80: '#101F33',
                    100: '#0A1018',
                },
                neutral: {
                    DEFAULT: '#FFFFFF',
                    '00': '#111212',
                    20: '#454D5F',
                    40: '#6C7689',
                    60: '#A6AEBF',
                    80: '#F4F4F4',
                    90: '#FAFAFA',
                    100: 'FFFFFF',
                },
                success: {
                    DEFAULT: '#DDFD54',
                    20: '#F0FDB9',
                    40: '#EBFD9F',
                    60: '#E6FD86',
                    80: '#E2FD6D',
                    100: '#DDFD54',
                },
                error: {
                    DEFAULT: '#DDFD54',
                    20: '#F0FDB9',
                    40: '#EBFD9F',
                    60: '#E6FD86',
                    80: '#E2FD6D',
                    100: '#DDFD54',
                },
                warning: {
                    DEFAULT: '#DDFD54',
                    20: '#F0FDB9',
                    40: '#EBFD9F',
                    60: '#E6FD86',
                    80: '#E2FD6D',
                    100: '#DDFD54',
                },
                information: {
                    DEFAULT: '#DDFD54',
                    20: '#F0FDB9',
                    40: '#EBFD9F',
                    60: '#E6FD86',
                    80: '#E2FD6D',
                    100: '#DDFD54',
                },
            },
            gap: {
                7: '7px',
                12: '12px',
                24: '24px',
            },
            margin: {
                6: '6px',
                16: '16px',
                24: '24px',
            },
            padding: {
                10: '10px',
                12: '12px',
                16: '16px',
                24: '24px',
                35: '35px',
            },
            fontFamily: {
                body: ['Inter'],
            },
            maxWidth: {
                containersm: '100%',
                containermd: '700px',
                containerlg: '900px',
                containerxl: '1264px',
            },

            fontSize: {
                'button-m': '12px',
                'button-d': '14px',
                'text-sm': '13px',
            },
            dropShadow: {
                button: '0 4px 4px rgba(0,0,0, 0.25)',
            },
        },
    },
    plugins: [],
};

export default config;
