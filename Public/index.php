<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello docke</h1>

    <?php

    $db_name = getenv('MYSQL_DATABASE');
    $host = getenv('MYSQL_HOST');
    $port = getenv('MYSQL_PORT');

    $db_username = getenv('MYSQL_USER');
    $db_password = getenv('MYSQL_PASSWORD');

    var_dump($db_name);

    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";

    $pdo = new PDO($dsn, $db_username, $db_password);

    $query = 'SHOW DATABASES';
    $data = $pdo->query($query);
    print_r($data->fetchAll(PDO::FETCH_ASSOC));

    ?>

</body>

</html>