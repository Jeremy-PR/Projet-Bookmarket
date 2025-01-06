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

