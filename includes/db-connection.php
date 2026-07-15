<?php
/**
 * Database Connection Class
 * 
 * Handles all database operations using MySQLi with prepared statements
 * for security and efficiency.
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $port = DB_PORT;
    private $charset = DB_CHARSET;
    private $connection;
    private $stmt;
    private $error;

    /**
     * Constructor - Initialize database connection
     */
    public function __construct() {
        $this->connect();
    }

    /**
     * Create database connection
     */
    public function connect() {
        try {
            $this->connection = new mysqli(
                $this->host,
                $this->user,
                $this->pass,
                $this->db_name,
                $this->port
            );

            // Check connection
            if ($this->connection->connect_error) {
                throw new Exception('Database Connection Error: ' . $this->connection->connect_error);
            }

            // Set charset
            $this->connection->set_charset($this->charset);

            if (DEBUG) {
                error_log('Database connected successfully');
            }

        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Database Error: ' . $this->error);
            
            if (DEBUG) {
                echo 'Database Error: ' . htmlspecialchars($this->error);
            } else {
                echo 'Database connection failed. Please try again later.';
            }
            exit();
        }
    }

    /**
     * Prepare SQL statement
     * 
     * @param string $sql SQL query
     * @return Database
     */
    public function prepare($sql) {
        try {
            $this->stmt = $this->connection->prepare($sql);
            if (!$this->stmt) {
                throw new Exception('Prepare failed: ' . $this->connection->error);
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Prepare Error: ' . $this->error);
            if (DEBUG) {
                echo htmlspecialchars($this->error);
            }
        }
        return $this;
    }

    /**
     * Bind parameters to prepared statement
     * 
     * @param array $binds Array of parameters with type ('i', 's', 'd', 'b')
     * @return Database
     */
    public function bind($binds = []) {
        if (empty($binds)) {
            return $this;
        }

        try {
            // Build bind parameters
            $types = '';
            $params = [];

            foreach ($binds as $key => $value) {
                if (is_array($value)) {
                    $type = $value[1] ?? 's'; // Default to string
                    $val = $value[0];
                } else {
                    $type = is_int($value) ? 'i' : 's';
                    $val = $value;
                }

                $types .= $type;
                $params[] = $val;
            }

            // Bind parameters
            if (!empty($params)) {
                $this->stmt->bind_param($types, ...$params);
            }

        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Bind Error: ' . $this->error);
        }

        return $this;
    }

    /**
     * Execute the prepared statement
     * 
     * @return bool
     */
    public function execute() {
        try {
            if (!$this->stmt->execute()) {
                throw new Exception('Execute failed: ' . $this->stmt->error);
            }
            return true;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Execute Error: ' . $this->error);
            return false;
        }
    }

    /**
     * Get single row result
     * 
     * @return array|null
     */
    public function getRow() {
        try {
            $result = $this->stmt->get_result();
            return $result ? $result->fetch_assoc() : null;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Get Row Error: ' . $this->error);
            return null;
        }
    }

    /**
     * Get all results as array
     * 
     * @return array
     */
    public function getAll() {
        try {
            $result = $this->stmt->get_result();
            $rows = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
            return $rows;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log('Get All Error: ' . $this->error);
            return [];
        }
    }

    /**
     * Get number of affected rows
     * 
     * @return int
     */
    public function rowCount() {
        return $this->stmt->affected_rows ?? 0;
    }

    /**
     * Get last insert ID
     * 
     * @return int
     */
    public function lastId() {
        return $this->connection->insert_id ?? 0;
    }

    /**
     * Get total count of records
     * 
     * @return int
     */
    public function count() {
        try {
            $result = $this->stmt->get_result();
            return $result ? $result->num_rows : 0;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return 0;
        }
    }

    /**
     * Close database connection
     */
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    /**
     * Get last error
     * 
     * @return string
     */
    public function getError() {
        return $this->error ?? 'Unknown error';
    }

    /**
     * Escape string for safety
     * 
     * @param string $str String to escape
     * @return string
     */
    public function escape($str) {
        return $this->connection->real_escape_string($str);
    }

    /**
     * Transaction: Begin
     */
    public function beginTransaction() {
        return $this->connection->begin_transaction();
    }

    /**
     * Transaction: Commit
     */
    public function commit() {
        return $this->connection->commit();
    }

    /**
     * Transaction: Rollback
     */
    public function rollback() {
        return $this->connection->rollback();
    }
}

?>
