/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './node_modules/tw-elements/dist/js/**/*.js',
    './public/icons/*.css',
    "./node_modules/flowbite/**/*.js",
    "transform: (content) => content.replace(/taos:/g, '')"
  ],
  theme: {
    container: {
      center: true,
      padding: "2rem",
    },
    extend: {
      boxShadow: {
        best: "0px 2px 5px -1px rgba(50, 50, 93, 0.25),  0px 1px 3px -1px rgba(0, 0, 0, 0.3)",
        best4: "0px 2px 5px -1px rgba(255, 255, 255, 0.25),  0px 1px 3px -1px rgba(255, 255, 255, 0.3)",
        best2: "rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset",
        best3: "rgba(0, 0, 0, 0.35) 0px -7px 9px -7px inset;",
        best4: "rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;",
        best5: "rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;",
        taos: '0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.02)',
        md: '0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.02)',
        lg: '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)',
        xl: '0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.01)',
        
      },
      outline: {
        blue: '2px solid rgba(0, 112, 244, 0.5)',
        },
        fontFamily: {
            inter: ['Inter', 'sans-serif'],
        },
        fontSize: {
            xs: ['0.75rem', { lineHeight: '1.5' }],
            sm: ['0.875rem', { lineHeight: '1.5715' }],
            base: ['1rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
            lg: ['1.125rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
            xl: ['1.25rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
            '2xl': ['1.5rem', { lineHeight: '1.33', letterSpacing: '-0.01em' }],
            '3xl': ['1.88rem', { lineHeight: '1.33', letterSpacing: '-0.01em' }],
            '4xl': ['2.25rem', { lineHeight: '1.25', letterSpacing: '-0.02em' }],
            '5xl': ['3rem', { lineHeight: '1.25', letterSpacing: '-0.02em' }],
            '6xl': ['3.75rem', { lineHeight: '1.2', letterSpacing: '-0.02em' }],
        },
      animation: {
        best: "slide_top 4s infinite",
        best1: "slide_bottom 4s infinite",
        best2: "slide_top 4s infinite",
        best3: "slide_bottom 4s infinite",
      },
      colors: {
        main : "#1A1C1E",
        main2 : "#F0CC80",
        main3 : "#F9F9F9",
        main4 : "#303234",
        main5 : "#5e6061",
        main6 : "#0d0e0f"
      },
      transitionDelay: {
        delay: '150ms'
      }
    },
  },
  plugins: [

    require('flowbite/plugin'),
    require('@tailwindcss/forms'),
    require('tw-elements/dist/plugin'),
    require('@tailwindcss/line-clamp'),
    require('taos/plugin'),

    

  ],

  safelist: [
    '!duration-0',
    '!delay-0',
    'html.js :where([class*="taos:"]:not(.taos-init))'
  ]
}
