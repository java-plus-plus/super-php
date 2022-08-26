<?php
require_once __DIR__ . "/config/SimpleDBConfig.php";

class SimpleDB extends SimpleDBConfig {

    public static array $connections = [];
    public SimpleDBConnection $current_connection;

    public function __construct(
        string $primary_db = null,
        string $username = null,
        string $password = null,
        string $host = null,
        bool $debug = null,
    ) {
        date_default_timezone_set("Asia/Kolkata");
        if ($primary_db)    $this->primary_db = $primary_db;
        if ($username)      $this->username =   $username;
        if ($password)      $this->password =   $password;
        if ($host)          $this->host =       $host;
        if ($debug)         $this->debug =      $debug;
        // echo "Kooi";

        if ($this->debug)
            error_reporting(E_ALL);
        else {
            error_reporting(E_USER_NOTICE);
        }

        foreach (self::$connections as $connection) {
            if ($connection->isMatchingTo(
                db: $this->primary_db,
                username: $this->username,
                password: $this->password,
                host: $this->host,
                debug: $this->debug,
            )) {
                $this->current_connection = $connection;
                echo "Found a connection with the same configuration!" . PHP_EOL;
                return;
            }
        }

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->primary_db . '';
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            if ($this->debug) array_push($options, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $new_connection = new PDO($dsn, $this->username, $this->password, $options);

            echo "Establishing new connection!" . PHP_EOL;

            $this->current_connection = new SimpleDBConnection(
                conn: $new_connection,
                db: $this->primary_db,
                username: $this->username,
                password: $this->password,
                host: $this->host,
                debug: $this->debug,
            );

            array_push(self::$connections, $this->current_connection);

            // About disconnection: If you don't do this explicitly, PHP will automatically close the connection when your script ends
        } catch (Exception $e) {
            if ($this->debug) {
                die("Errer: " . $e->getMessage());
            }
            die("Sorry! technical error please contact the authority");
        }
    }

    /**
     * Get one row from sql query result
     *
     * @param string $sql
     * @param array $dynamic_values
     * @param boolean $debug_dumb
     * @return array|null
     */
    public function getOne(string $sql, array $dynamic_values = null, bool $debug_dumb = false): ?array {
        $stmt = $this->current_connection->conn->prepare($sql);
        $result = $stmt->execute($dynamic_values);
        if ($this->current_connection->debug) $stmt->debugDumpParams();
        if (!$result)
            return $result;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    /**
     * Get all rows from sql query result
     *
     * @param string $sql
     * @param array $dynamic_values
     * @param boolean $debug_dumb
     * @return array
     */
    public function getAll(string $sql, array $dynamic_values = null, bool $debug_dumb = false): array {
        // echo $sql;
        $stmt = $this->current_connection->conn->prepare($sql);
        $result = $stmt->execute($dynamic_values);
        if ($this->current_connection->debug) {
            $stmt->debugDumpParams();
        }
        if (!$result)
            return $result;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    /**
     * Execute MySQL queries that doesn't return any results
     *
     * @param string $sql
     * @param array $dynamic_values
     * @param boolean $debug_dumb
     * @return boolean
     */
    public function run(string $sql, array $dynamic_values = null, bool $debug_dumb = false): bool {
        # code...
        $stmt = $this->current_connection->conn->prepare($sql);
        $htmlescaped_dynamic_values = [];
        foreach ($dynamic_values as $val) {
            $htmlescaped_dynamic_values[] = htmlspecialchars($val);
        }
        $res = $stmt->execute($htmlescaped_dynamic_values);

        if ($this->current_connection->debug) {
            $stmt->debugDumpParams();
        }
        return $res;
    }

    public function getLastInsertedID() {
        # code...
        return $this->current_connection->conn->lastInsertId();
    }
}

class SimpleDBConnection {
    /**
     * The db connection information
     *
     * @param PDO $conn        - Database connection object (PDO class)
     * @param string $db        - Database name
     * @param string $username  - Database user username
     * @param string $password  - Database user password
     * @param string $host      - Database server host
     * @param boolean $debug    - Debug type (is debug?)
     */
    function __construct(
        public PDO $conn,
        public string $db,
        public string $username,
        public string $password,
        public string $host,
        public bool $debug
    ) {
    }

    function isMatchingTo(
        string $db,
        string $username,
        string $password,
        string $host,
        bool $debug
    ) {
        return $this->db == $db &&
            $this->username == $username &&
            $this->password == $password &&
            $this->host == $host &&
            $this->debug == $debug;
    }
}
