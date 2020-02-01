<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Test</title>
</head>
<body>
    <h1>Ini Dashboard</h1>
    <p><?php if (isset($passdb) || isset($passin)) {
        echo "ini pass db : ". $passdb;
        echo "ini pass in : ". $passin;
    }?></p>
</body>
</html>