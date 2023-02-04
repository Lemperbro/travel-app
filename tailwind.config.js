/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './node_modules/tw-elements/dist/js/**/*.js',
    
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
        best4: "rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
        
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
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
