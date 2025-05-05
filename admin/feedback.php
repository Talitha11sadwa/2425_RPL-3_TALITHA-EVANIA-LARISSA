<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Admin Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index_admin.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav class="sidebar">
        <div class="text">
            <img src="../image/Neuronworks.png" alt="Menu Image">
        </div>
        <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data_user.php">Data User</a></li>
                <li><a href="data_quiz.php">Data Quiz</a></li>
                <li><a href="quiz_result.php">Data Hasil Quiz</a></li>
                <li><a href="feedback.php">Data Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
    </nav>

    <header>
        <div class="container mt-3">
            <h1 class="text-center">Feed Management</h1>
        </div>
    </header>

    <!-- Shift Content to the Right -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="table-responsive" style="margin-left:450px; margin-top:-290px;">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th >ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Komentar</th>
                                <th>Waktu</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../db_conn.php";
                                $sql = "SELECT * FROM feedback  ";
                                $result = $conn->query($sql);

                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                                        echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td>".$row['pesan']."</td>";
                                        echo "<td>".$row['waktu']."</td>";
                                        
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
