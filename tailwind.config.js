/** @type {import('tailwindcss').Config} config */

const config = {
    content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
    theme: {
        screens: {
            sm: '560px',

            md: '768px',

            lg: '992px',

            xl: '1440px',
        },
        fontSize: {
            xxl: '6.25rem',
            h1d: '4rem',
            h2d: '3rem',
            h3d: '2rem',
            h4d: '1.5rem',
            p18: '1.125rem',
            base: '1rem',
            sm: '0.8125rem',
            smx: '0.875rem',
            smd: '0.875rem',
            'button-m': '0.75rem',
            'button-d': '0.875rem',
        },
        borderRadius: {
            none: '0',
            sm: '0.25rem',
            DEFAULT: '0.25rem',
            md: '0.375rem',
            lg: '0.75rem',
            full: '1000rem',
            normal: '1rem',
            large: '1.25rem',
            larger: '2rem',
            40: '2.5rem',
        },
        borderWidth: {
            DEFAULT: '1px',
            0: '0',
            2: '2px',
            3: '3px',
            4: '4px',
            6: '6px',
            8: '8px',
        },
        container: {
            padding: {
                DEFAULT: '1rem',
            },
        },
        extend: {
            colors: {
                black: '#111212',
                white: '#FFFFFF',
                darkBackground: '#051419',
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
            width: {
                icon: '3rem',
                containersm: '100%',
                containermd: '700px',
                containerlg: '900px',
                containerxl: '1264px',
                rowlg: '1020px',
            },
            height: {
                icon: '3rem',
            },

            gap: {
                4: '0.25rem',
                7: '0.4375rem',
                12: '0.75rem',
                16: '1rem',
                24: '1.5rem',
                68: '4.25rem',
            },
            margin: {
                6: '0.375rem',
                8: '0.5rem',
                12: '0.75rem',
                16: '1rem',
                24: '1.5rem',
                40: '2.5rem',
            },
            padding: {
                6: '0.375rem',
                10: '0.625rem',
                12: '0.75rem',
                16: '1rem',
                18: '1.125rem',
                20: '1.25rem',

                24: '1.5rem',
                36: '2rem',
                58: '3.5rem',
                64: '4rem',
                72: '4.5rem',
                80: '5rem',
                90: '5.625rem',
                144: '9rem',
            },
            fontFamily: {
                body: ['Inter'],
            },
            maxWidth: {
                containersm: '100%',
                containermd: '700px',
                containerlg: '900px',
                containerxl: '1064px',
                iconrest: 'calc(100% - 3rem)',
            },

            fontSize: {},
            dropShadow: {
                button: '0 4px 4px rgba(0,0,0, 0.25)',
            },
        },
    },
    plugins: [],
};

export default config;
