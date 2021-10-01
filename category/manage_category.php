<?php
include 'category.php';
$obj = new category();

if($_REQUEST['check'] == "delete")
{
    $obj->delete();
}
if(isset($_REQUEST['submit']) == "check")
{
    if($_REQUEST['check'] == "insert")
    {
        $obj->insert();
    }
}
?>