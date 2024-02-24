<?php
    if(isset($_POST['submit'])){
        $info = $_COOKIE['analytics'];
        $info_array = explode('|', $info);
        $login = $info_array[0];
        $password = $info_array[1];
        $company = $info_array[2];
        $name_in = $info_array[3];
        $email = $info_array[4];

        $name= $_POST['name'];
        $chel= $_POST['chel'];
        $name_mer= $_POST['name_mer'];
        $date_start= $_POST['date_start'];
        $date_end= $_POST['date_end'];
        $result= $_POST['result'];
        $stat_zatr= $_POST['stat_zatr'];
        $sum12= $_POST['sum12'];
        $sum22= $_POST['sum22'];
        $sum32= $_POST['sum32'];
        $sum42= $_POST['sum42'];
        $istok= $_POST['istok'];
        $sum13= $_POST['sum13'];
        $sum23= $_POST['sum23'];
        $sum33= $_POST['sum33'];
        $sum43= $_POST['sum43'];
        $product= $_POST['product'];
        $sum14= $_POST['sum14'];
        $sum24= $_POST['sum24'];
        $sum34= $_POST['sum34'];
        $sum44= $_POST['sum44'];
        $vid_product= $_POST['vid_product'];
        $col1= $_POST['col1'];
        $col2= $_POST['col2'];
        $col3= $_POST['col3'];
        $col4= $_POST['col4'];
        $date_sost= $_POST['date_sost'];
        $sotrud= $_POST['sotrud'];
        $nalog= $_POST['nalog'];
        $col_products= $_POST['col_products'];
        $geog= $_POST['geog'];
        $popravki= $_POST['popravki'];
        $isk= $_POST['isk'];
        $date= $_POST['date'];
    
        $con = mysqli_connect("хост", "пользователь", "пароль", "название");
        if (!$con){
            die("Connection failed!" . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `forms`";
        $rs = mysqli_query($con, $sql);
        $rows_all = mysqli_num_rows($rs);
        $rows_all=$rows_all+1;

        $sql = "INSERT INTO forms (name, number, company)VALUES ('$name_in','$rows_all','$company')";
        $rs = mysqli_query($con, $sql);
        mysqli_close($con);


$data=[
    ["Наименование проекта:",$name],
    ["Цель проекта:",$chel],
    ["1.       Основные этапы реализации проекта"],
    ["Наименование мероприятия","Дата начала","дата окончания","Результат от реализации мероприятия"],
    [$name_mer,$date_start,$date_end,$result],
    ["2.       Структура затрат проекта"],
    ["Статья затрат проекта","1 кв.","2 кв.","3 кв.","4 кв."],
    [$stat_zatr,$sum12,$sum22,$sum32,$sum42],
    ["3. Источники финансирования проекта"],
    ["Источник","1 кв.","2 кв.","3 кв.","4 кв."],
    [$istok,$sum13,$sum23,$sum33,$sum43],
    ["4. Основные параметры проекта"],
    ["Выручка, руб."],
    [$product,$sum14,$sum24,$sum34,$sum44],
    ["Объем реализации продукции, натуральные единицы шт. и т.д.)"],
    [$vid_product,$col1,$col2,$col3,$col4],
    ["5. Прочая информация о проекте по состоянию на ", $date_sost],
    ["5.1 Численность работников  на отчетную дату, чел", $sotrud],
    ["5.2 Сумма  уплаченных налогов, сборов, страховых взносов (без НДС), руб.", $nalog],
    ["5.3 Номенклатура производимой продукции (кол-во работ, услуг), ед.", $col_products],
    ["5.4 География поставок (кол-во субъектов РФ в которые осуществляются поставки товаров, работ, услуг), ед.", $geog],
    ["5.5 Внесение изменений  в учредительные документы ( изменение состава собственников,  руководства, кодов ОКВЭД и др.)", $popravki],
    ["5.6 Наличие судебных исков (проект-ответчик)", $isk],
    ["Организация подтверждает, что вся выше приведенная информация является подлинной."],
    ["Дата заполнения: ",$date]
];
$filename = "$rows_all.csv";
$fp = fopen("forms/$filename", 'w');
foreach ($data as $rows) {
    fputcsv($fp, $rows);
}
fclose($fp);
header("Location: http://localhost/analytics/index.html");
exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Отчет - "<?php $info = $_COOKIE['analytics'];$info_array = explode('|', $info);echo $info_array[3]; ?>"</title>
        <link rel="icon" type="image/x-icon" href="icon.png">
    </head>
    <body>
        <img src="icon.png" id="logo">
        <form method='POST'>
                <input type='text' name='name' placeholder="    Имя проекта">
                <input type='text' name='chel' placeholder="    Цель проекта">
            <br>
                <legend>1. Основные этапы реализации проекта.</legend><br>
                <input type='text' name='name_mer' placeholder="    Наименование мероприятия">
                <input type='text' name='date_start' placeholder="    Дата начала">
                <input type='text' name='date_end' placeholder="    Дата конца"><br>
                <input type='text' name='result' placeholder="    Результат от реализации мероприятия">
                <p id="c1"></p>
            <br>
                <legend>2. Структура затрат проекта.</legend><br>
                <legend>Фактические затраты по проекту, руб</legend><br>
                <input type='text' id='kvartal' value="1 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="2 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="3 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="4 кв." placeholder="    Дата">
                <input type='text' name='stat_zatr' placeholder="    Статья затрат проекта"><br>
                <input type='number' name='sum12' placeholder="    Сумма">
                <input type='number' name='sum22' placeholder="    Сумма">
                <input type='number' name='sum32' placeholder="    Сумма">
                <input type='number' name='sum42' placeholder="    Сумма">
            <br>
                <legend>3. Источники финансирования проекта.</legend>
                <input type='text' id='kvartal' value="1 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="2 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="3 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="4 кв." placeholder="    Дата">
                <input type='text' name='istok' placeholder="    Источник"><br>
                <input type='number' name='sum13' placeholder="    Сумма">
                <input type='number' name='sum23' placeholder="    Сумма">
                <input type='number' name='sum33' placeholder="    Сумма">
                <input type='number' name='sum43' placeholder="    Сумма">
            <br>
                <legend>4. Основные параметры.</legend><br>
                <legend>Выручка, руб</legend>
                <input type='text' id='kvartal' value="1 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="2 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="3 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="4 кв." placeholder="    Дата">
                <input type='text' name='product' placeholder="    Виды продукции"><br>
                <input type='number' name='sum14' placeholder="    Сумма">
                <input type='number' name='sum24' placeholder="    Сумма">
                <input type='number' name='sum34' placeholder="    Сумма">
                <input type='number' name='sum44' placeholder="    Сумма"><br>
                <legend>Объем реализации продукции, натуральн, штуки</legend>
                <input type='text' id='kvartal' value="1 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="2 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="3 кв." placeholder="    Дата">
                <input type='text' id='kvartal' value="4 кв." placeholder="    Дата">
                <input type='text' name='vid_product' placeholder="    Виды продукции"><br>
                <input type='number' name='col1' placeholder="    Кол-во">
                <input type='number' name='col2' placeholder="    Кол-во">
                <input type='number' name='col3' placeholder="    Кол-во">
                <input type='number' name='col4' placeholder="    Кол-во">
            <br>
                <label>5. Прочая информация по состоянию на </label><input type='text' name='date_sost' placeholder="    Дата"><br>
                <legend>5.1 Численность работников на отчетную дату</legend><br><input type='text' name='sotrud'><br>
                <legend>5.2 Сумма уплаченых налогов, сборов, страховых вхносов (без НДС), руб.</legend><br><input type='text' name='nalog'><br>
                <legend>5.3 Нуменклатура производимой продукции (кол-во работ, услуг), ед.</legend><br><input type='text' name='col_products'><br>
                <legend>5.4 География поставок (кол-во субъектов РФ в которые осуществляются<br> поставки товаров, работ, услуг), ед.</legend><br><input type='text' name='geog'><br>
                <legend>5.5 Внесение изменений в учредительные документы (изменение<br> состава собственников, руководства, кодов ОКВЭД и др.)</legend><br><input type='text' name='popravki'><br>
                <legend>5.6 Наличие судебных исков (проект-ответчик)</legend><br><input type='text' name='isk'><br>
            <legend>Организация подтверждает, что вся выше приведенная информация<br> является подлинной, соответствует истинным фактам и выражает<br> согласие на проведение дальнейшего анализа предприятия.</legend> 
            <label>Дата заполнения</label><input type='text' name='date' placeholder="    Дата">
            <input type='submit' name='submit' value='Отправить'>
        </form>
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
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        
    }
    input{
        border-radius: 14px;
        border: 7px solid #EFEFEF;
        font-size: 30px;
        margin: 7.5px;
        height: 91px;
    }
    input[name="name"]{width: 1084px;}
    input[name="chel"]{width: 1084px;}
    input[name="name_mer"]{width: 540px;}
    input[name="date_start"]{width: 234px;}
    input[name="date_end"]{width: 234px;}
    input[name="result"]{width: 1084px;}
    #kvartal{width: 243px;}
    input[name="stat_zatr"]{width: 1084px;}
    input[name="sum12"],input[name="sum22"],input[name="sum32"],input[name="sum42"]{width: 243px;}
    input[name="istok"]{width: 1084px;}
    input[name="sum13"],input[name="sum23"],input[name="sum33"],input[name="sum43"]{width: 243px;}
    input[name="product"]{width: 1084px;}
    input[name="sum14"],input[name="sum24"],input[name="sum34"],input[name="sum44"]{width: 243px;}
    input[name="vid_product"]{width: 1084px;}
    input[name="col1"],input[name="col2"],input[name="col3"],input[name="col4"]{width: 243px;}
    input[name="date_sost"]{width: 200px;height: 63px;}
    input[name="sotrud"]{width: 964px;}
    input[name="nalog"]{width: 964px;}
    input[name="col_products"]{width: 964px;}
    input[name="popravki"]{width: 964px;}
    input[name="geog"]{width: 964px;}
    input[name="isk"]{width: 964px;}
    input[name="date"]{width: 200px;height: 63px;}
    input[name="submit"]{
        width: 186px;
        height: 70px;
        border-radius: 14px;
        border: none;
        background: #DC1E82;
    }
    form{
        position:absolute;
        left: 15%;
        top: 12%;
        padding-bottom: 10%;
    }
    #logo{
    position: absolute;
    top: 2%;
    right: 12%;
    }
</style>
