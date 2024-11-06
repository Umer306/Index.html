// admin_panel.php
// Database connection
$connection = new mysqli('localhost', 'username', 'password', 'database_name');
// admin_panel.php
echo '<a href="user_dashboard.php">Go to User Dashboard</a>';
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Users ka data fetch karna
$query = "SELECT * FROM users";  // 'users' table mein saara user data hona chahiye
$result = $connection->query($query);

echo "<h2>All Users Data:</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Country</th>
                <th>Registration Date</th>
            </tr>";
    while ($user = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $user['id'] . "</td>
                <td>" . $user['name'] . "</td>
                <td>" . $user['email'] . "</td>
                <td>" . $user['mobile'] . "</td>
                <td>" . $user['country'] . "</td>
                <td>" . $user['created_at'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

$connection->close();