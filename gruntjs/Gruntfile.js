module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            //build: {
            //    src: 'src/<%= pkg.name %>.js',
            //    dest: 'build/<%= pkg.name %>.min.js'
            //}
        },
        watch: {
            scripts: {
                files: ['src/**/*.js'],
                tasks: ['minall'],
                options: {
                    spawn: true,
                    interrupt: true
                }
            }
        },
        compass: {                  // Task
            dist: {                   // Target
                options: {              // Target options
                    sassDir: 'sass',
                    cssDir: 'css',
                    environment: 'production'
                }
            },
            dev: {                    // Another target
                options: {
                    sassDir: 'sass',
                    cssDir: 'css'
                }
            }
        },
        requirejs: {
            compile: {
                options: {
                    baseUrl: "base",
                    mainConfigFile: "config.js",
                    name: "almond", // assumes a production build using almond
                    out: "dist/optimized.js"
                }
            }
        }
    });

    // 加载包含 "uglify" 任务的插件。
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    // 默认被执行的任务列表。
    grunt.registerTask('default', ['uglify','compass']);

};