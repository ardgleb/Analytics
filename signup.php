<?php
if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $pass = $_POST['password'];
    
    $con = mysqli_connect(""хост", "пользователь", "пароль", "название");
    if (!$con){
        die("Connection failed!" . mysqli_connect_error());
    }
    $sql = "SELECT * FROM `accounts` WHERE login='$login' AND password='$pass'";
    $rs = mysqli_query($con, $sql);
    $rows_all = mysqli_num_rows($rs);
    $rows = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if($rows_all == 1){
        $info = $rows["0"]['login'].'|'.$rows["0"]['password'].'|'.$rows["0"]['company'].'|'.$rows["0"]['name'].'|'.$rows["0"]['email'];
        setcookie('analytics', $info, time() + 3600, '/');
        header("Location: http://localhost/analytics/form.php");
        exit;
    }else{
        $sql = "SELECT * FROM `acc_admin` WHERE login='$login' AND password='$pass'";
        $rs = mysqli_query($con, $sql);
        $rows_all = mysqli_num_rows($rs);
        $rows = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        if($rows_all == 1){
            $info = $rows["0"]['login'].'|'.$rows["0"]['password'].'|'.$rows["0"]['company'].'|'.$rows["0"]['name'].'|'.$rows["0"]['email'];
            setcookie('analytics', $info, time() + 3600, '/');
            header("Location: http://localhost/analytics/admin_user.php");
            exit;
        }
    }
        mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="icon" type="image/x-icon" href="icon.png">

</head>
<body>
    <img src="bgre.png" id="bgreg">
    <a href="http://localhost/analytics/index.html" id="a_back">
        <img src="back.png" id="imgback">
    </a>
    <div id="form">
        <form method="POST">
            <input type="text" name="login" placeholder="    Логин" id="input"><br>
            <input type="password" name="password"  placeholder="    Пароль" id="input"><br>
            <p>
                Еще нет аккаунта?
                <a href="http://localhost/analytics/login.php" id="a_form">
                    Зарегистрируйтесь
                </a>
            </p>
            <input type="submit" name="submit" value="Войти" id="signup_send">
        </form>
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
    width:100%;
    position:absolute;
    top:50%;
    transform: translate(0%, -50%);
}
img{
    pointer-events: none;
}
#bgreg{
    width: 100%;
    filter: blur(25px);
}
#imgback{
    width: 56px;
    height: 56px;
}
#a_back{
    position: absolute;
    top: 21px;
    left: 21px;
}
#form{
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, 0%);
}
#input{
    width: 638px;
    height: 74px;
    border-radius: 14px;
    border: 4px solid #DC1E82;
    color: #6C6C6C;
    font-size: 25px;
    margin: 5.5px;
}
#input1{
    width: 309.5px;
    height: 74px;
    border-radius: 14px;
    border: 4px solid #DC1E82;
    color: #6C6C6C;
    font-size: 25px;
    margin: 5.2px;
    padding: 0px;
}
#signup_send{
    border-radius: 14px;
    border: none;
    background: #DC1E82;
    width: 112px;
    height: 56px;
    color: white;
    position: absolute;
    left: 50%;
    transform: translate(-50%, 0%);
    font-size: 25px;
    padding:0px;
}
#a_form{
    text-decoration: none;
    color: #DC1E82;
}
</style>
