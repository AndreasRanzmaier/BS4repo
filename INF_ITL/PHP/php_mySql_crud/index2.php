<!DOCTYPE html>
<html>

<head>
    <title>Database CRUD Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    // Include the database functions
    include 'functions.php';

    // Connect to the database
    dbConnect();

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Insert data into the database
        if (isset($_POST['insert'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $query = "INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)";
            $bindParams = array($name, $email, $phone);

            makeStatement($query, $bindParams);
        }

        // Update data in the database
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $query = "UPDATE contacts SET name = ?, email = ?, phone = ? WHERE id = ?";
            $bindParams = array($name, $email, $phone, $id);

            makeStatement($query, $bindParams);
        }

        // Delete data from the database
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            // Check if the ID exists before deleting
            $query = "SELECT COUNT(*) FROM contacts WHERE id = ?";
            $bindParams = array($id);
            $result = makeStatement($query, $bindParams);

            if ($result[0][0] > 0) {
                $query = "DELETE FROM contacts WHERE id = ?";
                $bindParams = array($id);
                makeStatement($query, $bindParams);
            } else {
                echo "<div class='alert alert-danger'>ID $id does not exist.</div>";
            }
        }
    }

    // Fetch all tables from the database
    $tables = $GLOBALS["con"]->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    ?>

    <div class="container">
        <h1>Database CRUD Example</h1>
        <?php
        foreach ($tables as $table) {
            echo "<h2 id='$table'>$table</h2>";

            // Fetch all rows from the current table
            $result = $GLOBALS["con"]->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                echo "<table class='table table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                foreach ($result[0] as $key => $value) {
                    echo "<th scope='col'>$key</th>";
                }
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No data found in the '$table' table.</p>";
            }
        }
        ?>

        <h2>Add New Contact</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" name="insert" class="btn btn-primary">Add Contact</button>
        </form>

        <h2>Update Contact</h2>
        <form method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Contact</button>
        </form>

        <h2>Delete Contact</h2>
        <form method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" class="form-control" required>
            </div>
            <button type="submit" name="delete" class="btn btn-danger">Delete Contact</button>
        </form>
    </div>
</body>

</html>