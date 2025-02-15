<?php include 'includes/header.php'; ?>
<?php

class Database {
    private $host = "localhost";
    private $db_name = "your_database";
    private $username = "your_username";
    private $password = "your_password";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

$conn = (new Database())->getConnection();

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'reader', 'admin') NOT NULL DEFAULT 'user'
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>



<div class="content">
        <div class="compose">
            <div class="forms">
                <h2>Register</h2>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="first_name">First Name</label>
                    <input class="pull-right" type="text" name="first_name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="middle_name">Middle Name</label>
                    <input class="pull-right" type="text" name="middle_name">
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="last_name">Last Name</label>
                    <input class="pull-right" type="text" name="last_name" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="full_name">Full Name</label>
                    <input class="pull-right" type="text" name="full_name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="date_of_birth">Date of Birth</label>
                    <input class="pull-right" type="date" name="date_of_birth" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="email">Email</label>
                    <input class="pull-right" type="email" name="email" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="password">Password</label>
                    <input class="pull-right" type="password" name="password" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="role">Role</label>
                    <select class="pull-right" name="role">
                        <option value="user">User</option>
                        <option value="reader">Reader</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="action rollIn animated">
                    <button class="btn" type="submit">Register</button>
                </div>
            </div>
        </div>
    </div>


<?php include 'includes/footer.php'; ?>