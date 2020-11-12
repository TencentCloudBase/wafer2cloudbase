## Wafer2 迁移 cloudbase 云托管 方案

### 背景
wafer2是腾讯云于 2017年推出的小程序解决方案，现已不维护。存量用户可以迁移到[云开发](https://cloud.tencent.com/product/tcb)。

### 迁移方式

#### 迁移前必读

##### 迁移到云开发容器托管

1. 云开发原生并不兼容wafer2，但[云托管](https://cloud.tencent.com/document/product/1243)能力，可以基于专门的镜像发布wafer2代码。

##### 云开发不再单独提供MySQL数据库
1. wafer2方案中，采用的是CVM内自建MySQL数据库。这种方式虽然成本更低，但是在 `可靠性`、`易用性`、`性能` 等方面只能有所取舍，无法与[云数据库](https://cloud.tencent.com/product/cdb)相比。
2. 云开发不再单独提供MySQL数据库，而是提供更契合小程序开发的文档型数据库flexdb。但MySQL往flexdb迁移，有一定的开发成本。如果您不想要做这部分开发，可以单独购买[云数据库 for MySQL](https://cloud.tencent.com/product/cdb)。

##### 云开发暂不支持websocket
1. 云开发的容器托管能力，目前只支持https方式访问，暂不支持websocket。

#### 迁移步骤

1. 开通云开发服务：https://cloud.tencent.com/document/product/876/41391
2. 购买按量付费环境：https://cloud.tencent.com/document/product/876/39091#.E6.8C.89.E9.87.8F.E8.AE.A1.E8.B4.B9
3. 开通云托管服务：https://cloud.tencent.com/document/product/1243/47080
4. 购买云数据库MySQL：https://cloud.tencent.com/document/product/236/46433
  4.1 注意：购买 云数据库MySQL 时，需要跟 step3 开通云托管服务，选择同一个VPC。不然会导致云托管无法访问数据库。
  4.2 购买云数据库MySQL，需要自己导出数据，并导入新购的数据库。
5. 编写Dockerfile，并打包代码
  5.1 [nodejs版本Dockerfile编写示例及demo](/nodejs-demo/)
  5.2 [php版本Dockerfile编写示例及demo](/php-demo/)
6. 在云托管 [新建服务](https://cloud.tencent.com/document/product/1243/46126) 并 [部署服务](https://cloud.tencent.com/document/product/1243/46127)
