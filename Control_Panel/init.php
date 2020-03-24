<?php

    include "connect.php";

    header('Content-Type: text/html; charset=utf-8');
    $tpl='Include/Templete/';   // Template Directory
    $lang='Include/Language/';  // Language Directory
    $func='Include/Function/';  // Function Directory
    $css='Layout/css';          // Css Directory
    $js='Layout/js';            // Js Directory


   //Include The Important Files

    include $func.'function.php';
    include $lang.'english.php';
    include $tpl.'header.php';
    include'../CreateFolder.php';
    //Include Navbar On All Pages Expect The one with $noNavbar Variable
    if(!isset($noNavbar)){include $tpl.'navbar.php';}
    if(isset($navSider)){include $tpl.'navSider.php';}
    if(isset($upperbar)){include $tpl.'upper.php';}
    
?>