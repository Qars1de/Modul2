<?php
session_start();
require_once 'connect.php';
    $id_ist=$_POST['id_ist'];
    $vrach=$_POST['vrach'];
    $pacient=$_POST['pacient'];
    $postyp=$_POST['postyp'];
    $vip=$_POST['vip'];
    $diag=$_POST['diag'];
    $naznach=$_POST['naznach'];

    

    $error_fields = [];

    if ($naznach === '') {
        $error_fields[] = 'id_ist';
    }
    
    if ($vrach === '') {
        $error_fields[] = 'vrach';
    }
    
    if ($pacient === '') {
        $error_fields[] = 'pacient';
    }
    if ($vip === '') {
        $error_fields[] = 'vip';
    }
    if ($diag === '') {
        $error_fields[] = 'diag';
    }
    if ($naznach === '') {
        $error_fields[] = 'naznach';
    }
    
    
    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];
    
        echo json_encode($response);
    
        die();
    }
    else{
        mysqli_query($connect, "INSERT INTO `med_istoriya` (`id_istorii`, `id_vracha`, `id_pacienta`, `Data_postypleniya`, `Data_Vipiski`, `id_diagnoza`, `id_naznachenya`) VALUES (NULL, '$vrach','$pacient','$postyp','$vip','$diag','$naznach')");
        $response = [
            "status" => true,
            "message" => "Регистрация прошла успешно!",
        ];
        echo json_encode($response);
    }
 ?>