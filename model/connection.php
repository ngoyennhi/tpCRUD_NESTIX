<!-- /**
 * 
 * Connection Database
 *
 * List of functions
 *  - connect
 *  - disconnect
 */ -->
 <?php
class Connection
{   /**
    * Parameters to connect DB
    */
    private static $dbName = 'UsersNestixDB';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = "root";
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
                  self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: ";
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
                echo "Fetch failed: ";
                die($e->getMessage());
            }
        }
        return $user;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
