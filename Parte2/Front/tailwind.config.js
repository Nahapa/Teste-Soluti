module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'layout': {
          'body': '#F1F1F1',
          'sidebar': '#F6F6F6',
        },
        'theme': {
          'primary': '#107165',
          'secondary': '#135650',
          'striped': '#10716511',
        }
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['even', 'odd'],
    },
  },
  plugins: [],
}
