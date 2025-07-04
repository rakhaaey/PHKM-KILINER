/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#FF6B6B', // Merah muda/salmon, bisa disesuaikan
        'secondary': '#4ECDC4', // Tosca
        'accent': '#FFC107', // Kuning cerah
        'dark-gray': '#34495E', // Abu-abu gelap untuk teks
        'light-gray': '#ECF0F1', // Abu-abu muda untuk latar belakang
        'soft-orange': '#FFEDE1', // Orange sangat muda untuk bg tertentu
      },
      fontFamily: {
        'sans': ['Nunito', 'sans-serif'],
        'heading': ['Montserrat', 'sans-serif'],
      },
      animation: {
        'float': 'float 3s ease-in-out infinite',
        'bounce-subtle': 'bounce-subtle 4s infinite',
        'pulse-subtle': 'pulse-subtle 4s infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        'bounce-subtle': {
            '0%, 100%': { transform: 'translateY(0)' },
            '50%': { transform: 'translateY(-5px)' },
        },
        'pulse-subtle': {
            '0%, 100%': { opacity: 1 },
            '50%': { opacity: 0.8 },
        },
      },
    },
  },
  plugins: [],
}