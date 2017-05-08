'use strict';
module.exports = function(grunt) {
  // load all tasks
  require('load-grunt-tasks')(grunt);

  // show elapsed time
  require('time-grunt')(grunt);

  var jsFileList = [
    'assets/js/concat/**/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/main.js',
        '!assets/**/*.min.*'
      ]
    },
    sass: {
      dev: {
        options: {
          outputStyle: 'nested',
          sourceMap: false
        },
        files: {
          'assets/css/main.css': 'assets/scss/main.scss'
        }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: {
          'assets/css/main.min.css': 'assets/scss/main.scss'
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/main.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/main.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie >=8', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        src: 'assets/css/main.css'
      },
      build: {
        src: 'assets/css/main.min.css'
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/**/*.scss'
        ],
        tasks: ['sass:dev'],
        options: {
          livereload: true
        }
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat'],
        options: {
          livereload: true
        }
      },
      php: {
        files: [
          'page-templates/*.php',
          'templates/**/*.php',
          '*.php'
        ],
        options: {
          livereload: true
        }
      }
    },
    svgmin: {
      options: {
        plugins: [
          { removeViewBox: false },
          { removeUselessStrokeAndFill: false }
        ]
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'assets/img',
          src: '**/*.svg',
          dest: 'assets/img'
        }]
      }
    },
    imageoptim: {
      optimize: {
        src: [ 'assets/img' ]
      }
    }
  });

  // Register tasks
  grunt.registerTask('dev', [
    'jshint',
    'sass:dev',
    'concat'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify'
  ]);
  grunt.registerTask('images', [
    'svgmin',
    'imageoptim'
  ]);
};
