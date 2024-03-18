<?php

    $connect = mysqli_connect('localhost', 'root', '', 'bolnica');

    if (!$connect) {
        die('Error connect to DataBase');
    }