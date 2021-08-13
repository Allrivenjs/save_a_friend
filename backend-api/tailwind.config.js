module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: theme => ({
        'default-bg': "url('~/images/ripples.jpg')",
       })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
