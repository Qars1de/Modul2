<?php
session_start();
unset($_SESSION['users']);
header('Location: ../avt.php');