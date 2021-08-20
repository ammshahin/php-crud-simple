<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <script src="https://kit.fontawesome.com/094e0f6ba0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- PHP Backend Code  -->
    <?php
    include_once("config.php");
    $name = '';
    $address =  '';
    $salary = '';


    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];


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
            $result = mysqli_query($mysqli, "INSERT INTO employee(name,address,salary) VALUES('$name','$address',$salary)");
        }
    }
    ?>

</head>

<body>

    <!-- Read Query MySql  -->
    <?php
    include_once("config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM employee");
    ?>


    <section style="height:100%">
        <main class="p-5 container border border-lg shadow my-5">
            <div class=" border-1 my-5">
                <div class="d-flex justify-content-between">
                    <div class="border-0 ">
                        <h3>Employees Details</h3>
                    </div>
                    <div class=" border-0 ">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <span><i class="fas fa-plus"></i>
                            </span> Add new Employee
                        </button>
                    </div>
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="container">
                                        <form action="index.php" method="post">

                                            <div class="form-group mb-2">
                                                <label for="exampleInputEmail1">Name:</label>
                                                <input type="text" placeholder="Employee name" name='name'> <br>

                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleInputPassword1">Address:</label>
                                                <input type="text" placeholder="Employee Address" name='address'><br>

                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleInputPassword1">Salary:</label>
                                                <input type="number" placeholder="salary" name='salary'> <br>

                                            </div>
                                            <input type="submit" name='add' value="Add" class="btn bg-primary m-3 rounded text-white">
                                        </form>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <table class=" table table-striped">

                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>Address</th>
                    <th>salary</th>
                    <th>action</th>
                </tr>

                <?php
                while ($res = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td> <?php echo $res['id'] ?></td>
                        <td><?php echo $res['name'] ?></td>
                        <td><?php echo $res['address'] ?></td>
                        <td><?php echo $res['salary'] ?></td>
                        <td>
                            <div class="icon d-flex">
                                <a href="#"><i class="fas fa-eye"></i></a>
                                <a href="update.php?id=<?php echo $res['id'] ?>" class="mx-4"><i class="fas fa-pen"></i></a>
                                <a href="delete.php?id=<?php echo $res['id'] ?>"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>



            </table>
        </main>


    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>