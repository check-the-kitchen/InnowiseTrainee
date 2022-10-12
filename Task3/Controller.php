<?php

namespace Task3;


//require ("Model.php");

$model=new Model();
if(isset($_POST['edit'])) {
   $model->updateRecord($_POST['edit'],$_POST);
   $_POST=array();
    echo "<meta http-equiv='refresh' content='0'>";

}

if(isset($_POST['delete'])) {
    $model->deleteRecord($_POST['delete']);
    $_POST=array();
    //echo "<meta http-equiv='refresh' content='0'>";
}


if(isset($_POST['add'])) {
    $model->insertRecord($_POST);
    $_POST=array();
    echo "<meta http-equiv='refresh' content='0'>";
}

