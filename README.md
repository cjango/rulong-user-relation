# 用户关系扩展


### 1.使用方法

> composer require rulong/user-relation

### 2.初始化

> php artisan user:relation

### 3.在系统中使用

调整User模型
增加属性
public $guarded = [];

创建用户时，传入 parent_id 属性即可
~~~
User::create([
    'username'  => $username,
    'password'  => $password,
    'parent_id' => PARENT_ID,
]);
~~~
