module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    fontFamily : {
        'poppins' : ['Poppins', 'sans-serif'],
    },
    extend: {
        colors:{
           "darkblue" : '#11386d',
           "darkred" : "#6D1138"

        }
    },
  },
  plugins: [],
}
