# phalcon skeleton

phalcon 应用骨架

## 使用技术

- `phalcon` php 框架
- `swagger-php` 用于生成 swagger.json 文档。
- `swagger-ui` api 文档展示

## phalcon

- IDEA 提示支持 `composer require --dev phalcon/ide-stubs:3.2.4`

### CLI 应用

命令行控制器放在 `app/Console` 目录

执行：

命令结构 `php5 bin/cli {command} [arguments ...] [--options ...]`

- 示例

```bash
php bin/cli main:main name=dfd --hd=dfdf -d -l=45 val
```

### WEB 应用

web控制器默认放在 `app/Controllers` 目录

## swagger-php 

推荐全局安装：

```sh
composer require --global zircote/swagger-php
```

## swagger 文档

swagger-ui 下载

- `npm install swagger-ui-dist`
- 或者 https://github.com/swagger-api/swagger-ui

拷贝 `dist` 下的所有文件到项目目录下 `swagger-ui` 目录

### 文档生成

```sh
// 扫描当前文件夹下所有目录
~/AppData/Roaming/Composer/vendor/bin/swagger --output swagger-ui/docs
// 指定扫描一个或多个目录
 ~/AppData/Roaming/Composer/vendor/bin/swagger --output swagger-ui/docs [dirs ...]
```

### 文档查看

- 运行服务器(只能在内网查看)

```
./bin/swagger-ui
```

- 访问： `127.0.0.1:8055`

## License

MIT
