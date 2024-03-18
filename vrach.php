<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История болезней</title>
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>
    
    <?php
    session_start();
    include 'header.php';
    include 'connect.php';

    $query = "SELECT `id_istorii`, vrach.Surname, pacient.Surname, `Data_postypleniya`, `Data_Vipiski`, diagnoz.Nazvanie, naznacheniya.Opisanie FROM `med_istoriya` JOIN naznacheniya on naznacheniya.id_naznacheniya = med_istoriya.id_naznachenya JOIN vrach on vrach.id_vracha = med_istoriya.id_vracha join pacient on pacient.id_pacienta = med_istoriya.id_pacienta JOIN diagnoz on diagnoz.id_diagnoza = med_istoriya.id_diagnoza";
    $b = mysqli_query($connect, $query);
    print("
        <table border=1  align=center width=90% cellpadding=5 valign=top>
        <tr bgColor=#98FB98 align=center>
        <td width=8%><b>Код истории</b></td>
        <td><b>Врач</b></td>
        <td><b>Пациент</b></td>
        <td><b>Дата поступления</b></td>
        <td><b>Дата выписки</b></td>
        <td><b>Диагноз</b></td>
        <td><b>Назначение</b></td>
        </tr>
    ");

    while ($a = mysqli_fetch_array($b))
    {
        $id_istorii=$a['0'];
        $vrach=$a['1'];
        $pacient=$a['2'];
        $post=$a['3'];
        $vip = $a['4'];
        $diagnoz = $a['5'];
        $naznacheniya = $a['6'];
        print("<tr align=top>
        <td width=8% align=center bgColor=#98FB98>$id_istorii</td>
        <td align=center bgColor=#48D1CC>$vrach</td>
        <td align=center bgColor=#48D1CC>$pacient</td>
        <td align=center bgColor=#48D1CC>$post</td>
        <td align=center bgColor=#48D1CC>$vip</td>
        <td align=center bgColor=#48D1CC>$diagnoz</td>
        <td align=center bgColor=#48D1CC>$naznacheniya</td>
        </tr>");
    }
    print("</table>");
    mysqli_close($connect);
    ?>
    <form ><br>
<label>id истории</label>
<input type="text" name="id_ist"><br>
<label>Врач</label>
<input type="text" name="vrach"><br>
<label>Пациент</label>
<input type="text" name="pacient"><br>
<label>Дата поступления</label>
<input type="date" name="postyp"><br>
<label>Дата выписки</label>
<input type="date" name="vip"><br>
<label>Диагноз</label>
<input type="text" name="diag">
<label>Назначение</label>
<input type="text" name="naznach">
<button type="submit" class="add-btn">Отправить</button>
</form>
<script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>