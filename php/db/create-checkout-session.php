<?php
require '../../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51NFy3MAPSuMDYJ8A9bdxXmZ0EXXduckGC4mfH5zIe09V1bK82itzoK7Rcfc36gUXu3OJcqz4SFluS9SadgnUxQgK0033ep7yUK');

header('Content-Type: application/json');

$DOMAIN = 'https://hikingtrip.000webhostapp.com';

$cart = json_decode(file_get_contents('php://input'), true)['cart'];
error_log(print_r($cart, true));  
$line_items = [];

foreach ($cart as $item) {
    try {
        array_push($line_items, [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $item['name'],
                    'images' => [urlencode($item['image'])],
                ],
                'unit_amount' => intval(floatval(str_replace('€', '', $item['price'])) * 100),
            ],
            'quantity' => $item['quantity'],
        ]);
    } catch (\Exception $e) {
        error_log('Error processing item: ' . print_r($item, true)); 
        error_log($e->getMessage()); 
    }
}

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $line_items,
        'mode' => 'payment',
        'success_url' => $DOMAIN . '/php/db/success.php',
        'cancel_url' => $DOMAIN . '/php/db/cancel.php',
    ]);

    echo json_encode(['id' => $checkout_session->id]);
} catch (\Exception $e) {
    error_log($e);
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
