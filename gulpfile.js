var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false; // 不生成 *.css.map 文件

elixir(function(mix) {
    // 复制文件到 resources/assets
    mix.copy('vendor/bower_components/bootstrap/dist/css/bootstrap.css',
        'resources/assets/css/');
    mix.copy('vendor/bower_components/bootstrap/dist/js/bootstrap.js',
        'resources/assets/js/');

    mix.copy('vendor/bower_components/jquery/dist/jquery.js',
        'resources/assets/js/');

    // 迁移 CSS 文件
    mix.styles(['bootstrap.css', 'front.css'], 'public/assets/css/app.css');
    mix.styles(['bootstrap.css', 'admin.css'], 'public/assets/css/admin.css');

    // 迁移 JS 文件
    mix.scripts(['jquery.js', 'bootstrap.js'], 'public/assets/js/app.js');

    // 添加版本号 -- 相对于 public 路径
    mix.version([
        'assets/css/app.css',
        'assets/css/admin.css',
        'assets/js/app.js'
    ]);

});
