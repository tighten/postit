const colors = require('tailwindcss/colors')

module.exports = {
  content: ['./public/**/*.js', './resources/**/*.{js,vue,blade.php}'],
  theme: {
    extend: {
      colors: {
        gray: colors.slate,
        orange: colors.orange,
        yellow: colors.yellow,
        green: colors.green,
        teal: colors.teal,
        blue: colors.sky,
        purple: colors.purple,
      },
    },
  },
}
