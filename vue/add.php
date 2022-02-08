<?php
// GET All errors if we have
$lastnameError = filter_input(INPUT_GET,'lastNameError');
$firstnameError = filter_input(INPUT_GET,'firstNameError');
$usernameError = filter_input(INPUT_GET,'userNameError');
$emailError = filter_input(INPUT_GET,'emailError');
// get value of id form URL
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD an user</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Ajouter un contact</h3>
            <form action="../controller/c_add.php" method="post">       
                <!-- last name -->
                <div class="form-group">   
                                <label class="control-label">Last Name</label>
                                <input name="Lastname"  class="form-control" type="text" placeholder="Lastname" value="<?php echo !empty($lastname)?$lastname:'';?>">
                                <?php if (!empty($lastnameError)): ?>
                                    <span class="help-inline"><?php echo $lastnameError; ?></span>
                                <?php endif; ?>
                </div>
                <div class="col-sm-9 <?php echo !empty($lastnameError)?'error':'';?>">
                </div>

                <!-- first name -->
                <div class="form-group">   
                                <label class="control-label">First Name</label>
                                <input name="Firstname" class="form-control" type="text"  placeholder="Firstname" value="<?php echo !empty($firstname)?$firstname:'';?>">
                                <?php if (!empty($firstnameError)): ?>
                                    <span class="help-inline"><?php echo $firstnameError;?></span>
                                <?php endif; ?>
                </div>
                <div class="col-sm-9 <?php echo !empty($firstnameError)?'error':'';?>">
                </div>

                <!-- username -->
                <div class="form-group">   
                                <label class="control-label">User Name</label>
                                <input name="Username" class="form-control" type="text"  placeholder="Nhi123" value="<?php echo !empty($username)?$username:'';?>">
                                <?php if (!empty($usernameError)): ?>
                                    <span class="help-inline"><?php echo $usernameError; ?></span>
                                <?php endif; ?>
                </div>
                <div class="col-sm-9 <?php echo !empty($firstnameError)?'error':'';?>">
                </div>

                <!-- email -->
                <div class="form-group">   
                                <label for="exampleFormControlInput1">Email address</label>
                                <input name="Email" class="form-control" type="text"  placeholder="Nhi123@gmail.com" value="<?php echo !empty($email)?$email:'';?>">
                                <?php if (!empty($emailError)): ?>
                                    <span class="help-inline"><?php echo $emailError; ?></span>
                                <?php endif; ?>
                </div>
                <div class="col-sm-9 <?php echo !empty($firstnameError)?'error':'';?>"></div>
                 <!-- SUBMIT or back -->
                <div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn btn-warning" href="../index.php">Retour</a>
                </div>
             </form>
        </div> 
    </div>
</body>
</html>
