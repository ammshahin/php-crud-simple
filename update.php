<?php
include_once("config.php");
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $salary = mysqli_real_escape_string($mysqli, $_POST['salary']);
    if (empty($name) || empty($address) || empty($salary)) {

        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }

        if (empty($salary)) {
            echo "<font color='red'>Salary field is empty.</font><br/>";
        }
    } else {
        $id = $_GET['id'];
        $result = mysqli_query($mysqli, "UPDATE employee SET name='$name',address='$address',salary=$salary WHERE id=$id");

        header("Location: index.php");
    }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Update Employee</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM employee WHERE id=$id");
    while ($res = mysqli_fetch_array($result)) {
        $name = $res['name'];
        $address = $res['address'];
        $salary = $res['salary'];
    }
    ?>





    <div class="container mt-5 shadow p-5 border">
        <form class="container mt-5" action="" method="post">

            <div class="form-group mb-2">
                <label class="form-label">Name:</label>
                <input placeholder="Employee name" name='name' value='<?php echo $name ?>' type="text" class="form-control" i> <br>

            </div>
            <div class="form-group mb-2">
                <label class="form-label">Address:</label>
                <input type="text" placeholder="Employee Address" name='address' value='<?php echo $address ?>' class="form-control" i><br>

            </div>
            <div class="form-group mb-2">
                <label class="form-label">Salary:</label>
                <input type="number" placeholder="salary" name='salary' value='<?php echo $salary ?>' class="form-control" i> <br>

            </div>
            <input type="submit" name='update' value="Update" class="btn bg-primary m-3 rounded text-white">
        </form>
    </div>
</body>

</html>