<?php

require "vendor/autoload.php";

$client = new MongoDB\Client();
$collection = $client->rental_cars_db->rentals;

$date = $_POST['date'];
$date_timestamp = strtotime($date);



print($date_timestamp);

$filter = [
    'rental_start' => ['$lte' => $date_timestamp],
    'rental_end' => ['$gte' => $date_timestamp]
];

$options = [
    'projection' => ['rental_cost' => 1]
];

$result = $collection->find($filter, $options);

$total_income = 0;

foreach ($result as $document) {
    $total_income += $document->rental_cost;
}

echo "Доход с проката на дату $date: $total_income грн.";

?>