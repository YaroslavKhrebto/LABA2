<?php

require "vendor/autoload.php";

$client = new MongoDB\Client();
$collection = $client->rental_cars_db->cars;

$car_make = $_POST['car_make'];

$filter = ['brand' => $car_make];

$options = [
  'projection' => [
    'brand' => 1,
    'model' => 1,
    'year' => 1,
    'mileage' => 1,
    'condition' => 1
  ]
];

$result = $collection->find($filter, $options);
$res = iterator_to_array($result);

echo "<h1>Список доступных автомобилей марки $car_make:</h1>";

foreach ($res  as $document) {
  echo "<p>Модель: " . $document['brand'] . "</p>";
  echo "<p>Год выпуска: " . $document['year'] . "</p>";
  echo "<p>Пробег: " . $document['mileage'] . "</p>";
  echo "<p>Состояние: " . $document['condition'] . "</p>";
  echo "<hr>";
}


echo "<script>
let arr = [];   
if (localStorage.getItem('brand'))
    arr = JSON.parse(localStorage.getItem('brand'));    
    arr.push(" . json_encode($res) . ");
localStorage.setItem('brand', JSON.stringify(arr));
</script>
";
?>