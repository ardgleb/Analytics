<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];

        $con = mysqli_connect("хост", "пользователь", "пароль", "название");
        if (!$con){
            die("Connection failed!" . mysqli_connect_error());
        }
        $sql = "DELETE FROM forms WHERE email = ('$email');";

        $rs = mysqli_query($con, $sql);
        if($rs){
            echo "Message has been sent successfully!";
        }
        else{
            echo "Error, Message didn't send! Something's Wrong."; 
        }
        mysqli_close($con);
        header("Location: http://localhost/analytics/admin_history.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php $info = $_COOKIE['analytics'];$info_array = explode('|', $info);echo $info_array[3]; ?> - отчеты</title>
        <link rel="icon" type="image/x-icon" href="icon.png">
    </head>
    <body>
        <img src="icon.png" id="logo">
        <div id='content'>Отчеты
            <a id="a_" href="http://localhost/analytics/admin_user.php">Аккаунты</a>
            <?php
                $info = $_COOKIE['analytics'];
                $info_array = explode('|', $info);
                $name = $info_array[3];

                $con = mysqli_connect("хост", "пользователь", "пароль", "название");
                if (!$con){
                    die("Connection failed!" . mysqli_connect_error());
                }
            
                $sql = "SELECT * FROM `forms` WHERE `company`=('$name')";
                $rs = mysqli_query($con, $sql);
                $rows_all = mysqli_num_rows($rs);
                $rows = mysqli_fetch_all($rs, MYSQLI_ASSOC);
                $json = json_encode($rows);
                $table = array($rows_all);
                for ($i = 0; $i < $rows_all; $i++) {
                    $table[$i] = $rows[$i]['name'];
                }
                $tabl = array($rows_all);
                for ($i = 0; $i < $rows_all; $i++) {
                    $tabl[$i] = $rows[$i]['number'];
                }
                if($rows_all != 0){
                    for ($i = 0; $i < $rows_all; $i++) {
                        echo "<br><p id='email'>",$table[$i],"</p><a id='a' href='http://localhost/analytics/download.php?table=",$tabl[$i],"'>Скачать</a><form method='POST'><input type='hidden' name='email' value='",$table[$i],"'><input type='submit' name='submit' value='Удалить'></form>";
                    }
                }else{
                    echo "<br><p>Отчетов еще нет</p>";
                }
                mysqli_close($con);
            ?>
        </div>
    </body>
</html>
<style>
    @font-face {
    font-family: "Manrope";
    src: local("Manrope"), 
         url("Manrope.ttf") format("ttf");
    }
    body{
        margin: 0;
        padding: 0;
        font-family: Manrope;
        font-style: normal;
        font-size: 25px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    a{
        text-decoration: none;
        color: black;
    }
    #a_{
        margin-left:4px;
    }
    p, form{
        display: inline-block;
        margin: 7.5px;
    }
    p, #a{
        border-radius: 14px;
        border: 7px solid #EFEFEF;
        font-size: 30px;
        margin: 7.5px;
        padding:4px;
    }
    #logo{
        position: absolute;
        top: 2%;
        right: 15%;
    }
    input[name="submit"]{
        width: 100px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 14px;
        background: #DC1E82;
        color: white;
        border: none;
    }
    #content{
        position:absolute;
        top:10%;
        left:35%;
    }
</style>
