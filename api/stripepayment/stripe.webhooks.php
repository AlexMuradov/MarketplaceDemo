<?php

require_once "/var/www/html/system/configuration.php";
require_once "/var/www/html/system/init.php";
require '/var/www/html/vendor/autoload.php';
$initialize = new Init();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
}

$Payment = new Xx\Model\Finance\Payment;

// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
        // Then define and call a method to handle the successful payment intent.
        // handlePaymentIntentSucceeded($paymentIntent);
        $Payment->paymentSuccess($paymentIntent->id);
        // printf("Succeeded: %s", $paymentIntent->id);
        // http_response_code(200);

        break;
    case 'payment_method.attached':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // Then define and call a method to handle the successful attachment of a PaymentMethod.
        // handlePaymentMethodAttached($paymentMethod);
        break;
    // ... handle other event types
    default:
        // Unexpected event type
        http_response_code(400);
        exit();
}

http_response_code(200);

$connection->disconnect();

?>