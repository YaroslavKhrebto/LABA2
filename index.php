<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <form action="query1.php" method="POST">
        <label for="date">Виберіть дату:</label>
        <input type="date" id="date" name="date">
        <input type="submit" value="Отримати дохід">
    </form>

    <form method="post" action="query2.php">
        <label for="mileage">Пробег меньше:</label>
        <input type="number" name="mileage" id="mileage" required>
        
        <button type="submit">Найти автомобили</button>
    </form>

    <form method="POST" action="query3.php">
        <label for="car_make">Выберите марку автомобиля:</label>
        <select name="car_make" id="car_make">
            <option value="Toyota">Toyota</option>
            <option value="Honda">Honda</option>
            <option value="Nissan">Nissan</option>            
        </select>
        <input type="submit" value="Поиск">
    </form>

    <form action="localhost.php">
        
        <input type="submit" value="local host">
    </form>


</body>
</html>