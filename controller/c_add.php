<?php
//mettre cet morceau de code pour savoir l'erreur si l'on a
error_reporting(E_ALL);
ini_set('display_errors','On');

//l’appel à la base
include '../model/connection.php';

// traiter et sécuriser
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    //on initialise nos messages d'erreurs;
    $lastnameError = '';
    $firstnameError = '';
    $usernameError = '';
    $emailError = '';

    // on recupère nos valeurs
    $lastname = htmlentities(trim($_POST['Lastname']));
    $firstname = htmlentities(trim($_POST['Firstname']));
    $username = htmlentities(trim($_POST['Username']));
    $email = htmlentities(trim($_POST['Email']));

    // we check our fields $valid = true;
    $valid = true;
    // check last name
    if (empty($lastname)) {
        $lastnameError = 'Please enter the last name of your new user';
        $valid = false;
    } elseif (!preg_match('/^[a-zA-Z]/', $lastname)) {
        $lastnameError = 'Only letters and white space allowed';
        $valid = false;
    } elseif (strlen($lastname) > 255) {
        $lastnameError = 'Your last name is too long';
        $valid = false;
    } 

    // check first name
    if (empty($firstname)) {
        $firstnameError = 'Please enter the first name of your new user';
        $valid = false;
    } elseif (!preg_match('/^[a-zA-Z]/', $firstname)) {
        $firstnameError = 'Only letters and white space allowed';
        $valid = false;
    }     elseif (strlen($firstname) > 255) {
       $firstnameError = 'Your first name is too long';
        $valid = false;   }
   

    // check username
    if (empty($username)) {
        $usernameError = 'Please enter the username of your new user';
        $valid = false;
    } elseif (!preg_match('/^[0-9a-zA-Z]/', $username)) {
        $usernameError = 'Only letters and numbers allowed';
        $valid = false;
    } 

    //check email
    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    } 

    // if the data is not NULL and $valid = TRUE, we connect to the database
    if ($valid) {  
        //we include our connection file
        $cont = new Connection();
         //we connect to database
        $cont->getConnection();
        $sth = $cont->addUser($firstname,$lastname,$username, $email);     
       // Success notice and the link comeback page index.php
        header("Location:form-merci.php");   
    } else{
               // UnSuccess notice and the link comeback page add.php with params
               header("Location:../add.php?lastNameError=".$lastnameError."&firstNameError=".$firstnameError."&userNameError=".$usernameError."&emailError=".$emailError);  
               
    }
}
?>
