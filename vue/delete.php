<?php
//l’appel à la base
include '../model/connection.php';
// get value of id form URL
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if (is_int($id)) {
    //we include our connection file
    $cont = new Connection();
    //we connect to database
    $cont->getConnection();
    $sql = "DELETE FROM utilisateur WHERE ID = :id";
    $sth = $cont->deleteUser($id);
    // Success notice and the link comeback page index.php
    header('Location:../index.php');
} 
?>