<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Student Mark List</h1>
    <table>
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "school";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT roll_number, name, subject, marks FROM students";
            $result = $conn->query($sql);

            // Display data in table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['roll_number']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['subject']}</td>
                            <td>{$row['marks']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>


INSERT INTO students (roll_number, name, subject, marks) VALUES
(1, 'John Doe', 'Math', 85),
(2, 'Jane Smith', 'Science', 90),
(3, 'Alice Brown', 'English', 78);
