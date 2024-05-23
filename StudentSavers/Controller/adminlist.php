<?php

//M
require_once "../Model/dataAccess.php";
require_once "../Model/admin.php";

/*
//C
//session_start();

if(!isset($_SESSION["ActualUser"]))
{
    $_SESSION["ActualUser"] = [];
}

$actualUser = $_SESSION["ActualUser"];

$status = false;

if(isset($_REQUEST["login"]))
{
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    if($password != "" && $email != "")
    {
        $Admin = new Admin();
        $Admin->email = htmlentities($email);
        $Admin->password = htmlentities($password);

        if($email == "admin@studentsavers.com" && $password =="Admin123")
        {
          
            header("Location: ../Controller/addandupdate.php");
        }
        else
        {
            $status  = "You do not have an account, please make one on the register page";
            header("Location: ../Controller/adminlist.php");
        }
    }
}
*/

if(!isset($_SESSION["ActualUser"]))
{
    $_SESSION["ActualUser"] = [];
}

$actualUser = $_SESSION["ActualUser"];

$status = false;

if(isset($_REQUEST["login"]))
{
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    if($password != "" && $email != "")
    {
        $Admin = new Admin();
        $Admin->email = htmlentities($email);
        $Admin->password = htmlentities($password);

        if(checkUser($Admin) == false)
        {
            $actualUser = Login($Admin);
            $_SESSION["ActualUser"] =  $actualUser;
            header("Location: ../Controller/addandupdate.php");
        }
        else
        {
            $status  = "You do not have an account, please make one on the register page";
            header("Location: ../Controller/adminlist.php");
        }
    }
}

//V
require_once "../View/adminlist_view.php";