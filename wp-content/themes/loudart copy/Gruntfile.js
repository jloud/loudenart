module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    compass: {
      linecomments: false,
      debugInfo: false,
      linecomments: false,
      noLineComments: true,
      options: {
        require: 'susy',
        linecomments: false,
        debugInfo: false,
        linecomments: false,
        noLineComments: true,          
      },
      dist: {
        debugInfo: false,
        linecomments: false,
        noLineComments: true,
        options: {
          debugInfo: false,
          linecomments: false,
          noLineComments: true,
          sassDir: 'scss',
          cssDir: 'css'
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['> 1%', 'Android >= 2.1', 'Chrome >= 21', 'Explorer >= 7', 'Firefox >= 4', 'Opera >= 12.1', 'Safari >= 6.0']
      },
      dist: {
        src: 'css/styles.css'
      }
    },
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['compass:dist']
      },
      autoprefixer: {
        files: ['css/styles.css'],
        tasks: ['autoprefixer:dist']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default', ['watch','compass:dist','autoprefixer:dist']);
}


// module.exports = function(grunt) {
//   grunt.initConfig({
//     pkg: grunt.file.readJSON('package.json'),
//     compass: {
//       options: {
//         require: 'susy'
//       },
//       dist: {
//         options: {
//           sassDir: 'scss',
//           cssDir: 'css'
//         }
//       }
//     },
//     autoprefixer: {
//       // dist: {
//       //   files: {
//       //     'css/styles.css': 'css/styles-222.css'
//       //   }
//       // }
//       single_file: {
//         src: 'css/styles.css',
//         dest: 'css/styles-222.css'
//       },
//     },
//     watch: {
//       css: {
//         files: '**/*.scss'
//       },
//       autoprefixer: {
//         // When this file changes
//         files: ['css/styles.css'],
//         // Run this task
//         tasks: ['autoprefixer:dist']
//       }
//     },
//   });
//   grunt.loadNpmTasks('grunt-contrib-compass');
//   grunt.loadNpmTasks('grunt-autoprefixer');
//   grunt.loadNpmTasks('grunt-contrib-watch');
//   grunt.registerTask('default', ['autoprefixer:dist','watch']);
// }


// module.exports = function(grunt) {
//   grunt.initConfig({
//     pkg: grunt.file.readJSON('package.json'),
//     compass: {
//       options: {
//         require: 'susy'
//       },
//       dist: {
//         options: {
//           sassDir: 'scss',
//           cssDir: 'css'
//         }
//       }
//     },
//     watch: {
//       css: {
//         files: '**/*.scss',
//         tasks: ['compass']
//       }
//     },
//     autoprefixer: {
//       options: {
//         // Task-specific options go here.
//       },
//       your_target: {
//         // Target-specific file lists and/or options go here.
//       },
//     }
//   });
//   grunt.loadNpmTasks('grunt-contrib-compass');
//   grunt.loadNpmTasks('grunt-contrib-watch');
//   grunt.loadNpmTasks('grunt-autoprefixer');
//   grunt.registerTask('default',['watch']);
// }