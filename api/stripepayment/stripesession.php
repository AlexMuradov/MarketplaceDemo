<?php
error_reporting(E_ALL);
ini_set ('display_errors', 1);
require_once "/var/www/html/system/configuration.php";
require_once "/var/www/html/system/init.php";
require '/var/www/html/vendor/autoload.php';

\Stripe\Stripe::setApiKey(STRIPE_KEY);
$initialize = new Init();
$http_request = new System\Request();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$Autologin = new System\Autologin();

header('Content-Type: application/json');

define ('YOUR_DOMAIN','https://rentxx.com');

$vars = "Amount,Days,Img,Email,Name,UserName,Lang,CheckIn,CheckOut,ID,PhoneCode,Phone";
$explode = explode(",", $vars);
foreach($explode as $v) {
  if(!isset($_GET[$v])) {
    exit();
  }
  $$v = $_GET[$v];
}

$Tmp_UID = sha1(time() . rand());





$Auth = new Xx\Model\Auth\Create;
$Verify = new Xx\Model\Auth\Verify;
$Finance = new Xx\Model\Finance\Finance;
$Property = new Xx\Model\Property\Main;


if($userID){
    $owner = $Property->GetOwnerInfo($ID);
    $tid = $Finance->CreateTransaction(0, 0, $userID, $owner[0]['AccountID'], $Amount/100, 1);
    $pid = $Property->CreatePropertyCalendar($ID, $CheckIn, $CheckOut, $userID, $tid);

    $checkout_session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price_data' => [
          'currency' => 'eur',
          'unit_amount' => $Amount,
          'product_data' => [
            'name' => $Name.' — '.$Days.' ночей',
            'images' => ["https://rentxx.com/static/uploads/listings/thumbs/".$Img],
          ],
        ],
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => YOUR_DOMAIN . '/'.$Lang.'/cabinet.reservationdetails/api__Details:1/id:'.$pid,
      'cancel_url' => YOUR_DOMAIN . '/'.$Lang.'/property.display/checkinDate:'.$CheckIn.'/checkoutDate:'.$CheckOut.'/id:'.$ID.'/paid:0/ssid:'.$Tmp_UID,
      'customer_email' => $Email
    ]);

    $connection->disconnect();
    // $checkout_session->success_url = YOUR_DOMAIN . '/'.$Lang.'/cabinet.reservationdetails/api__Details:1/id:'.$pid;
    echo json_encode([
      'id' => $checkout_session->id
    ]);
}
else if(!$userID){
  $cid = $Auth->CreateAccount($Email, $UserName, "TEMPACCOUNT", $Tmp_UID, $PhoneCode, $Phone);
  if($cid[1] == 'RegistrationEmailExists'){
    echo json_encode([
      'error' => 'AuthIsRequired'
    ]);
  }
  else{
    $owner = $Property->GetOwnerInfo($ID);
    $tid = $Finance->CreateTransaction(0, 0, $cid[0], $owner[0]['AccountID'], $Amount/100, 1);
    $pid = $Property->CreatePropertyCalendar($ID, $CheckIn, $CheckOut, $cid[0], $tid);

    $checkout_session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price_data' => [
          'currency' => 'eur',
          'unit_amount' => $Amount,
          'product_data' => [
            'name' => $Name.' — '.$Days.' ночей',
            'images' => ["https://rentxx.com/static/uploads/listings/thumbs/".$Img],
          ],
        ],
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => YOUR_DOMAIN . '/'.$Lang.'/cabinet.reservationdetails/api__Details:1/id:'.$pid.'/tid:'.$Tmp_UID,
      'cancel_url' => YOUR_DOMAIN . '/'.$Lang.'/property.display/checkinDate:'.$CheckIn.'/checkoutDate:'.$CheckOut.'/id:'.$ID.'/paid:0/ssid:'.$Tmp_UID,
      'customer_email' => $Email
    ]);
    
    // $_SESSION['UID'] = $cid[0];

    $connection->disconnect();
    echo json_encode([
      'id' => $checkout_session->id
    ]);
  }
}
