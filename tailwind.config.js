/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    
    "./index.php", "./public/**/", "./process/*.php"
    
  ],
  theme: {
    extend: {

      colors: {
        primary: {
      
          'red': 'hsl(359, 61, 52)',
          'grey': 'hsl(0, 0, 34)',
          'blue_bayoux': 'hsl(200,26,36)',
          'violet': 'hsl(260,25,36)',
          'eggplant': 'hsl(340, 26, 36)',
        },
        neutral: {
          'white': 'hsl(0, 11, 93)',
          'black': 'hsl(0, 0, 14)',
        },
      },


    },
  },
  plugins: [],
}

