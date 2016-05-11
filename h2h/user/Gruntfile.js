module.exports = function(grunt){
    // LiveReload的默认端口号，你也可以改成你想要的端口号
    var lrPort = 35729;
    // 使用connect-livereload模块，生成一个与LiveReload脚本
    // <script src="http://127.0.0.1:35729/livereload.js?snipver=1" type="text/javascript"></script>
    var lrSnippet = require('connect-livereload')({ port: lrPort });
    // 使用 middleware(中间件)，就必须关闭 LiveReload 的浏览器插件
    // 使用 middleware(中间件)，就必须关闭 LiveReload 的浏览器插件
    var serveStatic = require('serve-static');
    var serveIndex = require('serve-index');
    var lrMiddleware = function(connect, options, middlwares) {
        return [
            lrSnippet,
            // 静态文件服务器的路径 原先写法：connect.static(options.base[0])
            serveStatic(options.base[0]),
            // 启用目录浏览(相当于IIS中的目录浏览) 原先写法：connect.directory(options.base[0])
            serveIndex(options.base[0])
        ];
    };
    // 项目配置(任务配置)
    grunt.initConfig({
        // 读取我们的项目配置并存储到pkg属性中
        pkg: grunt.file.readJSON('package.json'),
        // 通过connect任务，创建一个静态服务器
        connect: {
            options: {
                // 服务器端口号
                port: 8000,
                // 服务器地址(可以使用主机名localhost，也能使用IP)
                hostname: 'localhost',
                // 物理路径(默认为. 即根目录) 注：使用'.'或'..'为路径的时，可能会返回403 Forbidden. 此时将该值改为相对路径 如：/grunt/reloard。
                base: './src'
            },
            livereload: {
                options: {
                    // 通过LiveReload脚本，让页面重新加载。
                    middleware: lrMiddleware
                }
            }
        },
        uglify:{
            options:{
                stripBanners:true,
                banner:'/*!<%=pkg.name%>-<%=pkg.version%>.js <%=grunt.template.today("yyyy-mm-dd")%> */\n'
            },
            build:{
                src:['dist/js/<%=pkg.pagename%>/<%=pkg.pagename%>.js'],
                dest:'dist/js/<%=pkg.pagename%>/<%=pkg.pagename%>.min.js'
            },
            build1:{
                src:['dist/js/<%=pkg.pagename%>/<%=pkg.pagename%>.js'],
                dest:'src/js/<%=pkg.pagename%>/<%=pkg.pagename%>.min.js'
            }
        },
        clean: {
            cleanoutput: {
                files: [{
                    src: 'dist/js/<%=pkg.pagename%>/<%=pkg.pagename%>.js'
                }]
            }
        },
        jshint: {
            build: ['Gruntfile.js', 'src/js/<%=pkg.pagename%>/*.js'],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        csslint:{
            build:['src/css/index/home.css'],
            options:{
                csslintrc:'.csslintrc'
            }
        },
        //压缩indexcss
        cssmin: {
            options:{
                banner:'/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                beautify:{
                    ascii_only:true
                }
            },
            compress: {
                files: [{
                    'dist/css/<%=pkg.pagename%>/<%=pkg.pagename%>.min.css': [
                        "src/css/<%=pkg.pagename%>/*.css"
                    ]
                },
                {
                    'src/css/<%=pkg.pagename%>/<%=pkg.pagename%>.min.css': [
                        "src/css/<%=pkg.pagename%>/*.css"
                    ]
                },      ]
            }
        },
        //连接
        concat: {
            options: {
                separator: ';',
                stripBanners: true
            },
            dist: {
                src: [
                    "src/js/<%=pkg.pagename%>/*.js"
                ],
                dest: "dist/js/<%=pkg.pagename%>/<%=pkg.pagename%>.js"
            }
        },
        watch:{
            //build:{
            //    files:['css/info.css','js/info.js'],
            //    tasks:['csslint','jshint','uglify'],
            //    options:{spawn:false}
            //},
            client: {
                // 我们不需要配置额外的任务，watch任务已经内建LiveReload浏览器刷新的代码片段。
                options: {
                    livereload: lrPort
                },
                // '**' 表示包含所有的子目录
                // '*' 表示包含所有的文件
                files: ['src/*', 'src/css/*', 'src/js/*', 'src/img/**/*']
            }
        },
        //uncss: {
        //    options: {
        //        ignoreSheets: ['css/common.css']
        //    },
        //    dist: {
        //        files: {
        //            'css/unused-remove-<%=pkg.pagename%>.css': ['<%=pkg.pagename%>.html']
        //        }
        //    }
        //},
        imagemin: {
            /* 压缩图片大小 */
            dist: {
                options: {
                    optimizationLevel: 3 //定义 PNG 图片优化水平
                },
                files: [
                    {
                        expand: true,
                        cwd: 'src/img/',
                        src: ['**/*.{png,jpg,jpeg,svg}'], // 优化 img 目录下所有 png/jpg/jpeg 图片
                        dest: 'dist/img' // 优化后的图片保存位置，覆盖旧图片，并且不作提示
                    }
                ]
            }
        },
        copy: {
            main: {
                files: [
                    //{expand: true,cwd: 'src',src: ['*'], dest: 'dist/', filter: 'isFile'},
                    //{expand: true,cwd: 'src/css',src: ['*'], dest: 'dist/css/', filter: 'isFile'},
                    //{expand: true,cwd: 'src/js',src: ['vender/*'], dest: 'dist/js/', filter: 'isFile'},
                    //{expand: true,cwd: 'src/font',src: ['*'], dest: 'dist/font/', filter: 'isFile'},
                    //{expand: true,cwd: 'src/js',src: ['*'], dest: 'dist/js/', filter: 'isFile'},
                    //{expand: true,cwd: 'src/css',src: ['vender/*'], dest: 'dist/css/', filter: 'isFile'},
					{expand: true,cwd: 'src',src: ['logic/*'], dest: 'dist/'}// 复制path目录下的所有文件
                ]
            }
        }
    });

    // 加载插件


    // 自定义任务
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-csslint');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-uncss');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('removecss',['uncss']);
    grunt.registerTask('img',['imagemin']);
    grunt.registerTask('copyfiles',['copy']);
    grunt.registerTask('checkcss','csslint');
    grunt.registerTask('default',['concat','uglify','clean','cssmin']);
    grunt.registerTask('live', ['connect', 'watch']);
};