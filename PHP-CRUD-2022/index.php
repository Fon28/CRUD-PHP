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

    <title>Hello, world!</title>
  </head>
  <body>
  
           <div class="container mt-4">

               <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="employees.php" class="btn btn-primary fload-end">Add employee</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                   <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>employee name</th>
                                        <th>email</th>
                                        <th>salary</th>
                                        <th>Action</th>
                                    </tr>
                                   </thead>
                                   <tbody>
                                   <?php
                                      $query = "SELECT * FROM employees";
                                      $query_run = mysqli_query($con, $query);

                                      if(mysqli_num_rows($query_run) > 0)
                                      {
                                           foreach($query_run as $employees)
                                           {
                                           
                                        ?>
                                        <tr>
                                       <td><?= $employees['id']; ?></td>
                                       <td><?= $employees['name']; ?></td>
                                       <td><?= $employees['email']; ?></td>
                                       <td><?= $employees['salary']; ?></td>

                                       <td>
                                       <a href="employees-view.php?id=<?= $employees['id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="employees-edit.php?id=<?= $employees['id']; ?> " class="btn btn-success btn-sm">Edit</a>
                                  
                                         <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_employee" value="<?=$employees['id'];?>" class="btn btn-danger btn-sm">delete</button>
                                         </form>
                                       </td>
                                    </tr>
                                     <?php

                                           }
                                             
                                      }
                                      else{
                                        echo "<h5>no record found </h5>";
                                      }
                                    ?>
                                    
                                   </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
           </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>