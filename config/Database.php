<?php 
class Database {
    private $host = DB_HOST;
    private $name = DB_NAME;
    private $user = USER;
    private $password = PASSWORD;
    private $dbh;
    private $stmt;
    private $error;
    function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $options = [
            PDO::ATTR_PERSISTENT    => true, // Persistent connection
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION, // Error mode
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo 'Connection failed: ' . $this->error;
        }
    }

    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }

    public function getAllResults() {
         $this->stmt->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}