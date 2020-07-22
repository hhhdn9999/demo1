<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

</body>
</html>
<?php
//     require_once 'model/db_config.php';
    require_once 'database.php';

    $db = new Database;
    $db->Connect();

    if (isset($_GET['controller']))
    {
        $controller = $_GET['controller'];
    }
    else
    {
        $controller = '';
    }

    switch ($controller)
    {
        default :
        require_once  'controller/index.php';
            break;
    } 

?>
