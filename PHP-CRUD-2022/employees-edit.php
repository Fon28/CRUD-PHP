<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>employees edit</title>
  </head>
  <body>
  <div class="container mt-5" >

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Edit
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                      <?php
                      if(isset($_GET['id']))
                     {
                        $employees_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM employees WHERE id='$employees_id' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                          {
                            $employees = mysqli_fetch_array($query_run);
                             ?>
                               
                                    <input type="hidden" name="employees_id" value="<?= $employees_id?>">

                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="name" value="<?=$employees['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee email</label>
                                        <input type="text" name="email" value="<?=$employees['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee salary</label>
                                        <input type="text" name="salary" value="<?=$employees['salary'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_employees" class="btn btn-primary">update</button>
                                    </div>


                            <?php
                            
                        }
                        else{
                            echo "<h4> no ssuch id found </h4>";
                        }
                    }
                    ?>

                    
                </div>
            </div>
        </div>
    </div>
   </div>

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>