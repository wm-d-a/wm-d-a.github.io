<?php
    if (isset($_COOKIE['test']))  
    {   
        setcookie("test", "", time()-3600);
        echo "<script type='text/javascript'>alert('Вы вышли из аккаунта');</script>";
        header('Location: index.php');
    }
    else{
        header('Location: index.php');
    }
?>
<p><a href="index.php">Вернуться на главную</a></p>