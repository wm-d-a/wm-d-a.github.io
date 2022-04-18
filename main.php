<html>

<head>
    <meta charset="UTF-8">
    <title>JWT Test</title>
</head>

<body>

    <?php
    $secret = "secret_key";


    if (isset($_COOKIE['test']))  
    {   
        $row = $_COOKIE['test'];
        $row_array = explode(".", $row);

        $header = json_decode(base64_decode($row_array[0]), true);
        $payload = json_decode(base64_decode($row_array[1]), true);
        $sig_in_cookie = $row_array[2];

        $sig = hash_hmac('sha256', $row_array[0].".".$row_array[1], $secret);

        if ($sig_in_cookie == $sig){
            echo ' <p align="center">Привет, '.$payload["name"].' это твой JWT: ' . htmlspecialchars($_COOKIE["test"]);  
        }
        else{
            echo "Тебя не должно здесь быть, твоя подпись не совпадает с моей";
        }
    }
    else{
        header('Location: auth.php');
    }
    ?>
    <p><a href="index.php">Вернуться на главную</a></p>
</body>

</html>