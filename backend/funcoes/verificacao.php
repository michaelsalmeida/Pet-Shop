<?php
    function loged() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
    }

    function logoff() {
        session_start();
        unset($_SESSION['loggedin']);
    }
