<?php ini_set('display_errors', 'on'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NesTix Users</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
  <div class="container">
    <div class="row">
    <h2>Users</h2>
    </div>
    <div class="row">
    <a href="add.php" class="btn btn-success">Add a user</a>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-bordered ">
        <thead> 
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Email</th>
        </thead>
        <tbody>
        <?php
        include 'model/connection.php';
        //we include our connection file
        $pdo = new Connection();
         //we connect to database
        $pdo->getConnection();


        //we formulate our request/ query
        $sql = 'SELECT * FROM UsersNestix';
        $users = $pdo->queryBDD($sql);


        //Display our database into a table
        foreach ($users as $row) {
            //we create the rows of the table with each returned value
            echo '<tr>';
            echo '<td>' . $row['ID']. '</td>';
            echo '<td>' . $row['Firstname'] . '</td>';
            echo '<td>' . $row['Lastname'] . '</td>';
            echo '<td>' . $row['Username'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';

            // add an another <td> for the edit button
            echo '<td>' .
                '<a class="btn btn-primary" href="edit.php?id='.$row['ID'].
                '">Read</a>';
            // add an another <td> for the update button
            echo '<a class="btn btn-success" href="update.php?id=' .
                $row['ID'] .
                '">Update</a>';
            // add an another <td> for the delete button
            echo '<a class="btn btn-danger" href="delete.php?id=' .
                $row['ID'] .
                ' ">Delete</a>';
        }

        $pdo->disconnect();
        ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>
</html>