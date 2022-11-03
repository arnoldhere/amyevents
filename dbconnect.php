<!-- Connection for database -->
<?php
//class for database 
class newdb
{
    private $server = "mysql:host=localhost;dbname=pdo_event_db";
    private $usernm = "root";
    private $password = "";
    protected $connection = null;

    //openconnection
    public function openConnection()
    {

        try {
            $this->connection = new PDO($this->server, $this->usernm, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "<br>Successfully connection made<br>";

            return $this->connection;
        } catch (PDOException $e) {
            echo "Error in connection  " . $e->getMessage();
        }
    }
    public function closeConnetion()
    {
        $this->connection = null;
    }
}
?>