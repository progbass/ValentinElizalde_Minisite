module.exports = function(grunt) {

	var npmDependencies = require('./package.json').devDependencies;
	var hasSass = npmDependencies['grunt-contrib-sass'] !== undefined;

	grunt.initConfig({

		// Watches for changes and runs tasks
		watch : {
			sass : {
				files : ['scss/**/*.scss'],
				tasks : (hasSass) ? ['sass:dev'] : null
			},
			css : {
				files : ['css/**/*.css'],
				options : {
					//livereload : true
				}
			},
			js : {
				files : ['js/**/*.js'],
				tasks : [],
				options : {
					//livereload : true
				}
			},
			php : {
				files : ['**/*.php'],
				options : {
					//livereload : true
				}
			}
		},

		// JsHint your javascript
		jshint : {
			all : ['js/*.js', '!js/modernizr.js', '!js/*.min.js', '!js/vendor/**/*.js'],
			options : {
				browser: true,
				curly: false,
				eqeqeq: false,
				eqnull: true,
				expr: true,
				immed: true,
				newcap: true,
				noarg: true,
				smarttabs: true,
				sub: true,
				undef: false
			}
		},

		// Dev and production build for sass
		sass : {
			production : {
				files : [
					{
						src : ['**/*.scss', '!**/_*.scss'],
						cwd : 'scss',
						dest : 'css',
						ext : '.css',
						expand : true
					}
				],
				options : {
					style : 'compressed'
				}
			},
			dev : {
				files : [
					{
						src : ['**/*.scss', '!**/_*.scss'],
						cwd : 'scss',
						dest : 'css',
						ext : '.css',
						expand : true
					}
				],
				options : {
					style : 'expanded'
				}
			}
		},

		// Bower task sets up require config
		bower : {
			all : {
				rjsConfig : 'js/global.js'
			}
		},

		// Require config
		requirejs : {
			production : {
				options : {
					name : 'js/global',
					//name: "bower_components/almond/almond",
					baseUrl : './',
					include: 'js/global',
					mainConfigFile : 'js/global.js',
					out : 'build/js/global.js',
				}
			}
		},

		// Image min
		imagemin : {
			production : {
				files : [
					{
						expand: true,
						cwd: 'images',
						src: '**/*.{png,jpg,jpeg}',
						dest: 'build/images/'
					}
				]
			}
		},

		// SVG min
		svgmin: {
			production : {
				files: [
					{
						expand: true,
						cwd: 'images',
						src: '**/*.svg',
						dest: 'build/images'
					}
				]
			}
		},


		// BROWSER SYNC
		browserSync: {
			bsFiles: {
                src : [
                    'css/**/*.css',
                    './*.php',
                    'js/**/*.js',
                ]
            },

		    options: {
                //open: true,
                watchTask: true,
		    	proxy: "localhost:8888/ValentinElizalde/wordpress/",
		    }
		},


		// COPY
		copy: {
	      production: {
	        files: [
	        	{
	        		cwd: '.',
	        		expand: true,
		        	src: [ '*.css', 'css/**', '*.php', 'js/modernizr.js', 'bower_components/requirejs/require.js' ],
		        	dest: 'build'
		        }
	        ],
	        
	        
	      },
	    },


	    // CLEAR
	    clean: {
		  production: {
		    src: [ 'build' ]
		  },
		},

	});

	// Default task
	grunt.registerTask('default', ['browserSync', 'watch']);

	// Build task
	grunt.registerTask('build', function() {
		var arr = [];//['jshint'];

		if (hasSass) {
			arr.push('sass:production');
		}

		arr.push('requirejs:production');

		return grunt.task.run(arr);
	});

	// Template Setup Task
	grunt.registerTask('setup', function() {
		var arr = [];

		if (hasSass) {
			arr.push('sass:dev');
		}

		arr.push('bower-install');

		return grunt.task.run(arr);
	});



	// Load up tasks
	if (hasSass) {
		grunt.loadNpmTasks('grunt-contrib-sass');
	}

	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-bower-requirejs');
	grunt.loadNpmTasks('grunt-contrib-requirejs');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-svgmin');
	grunt.loadNpmTasks('grunt-browser-sync');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');

	// Run bower install
	grunt.registerTask('bower-install', function() {
		var done = this.async();
		var bower = require('bower').commands;
		bower.install().on('end', function(data) {
			done();
		}).on('data', function(data) {
			console.log(data);
		}).on('error', function(err) {
			console.error(err);
			done();
		});
	});



	// Tester
	grunt.registerTask('tester', ['clean:production', 'imagemin:production', 'svgmin:production', 'requirejs:production', 'copy:production'] );

};
