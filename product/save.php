<?php
include 'product.php';
$obj = new product();

if($_REQUEST['check'] == "delete")
{
    $obj->delete();
}

if($_REQUEST['check'] == "logout")
{
    $obj->logout();
}

if(isset($_REQUEST['submit']) == "check")
{
    if($_REQUEST['check'] == "insert")
    {
        $obj->insert();
    }
    if($_REQUEST['check'] == "registration")
    {
        $obj->register();
    }
    if($_REQUEST['check'] == "login")
    {
        $obj->login();
    }
}
?>