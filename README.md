## WifelessTHU
Social network system for database class

### 环境要求
* LAMP 或者 WAMP
* Apache 版本：2.4+
* MySQL 版本：5.6+
* PHP 版本：5.5+

### 配置
* 在 MySQL 中新建数据库和用户，并分配权限
 * `CREATE DATABASE 'databasename';`
 * `GRANT ALL PRIVILEGES ON 'databasename'.* TO 'username'@localhost IDENTIFIED BY 'password';`
* 刷新权限
 * `FLUSH PRIVILEGES;` 
* 在数据库中运行`initialize.sql`，创建数据库
 * `USE 'databasename';`
 * `SOURCE /initialize.sql;`
* 网站根目录下复制文件 `config.sample.php` 为 `config.php`
* 编辑 `config.php` 文件，输入数据库用户名和密码