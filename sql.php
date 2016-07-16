<?php
class PG {
  public static function main() {
    define('DB_SERVER', "127.0.0.1");
    define('DB_USER', "postgres");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "test");
    define('DB_DRIVER', "mysql");

    $country = 'Canada';
    $capital = 'Ottawa';
    $language = 'English & French';

    try {
        $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO countries(name, capital, language) VALUES (:country, :capital, :language)");

        $stmt->bindParam(':country', $country, PDO::PARAM_STR, 100);
        $stmt->bindParam(':capital', $capital, PDO::PARAM_STR, 100);
        $stmt->bindParam(':language', $language, PDO::PARAM_STR, 100);

        if($stmt->execute()) {
          echo '1 row has been inserted';  
        }
        
        $stmt = $db->prepare("SELECT * FROM countries");

        $result=$stmt->execute();

        $db = null;
        return $result;
    } catch(PDOException $e) {
        trigger_error('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
    }
  }
}
?>
