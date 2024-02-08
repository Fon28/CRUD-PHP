<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $employees_id = mysqli_real_escape_string($con, $_POST['delete_employee']);
     
    $query = "DELETE FROM employees WHERE id='$employees_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "employee deleted successfully";
        header("Location: employees.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "employee not deleted";
        header("Location: employees.php");
        exit(0);
    }

}  

if (isset($_POST['update_employees'])) {
    
    $employees_id = mysqli_real_escape_string($con, $_POST['employees_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $query = "UPDATE employees SET name='$name', email='$email', salary='$salary' WHERE id='$employees_id' "; 
    $query_run = mysqli_query($con, $query);

    if ($query_run){
        $_SESSION['message'] = "employee updated successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "employee not updated";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['save_employee']))
 {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $query = "INSERT INTO employees (name,email,salary) VALUE 
       ('$name','$email','$salary')";

     $query_run = mysqli_query($con,$query);
     if($query_run) {
        $_SESSION['message'] = "employee created successfully";
        header("Location: employees.php");
        exit(0);
     }
     else {
        $_SESSION['message'] = "employee not created";
        header("Location: employees.php");
        exit(0);
     }
}





?>