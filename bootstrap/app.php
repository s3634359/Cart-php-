<?php

use Cart\App;
use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cart',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('553zg2b5ywbw5j7g');
Braintree_Configuration::publicKey('ywwtsg8w8qkxhpf5');
Braintree_Configuration::privateKey('97938e9a2c4302f8c28978e38ebbc420');

$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '553zg2b5ywbw5j7g',
    'publicKey' => 'ywwtsg8w8qkxhpf5',
    'privateKey' => '97938e9a2c4302f8c28978e38ebbc420'
  ]);
$aCustomerId = null;
$clientToken = $gateway->clientToken()->generate([
    "customerId" => $aCustomerId
]);

require __DIR__ . '/../app/routes.php';

$app->add(new \Cart\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));
$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));
