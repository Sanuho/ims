/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.{php,js}",
            "./resources/**/*.js",
            "./resources/**/*.blade.php",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
      "max-width": {
        sm: "540px",
        md: "720px",
        lg: "960px",
        xl: "1140px",
        "2xl": "1320px",
      },
    },
    extend: {
      colors: {
        primary: '#0ea5e9',
        secondary: '#64748b',
        dark: '#0f172a',
      },
      screens: {
        '2xl': '1320px'
      },
    },
  },
  plugins: [
    // ...
    require('@tailwindcss/forms'),
  ],
}
