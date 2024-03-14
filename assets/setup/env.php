<?php

if (!defined('APP_NAME'))                       define('APP_NAME', 'Controle de Estoque');
if (!defined('APP_ORGANIZATION'))               define('APP_ORGANIZATION', 'Megamidia');
if (!defined('APP_OWNER'))                      define('APP_OWNER', 'José Carlos Teixeira Junior');
if (!defined('APP_DESCRIPTION'))                define('APP_DESCRIPTION', 'Controle de Estoque');

if (!defined('ALLOWED_INACTIVITY_TIME'))        define('ALLOWED_INACTIVITY_TIME', time()+1*3600);

if (!defined('DB_DATABASE'))                    define('DB_DATABASE', 'db_estoque');
if (!defined('DB_HOST'))                        define('DB_HOST','ip-50-116-31-199.cloudezapp.io');
if (!defined('DB_USERNAME'))                    define('DB_USERNAME','user_estoque');
if (!defined('DB_PASSWORD'))                    define('DB_PASSWORD' ,'M3g4@2820');
if (!defined('DB_PORT'))                        define('DB_PORT' ,'3306');

if (!defined('MAIL_HOST'))                      define('MAIL_HOST', 'smtp.gmail.com');
if (!defined('MAIL_USERNAME'))                  define('MAIL_USERNAME', 'example.email@gmail.com');
if (!defined('MAIL_PASSWORD'))                  define('MAIL_PASSWORD', 'example-password');
if (!defined('MAIL_ENCRYPTION'))                define('MAIL_ENCRYPTION', 'ssl');
if (!defined('MAIL_PORT'))                      define('MAIL_PORT', 465);