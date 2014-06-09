module.exports = function (grunt) {

	// 1. All configuration goes here 
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			dist: {
				src: [
					'js/libs/*.js', // All JS in the libs folder
					'js/custom/*.js' // This specific file
				],
				dest: 'js/production.js',
			}
		},
	
		uglify: {
			build: {
				src: 'js/production.js',
				dest: 'js/production.min.js'
			}
		},

		compass: {
			dist: {
				options: {
					sassDir: 'sass',
					cssDir: 'stylesheets',
					environment: 'production'
				}
			}
		},	
		

		watch: {
		    css: {
		      files: ['sass/**/*.scss', 'sass/**/*.scss'], 
		      tasks: ['compass:dist'],
			  options: {
				  livereload: true,
			  },
		    },
			
		    scripts: {
		        files: ['js/**/*.js'],
		        tasks: ['concat', 'uglify'],
		        options: {
		            spawn: false,
					livereload: true,
		        },
		    } 
		},

	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['concat', 'uglify', 'compass', 'watch']);

};