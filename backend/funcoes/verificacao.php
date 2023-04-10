<?php
    function loged() {
        session_start();
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
    }

    function logoff() {
        session_start();
        unset($_SESSION['loggedin']);
    }
