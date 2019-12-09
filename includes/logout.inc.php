<?php

session_start();
session_destroy();
if (session_destroy()) {
    header('Location:../login/login.php');
}
