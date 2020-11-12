## Wafer2-PHP 版本打包及部署demo

### 容器镜像介绍

#### PHP 版本
```shell script
# php -v
PHP 7.2.24 (cli) (built: Oct 22 2019 08:28:36) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
```

#### PHP 扩展
```shell script
[PHP Modules]
bcmath
bz2
calendar
Core
ctype
curl
date
dom
exif
fileinfo
filter
ftp
gd
gettext
hash
iconv
intl
json
ldap
libxml
mbstring
mysqli
mysqlnd
openssl
pcntl
pcre
PDO
pdo_mysql
pdo_sqlite
Phar
posix
readline
Reflection
session
shmop
SimpleXML
soap
sockets
SPL
sqlite3
standard
sysvmsg
sysvsem
sysvshm
tokenizer
wddx
xml
xmlreader
xmlrpc
xmlwriter
xsl
zip
zlib

[Zend Modules]

```

#### 其他
1. 容器中并未部署composer，建议本地安装依赖，然后把代码统一打包上传生成镜像。
2. 如果需要安装其他扩展，可以在 Dockerfile 中编写安装命令

### 打包步骤

- 以下以php代码部署到 `/data/release/php-weapp-demo` 为例，nginx root目录为 `/data/release/php-weapp-demo/public`
- 如果路径有变动，需要同时修改 Dockerfile 和 nginx配置文件

#### 编写 nginx 配置文件

参考 [nginx配置示例](./nginx/wafer2.conf)

注意事项：
1. listen 端口，请不要改动，监听默认80端口
2. server_name 不要填写域名，默认下划线就好。

#### 编写 Dockerfile

参考 [Dockerfile示例](./Dockerfile)

Dockerfile介绍：
```shell script
# tcb_wafer未官方提供的基础镜像，内含所需的运行环境
FROM ccr.ccs.tencentyun.com/tcb_prd/tcb_wafer

# 将nginx配置文件拷贝到对应目录
COPY ./nginx/* /etc/nginx/conf.d/

# 将代码拷贝到对应目录
COPY ./src/php-weapp-demo /data/release/php-weapp-demo

# 如果有其他需要安装的包，可以在这里写
# RUN yum install -y wget

# 对外暴露80端口
EXPOSE 80

# 启动 php-fpm 和 nginx
CMD ["sh", "-c", "php-fpm ; nginx -g 'daemon off;'"]
```

#### 打包
将 Dockerfile、nginx配置、源代码 打包到同一个zip包中。部署云托管即可。
