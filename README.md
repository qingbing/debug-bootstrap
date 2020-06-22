# debug-bootstrap
## 1、描述
php 调试入口类


## 2、注意事项
- 所有的测试命令务必写入到 "\Test" 为命名空间的目录下
- 建议所有测试命令都以"Test"开头

## 3、使用方法
### 3.1 web 使用
- 可直接通过入口命令查找测试链接

### 3.1 console 使用
- 查找支持的命令
```
php console.php

======>>>

php console.php --c=DebugCommand
php console.php --c=DebugWeb



+++++++++++++++++++++

php console.php --c=DebugCommand --id=5

======>>>
Array
(
    [c] => DebugCommand
    [id] => 5
)
/mnt/hgfs/Vhosts/composer.us/php-debug-bootstrap/test/src/DebugCommand.php:29:
string(1) "5"

```


## ====== 异常代码集合 ======

异常代码格式：1000 - XXX - XX （组件编号 - 文件编号 - 代码内异常）
```

```