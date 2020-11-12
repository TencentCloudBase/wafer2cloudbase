## Wafer2-NodeJS 版本打包及部署demo

### 容器镜像介绍

#### NodeJS版本
```shell script
# node -v
v10.23.0
```

#### 其他包版本
```shell script
# npm -v
6.14.8

# pm2 -v
4.5.0

# nodemon -v
2.0.6
```

#### 其他

- 如果需要安装其他包，可以在 Dockerfile 中编写安装命令

### 打包步骤

- 以下以nodejs代码部署到 `/data/release/node-weapp-demo` ，端口监听 5757 为例
- 建议本地安装好依赖的nodejs依赖，以免占用太多构建时间，影响构建成功率

#### 编写 nginx 配置文件

参考 [nginx配置示例](./nginx/wafer2.conf)

注意事项：
1. listen 端口，请不要改动，监听默认80端口
2. server_name 不要填写域名，默认下划线就好。

#### 编写 Dockerfile

参考 [Dockerfile示例](./Dockerfile)

Dockerfile介绍
```shell script
# tcb_wafer未官方提供的基础镜像，内含所需的运行环境
FROM ccr.ccs.tencentyun.com/tcb_prd/tcb_wafer

# 将代码拷贝到对应目录
COPY ./src/node-weapp-demo /data/release/node-weapp-demo

# 将nginx配置文件拷贝到对应目录
COPY ./nginx/* /etc/nginx/conf.d/

# 如果有其他需要安装的包，可以在这里写
# RUN yum install -y wget

#对外暴露80端口
EXPOSE 80

#启动 nginx 和 nodejs服务
CMD ["sh", "-c", "nginx; cd /data/release/node-weapp-demo ; npm start"]
```

#### 打包
将 Dockerfile、nginx配置、源代码 打包到同一个zip包中。部署云托管即可。
