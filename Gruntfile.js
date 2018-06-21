/* jshint node:true */
module.exports = function(grunt) {
  'use strict';

  grunt.initConfig({

    // Autoprefixer.
    postcss: {
      options: {
        processors: [
          require('autoprefixer')({
            browsers: [
              '> 0.1%',
              'ie 8',
              'ie 9'
            ]
          })
        ]
      },
      dist: {
        src: [
          'style.css',
          'assets/css/*.css',
          'assets/css/admin/*.css',
          'assets/css/customizer/*.css',
          'assets/css/jetpack/*.css'
        ]
      }
    },

    // JavaScript linting with JSHint.
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/*.min.js',
        'assets/js/admin/*.js',
        '!assets/js/admin/*.min.js',
        'assets/js/customizer/*.js',
        '!assets/js/customizer/*.min.js'
      ]
    },

    // Sass linting with Stylelint.
    stylelint: {
      options: {
        configFile: '.stylelintrc'
      },
      all: [
        'assets/css/**/*.scss',
        '!assets/css/sass/vendors/**/*.scss'
      ]
    },

    // Minify .js files.
    uglify: {
      options: {
        preserveComments: 'some'
      },
      main: {
        files: [{
          expand: true,
          cwd: 'assets/js/',
          src: [
            '*.js',
            '!*.min.js'
          ],
          dest: 'assets/js/',
          ext: '.min.js'
        }]
      },
      admin: {
        files: [{
          expand: true,
          cwd: 'assets/js/admin/',
          src: [
            '*.js',
            '!*.min.js'
          ],
          dest: 'assets/js/admin/',
          ext: '.min.js'
        }]
      },
      customizer: {
        files: [{
          expand: true,
          cwd: 'assets/js/customizer/',
          src: [
            '*.js',
            '!*.min.js'
          ],
          dest: 'assets/js/customizer/',
          ext: '.min.js'
        }]
      }
    },

    // Compile all .scss files.
    sass: {
      dist: {
        options: {
          require: 'susy',
          sourcemap: 'none',
          includePaths: require('node-bourbon').includePaths
        },
        files: [{
          'style.css': 'style.scss',
          'assets/css/admin/admin.css': 'assets/css/admin/admin.scss',
          'assets/css/customizer/customizer.css': 'assets/css/customizer/customizer.scss',
          'assets/css/jetpack/jetpack.css': 'assets/css/jetpack/jetpack.scss'
        }]
      }
    },

    // Minify all .css files.
    cssmin: {
      main: {
        files: {
          'style.css': ['style.css']
        }
      },
      admin: {
        expand: true,
        cwd: 'assets/css/admin/',
        src: ['*.css'],
        dest: 'assets/css/admin/',
        ext: '.css'
      },
      customizer: {
        expand: true,
        cwd: 'assets/css/customizer/',
        src: ['*.css'],
        dest: 'assets/css/customizer/',
        ext: '.css'
      },
      jetpack: {
        expand: true,
        cwd: 'assets/css/jetpack/',
        src: ['*.css'],
        dest: 'assets/css/jetpack/',
        ext: '.css'
      }
    },

    // Watch changes for assets.
    watch: {
      css: {
        files: [
          'style.scss',
          'assets/css/admin/*.scss',
          'assets/css/customizer/*.scss',
          'assets/css/jetpack/*.scss',
          'assets/css/sass/utils/*.scss',
          'assets/css/sass/vendors/*.scss'
        ],
        tasks: ['sass', 'css']
      },
      js: {
        files: [
          // main js
          'assets/js/*js',
          '!assets/js/*.min.js',

          // admin js
          'assets/js/admin/*.js',
          '!assets/js/admin/*.min.js',

          // customizer js
          'assets/js/customizer/*js',
          '!assets/js/customizer/*.min.js'
        ],
        tasks: ['jshint', 'uglify']
      }
    }

  });


  // Load NPM tasks to be used here
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-stylelint');

  // Register tasks
  grunt.registerTask('default', [
    'css',
    'jshint',
    'uglify'
  ]);

  grunt.registerTask('css', [
    'stylelint',
    'sass',
    'postcss',
    'cssmin'
  ]);

};
