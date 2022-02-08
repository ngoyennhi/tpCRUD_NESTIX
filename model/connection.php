<!-- /**
 * 
 * Connection Database
 *
 * List of functions
 *  - connect
 *  - disconnect
 */ -->
 <?php class Connection
 {
     /**
      * Parameters to connect DB Server Local
      */
     private static $dbName = 'UsersNestixDB';
     private static $dbHost = 'localhost';
     private static $dbUsername = 'root';
     private static $dbUserPassword = 'root';

     private static $cont = null;

     public static function connect()
     {
         try {
             self::$cont = new PDO(
                 'mysql:host=' .
                     self::$dbHost .
                     ';' .
                     'dbname=' .
                     self::$dbName,
                 self::$dbUsername,
                 self::$dbUserPassword
             );
             // set the PDO error mode to exception
             self::$cont->setAttribute(
                 PDO::ATTR_ERRMODE,
                 PDO::ERRMODE_EXCEPTION
             );
             // for test the connection at the beginning
             // echo "Connected successfully";
         } catch (PDOException $e) {
             echo 'Connection failed: ';
             die($e->getMessage());
         }
     }

     public static function getConnection()
     {
         if (!isset(self::$cont)) {
             self::connect();
         }
         return self::$cont;
     }

     public function queryBDD(string $sql)
     {
         $user = '';
         if (null !== self::$cont) {
             try {
                 // set the PDO error mode to exception
                 $sth = self::$cont->prepare($sql);
                 $sth->execute();
                 $user = $sth->fetchAll();
             } catch (PDOException $e) {
                 echo 'Fetch failed: ';
                 die($e->getMessage());
             }
         }
         // echo'LOAD sucessful!';
         return $user;
     }

     public function addUser($lastname, $firstname, $username, $email)
     {
         $user = '';
         if (null !== self::$cont) {
             try {
                 $sql =
                     'INSERT INTO UsersNestix(Firstname,Lastname,Username,Email) VALUES(:Firstname, :Lastname, :Username, :Email)';
                 $sth = self::$cont->prepare($sql);
                 $sth->bindParam(':Firstname', $firstname);
                 $sth->bindParam(':Lastname', $lastname);
                 $sth->bindParam(':Username', $username);
                 $sth->bindParam(':Email', $email);
                 $sth->execute();
                 $user = $sth->fetchAll();
             } catch (PDOException $e) {
                 echo 'Fetch failed: ';
                 die($e->getMessage());
             }
         }
         // echo'ADD sucessful!';
         return $user;
     }

     public function updateUser($id,$firstname, $lastname, $username, $email)
     {
         $user = '';
         if (null !== self::$cont) {
             try {
                 $sql =
                     "UPDATE UsersNestix SET Firstname = :Firstname,Lastname = :Lastname,Username = :Username,Email=:Email WHERE ID = :id";
                 $sth = self::$cont->prepare($sql);
                 $sth->bindParam(':id', $id);
                 $sth->bindParam(':Firstname', $firstname);
                 $sth->bindParam(':Lastname', $lastname);
                 $sth->bindParam(':Username', $username);
                 $sth->bindParam(':Email', $email);
                 $sth->execute();
                 $user = $sth->fetchAll();
             } catch (PDOException $e) {
                 echo 'Fetch failed: ';
                 die($e->getMessage());
             }
         }
         // echo'ADD sucessful!';
         return $user;
     }

     public static function deleteUser($id){
        $user = '';
        if (null !== self::$cont) {
            try {
                $sql = "DELETE FROM UsersNestix WHERE ID = :id";   
                $sth = self::$cont->prepare($sql);
                $sth->bindParam(':id', $id);
                $sth->execute();
                $user = $sth->fetchAll();
            } catch (PDOException $e) {
                echo 'Fetch failed: ';
                die($e->getMessage());
            }
        }
        // echo'DELETE sucessful!';
        return $user;
     }
     
     public static function readUser($id){
        $user = '';
        if (null !== self::$cont) {
            try {
                $sql = 'SELECT * FROM UsersNestix WHERE ID = :id';   
                $sth = self::$cont->prepare($sql);
                $sth->bindParam(':id', $id);
                $sth->execute();
                $user = $sth->fetchAll();
            } catch (PDOException $e) {
                echo 'Fetch failed: ';
                die($e->getMessage());
            }
        }
        // echo'read sucessful!';
        return $user;
     }

     public static function disconnect()
     {
         self::$cont = null;
     }
 }
?>
