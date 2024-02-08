<?php
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

    <title>employees view</title>
  </head>
  <body>
  <div class="container mt-5" >

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee view datails
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
                                <form action="code.php" method="POST">
                                   

                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <p class="form-control">
                                        <?=$employees['name'];?>

                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee email</label>
                                        <p class="form-control">
                                        <?=$employees['email'];?>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee salary</label>
                                        <p class="form-control">
                                        <?=$employees['salary'];?>
                                    </div>
                                   

                                </form>
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