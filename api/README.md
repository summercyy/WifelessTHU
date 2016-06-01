# API 说明

## 总体说明

* 所有请求均为 HTTP 的 POST 请求，返回 JSON 格式数据
* 除了注册、登录和特殊说明的情况之外，所有请求均需含有 `userid` 和 `token` 字段，以进行身份的验证
* 返回码 `code` 为 `0` 时表示请求成功，`data` 字段为返回的数据，否则返回一个对应的错误信息 `message`
* 所有情况下，以下错误码对应固定的含义：
	* `-110` 未知错误
	* `-100` 参数非法
	* `-50` 服务器错误
	* `-5` 未登录
	* `-1` 参数缺失

## 注册

###### 网址

* `/api/register.php`

###### 参数

* `name` 用户名，不能超过 32 字节，不允许含有任何特殊字符
* `password` 密码，需经过 MD5 加密，大小写编码均可
* `sex` 性别，其值为 `male` `female` 之一，可为空，为空表示保密
* `email` 邮箱，可为空，不能超过 128 字节
* `icon` 头像文件名，可为空
* `type` 表明客户端的平台，其值为 `iOS` `Android` `Web` 之一

###### 返回

* `userid` 用户 ID，以后每次请求均需要此 ID
* `token` 用户登录凭据，以后每次请求均需要此 token
* `name` 用户名

## 登录

###### 网址

* `/api/login.php`

###### 参数

* `name`、`email` 二选一，参考注册 API 说明
* `password` 参考注册 API 说明
* `type` 参考注册 API 说明

###### 返回

* 参考注册 API 说明

## 登出

###### 网址

* `/api/logout.php`

###### 参数

* 无

###### 返回

* 无

## 查看用户信息

###### 网址

* `/api/view_user.php`

###### 参数

* `name` 用户名

###### 返回

* `name` 用户名
* `sex` 性别，其值为 `male` `female` `secret` 之一
* `icon` 头像文件名
* `email` 邮箱，只有当查看的是自己的信息时才会返回

## 修改用户信息

###### 网址

* `/api/edit_user.php`

###### 参数

* `name` 用户名，参考注册 API 说明
* `password` 当前密码，参考注册 API 说明
* `new_password` 新密码，不修改密码则留空
* `sex` 性别，参考注册 API 说明
* `email` 邮箱，参考注册 API 说明
* `icon` 头像文件名，参考注册 API 说明

###### 返回

* 无

## 上传图片

###### 网址

* `/api/upload_image.php`

###### 参数

* `image` 图片字符串，BASE64 编码
* `type` 图片类型，其值为 `icon` `image` 之一，分别对应用户头像，帖子图片，大小限制分别为 50KB，200KB

###### 返回

* `file_name` 头像文件名

## 发表动态

###### 网址

* `/api/post.php`

###### 参数

* `text` 动态内容
* `images` 图片文件名数组，每一个文件名对应文件为 `/images/image/xxx.jpg`

###### 返回

* 无

## 发表评论

###### 网址

* `/api/comment.php`

###### 参数

* `postid` 动态id
* `text` 评论内容，限制在255字节

###### 返回

* 无