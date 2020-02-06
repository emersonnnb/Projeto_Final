<?php

    session_start();
    session_destroy('login');
    header("Location: login.php");

?>