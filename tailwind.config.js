const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false,
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
        orange: colors.orange,
        yellow: colors.yellow,
        green: colors.green,
        teal: colors.teal,
        blue: colors.sky,
        purple: colors.purple,
      },
    },
  },
  variants: {
    extend: [],
  },
  plugins: [],
}
