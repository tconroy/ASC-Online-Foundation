module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        // If you can't get source maps to work, run the following command in your terminal:
        // $ sass scss/foundation.scss:css/foundation.css --sourcemap
        // (see this link for details: http://thesassway.com/intermediate/using-source-maps-with-sass )
        sourceMap: true
      },

      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/foundation.css': 'scss/foundation.scss'
        }
      }
    },

    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/foundation/js/vendor/',
        src: '**',
        flatten: 'true',
        dest: 'js/vendor/'
      },

      iconfonts: {
        expand: true,
        cwd: 'bower_components/fontawesome/',
        src: ['**', '!**/less/**', '!**/css/**', '!bower.json'],
        dest: 'assets/fontawesome/'
      },

    },

    autoprefixer:{
      dist:{
        files:{
          'css/foundation.css':'css/foundation.css'
        }
      }
    },


      'string-replace': {

        fontawesome: {
          files: {
            'assets/fontawesome/scss/_variables.scss': 'assets/fontawesome/scss/_variables.scss'
          },
          options: {
            replacements: [
              {
                pattern: '../fonts',
                replacement: '../assets/fontawesome/fonts'
              }
            ]
          }
        },
      },

    concat: {
        options: {
          separator: ';',
        },
        dist: {
          src: [

          // Foundation core
          'bower_components/foundation/js/foundation/foundation.js',

          // Pick the componenets you need in your project
          'bower_components/foundation/js/foundation/foundation.abide.js',
          'bower_components/foundation/js/foundation/foundation.accordion.js',
          'bower_components/foundation/js/foundation/foundation.alert.js',
          'bower_components/foundation/js/foundation/foundation.clearing.js',
          'bower_components/foundation/js/foundation/foundation.dropdown.js',
          'bower_components/foundation/js/foundation/foundation.equalizer.js',
          'bower_components/foundation/js/foundation/foundation.interchange.js',
          'bower_components/foundation/js/foundation/foundation.joyride.js',
          'bower_components/foundation/js/foundation/foundation.magellan.js',
          'bower_components/foundation/js/foundation/foundation.offcanvas.js',
          'bower_components/foundation/js/foundation/foundation.orbit.js',
          'bower_components/foundation/js/foundation/foundation.reveal.js',
          'bower_components/foundation/js/foundation/foundation.slider.js',
          'bower_components/foundation/js/foundation/foundation.tab.js',
          'bower_components/foundation/js/foundation/foundation.tooltip.js',
          'bower_components/foundation/js/foundation/foundation.topbar.js',

          // custom bower plugins
          'bower_components/alertify.js/lib/alertify.js',

          // include vendor js
          'js/vendor/wow.js',
          'js/vendor/timeago.js',
          'js/vendor/hoverformore.js',

          // Using all of your custom js files
          'js/custom/*.js'

          ],
          // Concat all the files above into one single file
          dest: 'js/foundation.js',
        },
      },

    uglify: {
      dist: {
        files: {
          // Shrink the file size by removing spaces
          'js/foundation.js': ['js/foundation.js']
        }
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass', 'autoprefixer']
      },

      js: {
        files: 'js/custom/*.js',
        tasks: ['copy', 'concat', 'uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-string-replace');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  grunt.registerTask('build', ['copy', 'string-replace:fontawesome', 'sass', 'autoprefixer', 'concat', 'uglify']);
  grunt.registerTask('default', ['watch']);
};