<?php
declare(strict_types=1);

use MongoDB\Client;

require_once __DIR__ . '/vendor/autoload.php';

if (isset($_POST['mileage'])) {
    $mileage = (int) $_POST['mileage'];
} else {
    $mileage = 0;
}

$filter = ['mileage' => ['$lt' => $mileage]];
$options = [
    'projection' => [
        'brand' => 1,
        'year' => 1,
        'mileage' => 1,
        'condition' => 1,
    ],
];

$client = new Client();
$collection = $client->rental_cars_db->cars;

$cars = $collection->find($filter, $options);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Список автомобилей с пробегом менее <?php echo $mileage; ?></title>
</head>
<body>
    <h1>Список автомобилей с пробегом менее <?php echo $mileage; ?>:</h1>

    <?php foreach ($cars as $car): ?>
        <p>Марка: <?php echo $car->brand; ?></p>
        <p>Год выпуска: <?php echo $car->year; ?></p>
        <p>Пробег: <?php echo $car->mileage; ?></p>
        <p>Состояние: <?php echo $car->condition; ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>