<?php

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=db;dbname=smart-care;port=3307',
    // 'username' => 'root',
    // 'password' => '',
    // 'charset' => 'utf8',
    'dsn' => getenv('DB_DSN'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
