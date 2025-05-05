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
            <h1 class="text-center">User Management</h1>
        </div>
    </header>

    <!-- Shift Content to the Right -->
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col">
                <div class="table-responsive" style="margin-left:500px; margin-top:-300px;">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th style="width:200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../db_conn.php";
                                $sql = "SELECT * FROM users WHERE role='user'";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['password']) ?></td>
                                <td>
                                <div style="display: flex; gap: 5px;">
                                    <a href="edit_user.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="delete_user.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </tr>
                            <?php
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