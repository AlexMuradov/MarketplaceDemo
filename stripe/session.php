<?php
error_reporting(E_ALL);
ini_set ('display_errors', 1);
require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_ynSbSsTBYnQtpHSIxR8VK9xh008pLhrI0R');

header('Content-Type: application/json');

define ('YOUR_DOMAIN','https://rentxx.com');

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'unit_amount' => 20400,
      'product_data' => [
        'name' => 'Просторная и современная квартира в центре города — 5 ночей',
        'images' => ["https://rentxx.com/static/uploads/listings/thumbs/4_d21b0b82178809baed8732fa77102359269e5ac9.jpg"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => YOUR_DOMAIN . '/success.html',
  'cancel_url' => YOUR_DOMAIN . '/cancel.html',
  'customer_email' => "alex@rentxx.az"
]);

echo json_encode(['id' => $checkout_session->id]);