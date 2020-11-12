const CONF = {
    port: '5757',
    rootPathname: '/data/release/node-weapp-demo/',

    // 微信小程序 App ID
    appId: 'wxappid',

    // 微信小程序 App Secret
    appSecret: 'asdgasdf56as4df5ads45f4sd5fd4',

    // 是否使用腾讯云代理登录小程序
    useQcloudLogin: true,

    /**
     * MySQL 配置，用来存储 session 和用户信息
     * 若使用了腾讯云微信小程序解决方案
     * 开发环境下，MySQL 的初始密码为您的微信小程序 appid
     */
    mysql: {
        host: '10.0.0.0',
        port: 3306,
        user: 'root',
        db: 'db_name',
        pass: 'password',
        char: 'utf8mb4'
    },

    cos: {
        region: 'ap-guangzhou',
        // Bucket 名称
        fileBucket: 'qcloudtest-xxx',
        // 文件夹
        uploadFolder: '/'
    },

    // 微信登录态有效期
    wxLoginExpires: 7200,
    wxMessageToken: 'abcdefgh',

	serverHost:"127.0.0.1",
	tunnelServerUrl:"tunnel-url",
	tunnelSignatureKey:"tunnel-sig-key",

	qcloudAppId: 105454515,
	qcloudSecretId: "AKIDxxxxxxxxyyyyyyyyyyzzzzzzzzzzi",
	qcloudSecretKey: "SecretKeySecretKeySecretKey",

	wxMessageToken: "zzz"
}

module.exports = CONF
