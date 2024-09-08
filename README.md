<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Task Manager Test-taks</h1>
    <br>
</p>

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 8.2.


INSTALLATION
------------

### Install vendor
~~~
composer install
~~~


## Database

### Create DATABASE
~~~
CREATE DATABASE task_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
~~~

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=task_manager',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

### Add tables 
~~~
php yii migrate
~~~