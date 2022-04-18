<html>

<head>
    <meta charset="UTF-8">
    <title>JWT Test</title>
</head>

<body>


    <form method="post" align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table align="center">
            <tr>
                <td align="right"><label>Login: </label></td>
                <td align="left"><input class="name" name="login" type="text"></td>
            </tr>
            <tr>
                <td align="right"><label>Password: </label></td>
                <td align="left"><input class="address" name="password" type="password"></td>
            </tr>
           
        </table>
        <button class="roll" name="submit" type="submit" border="none">Login</button>
    </form>
    <?php
    $login = "";
    $password = "";
    if (isset($_POST['submit'])) {
        if (($_POST["login"] == "test") and ($_POST["password"] == "test")) {
            // составляем JWT и отправляем через куки
            $header = array(
                "alg" => "HS256",
                "typ" => "JWT"
            );
            $header_json = json_encode($header);

            $name = array(
                "name" =>"Joe Doe"
            );
            $payload_json = json_encode($name);

            $secret = "secret_key";

            $sig = hash_hmac('sha256', base64_encode($header_json).".".base64_encode($payload_json), $secret);
            
            
            setcookie("test", base64_encode($header_json).".".base64_encode($payload_json).".".$sig);
            header('Location: index.php');
        } else {
            setcookie("test", "");
            echo "<script type='text/javascript'>alert('Invalid login or password');</script>";
        }
    }
    ?>
    <p><a href="index.php">Вернуться на главную</a></p>
</body>

</html>