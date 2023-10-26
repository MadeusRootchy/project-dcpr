<?php

    define("server","localhost");
    define("username","root");
    define("password","");
    define("database","base_dcpr");
    include_once("connect.php");

    function use_mysqli(){
            return connect_mysqli(server,username,password,database);
        }
?>