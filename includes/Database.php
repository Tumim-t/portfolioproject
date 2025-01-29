<?php
class Database {
    private static $dbConnection;

    public static function getConnection() {
        if (!self::$dbConnection) {
            try {
                
                self::$dbConnection = new PDO("mysql:host=localhost;dbname=portfolio", 'root', '');
                self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
               
                echo "Connection failed: " . $e->getMessage();
                exit();
            }
        }

        return self::$dbConnection;
    }
}
?>


