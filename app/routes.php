<?php

$app->get('/', ['Cart\Controllers\HomeController', 'index'])->setName('home');

$app->get('/products/{slug}', ['Cart\Controllers\ProductController', 'get'])->setName('product.get');

$app->get('/cart', ['Cart\controllers\CartController', 'index'])->setName('cart.index');

$app->get('/cart/add/{slug}/{quantity}', ['Cart\controllers\CartController', 'add'])->setName('cart.add');

$app->post('/cart/update/{slug}', ['Cart\controllers\CartController', 'update'])->setName('cart.update');

$app->get('/order', ['Cart\controllers\OrderController', 'index'])->setName('order.index');

$app->get('/order/{hash}', ['Cart\controllers\OrderController', 'show'])->setName('order.show');

$app->post('/order', ['Cart\controllers\OrderController', 'create'])->setName('order.create');

$app->get('/braintree/token', ['Cart\controllers\BraintreeController', 'token'])->setName('braintree.token');
