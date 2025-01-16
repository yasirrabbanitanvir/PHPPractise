<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <br>
    <form action="create.php" method='post' enctype="multipart/form-data">
        <input type="text" name='name' placeholder="Enter your name">
        <input type="email" name='email' placeholder="Enter your email">
        <input type="password" name='password' placeholder="Enter your password">
        <input type="file" name='upload_image' value="Upload">
        <input type="submit" name='submit' value='Submit'>
    </form>
    <br>

    <?php

    $connection = mysqli_connect('localhost', 'root', '', 'users');
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM `user_info`";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    ?>

    <form action="" method="get">
        <input type="text" name='search_name' placeholder="Search by the any letter of a user">
        <input type="submit" name='search' value='Search' class="btn btn-info">
    </form>

    <?php

    if (isset($_REQUEST['search']) && !empty($_REQUEST['search_name'])) {
        $recv_search = '%' . $_GET['search_name'] . '%';
        $search_query = "SELECT * FROM `user_info` WHERE `username` LIKE '$recv_search'";
        $search_result = mysqli_query($connection, $search_query);
        if ($search_result) {
            while ($row = mysqli_fetch_object($search_result)) {
                echo "Username: " . $row->username . "<br>";
                echo "ID: " . $row->id . "<br>";
            }
        }

    }

    ?>

    <?php
    if (isset($_REQUEST['deleted'])) {
        echo "<font color='green'>Data is deleted</font>";
    }
    ?>

    <?php
    if (isset($_REQUEST['updated'])) {
        echo "<font color='green'>Data is updated</font>";
    }
    ?>

    <?php
    if (isset($_REQUEST['inserted'])) {
        echo "<font color='green'>Data is inserted</font>";
    }

    ?>

    <?php

    if (isset($_REQUEST['delete_m_data'])) {
        if (isset($_REQUEST['check_data'])) {
            $c_data = $_REQUEST['check_data'];
            $all_marked = implode(",", $c_data);
            $multi_query = "DELETE FROM user_info WHERE id IN ($all_marked)";
            $multi_result = mysqli_query($connection, $multi_query);

            if ($multi_result) {

                header("location: index.php?multideleted");
            }
        }
    }

    if (isset($_REQUEST['multideleted'])) {
        echo "<font color='green'>Selected records deleted successfully</font>";
    }

    ?>

    <form action="" method="post">
        <br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Serial No.</th>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                    <th><input type="submit" class="btn btn-success" name="delete_m_data" value="Multiple_Delete"></th>
                </tr>
            </thead>

            <?php
            $serial_number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $profile_img = $row['profile_pic'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $serial_number++;
                ?>

                <tbody>
                    <tr>
                        <td><?php echo "$serial_number"; ?></td>
                        <td><?php echo "$id"; ?></td>
                        <td><img width="50px" src="../profile_pic/<?php echo $profile_img ?>"></td>
                        <td><?php echo "$username"; ?></td>
                        <td><?php echo "$email"; ?></td>
                        <td><?php echo "$password"; ?></td>
                        <td><a href="edit.php?edit_id=<?php echo $id; ?>">Edit</a> || <a
                                onclick="return confirm('Are you sure?')"
                                href="delete.php?id=<?php echo $id; ?>&profile_pic=<?php echo $profile_img; ?>"
                                class="btn btn-danger btn-sm">Delete</a></td>
                        <td>
                            <center><input type="checkbox" name="check_data[]" value="<?php echo "$id"; ?>"></center>
                        </td>

                    </tr>
                </tbody>

                <?php

            }
            ?>

        </table>
    </form>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>