<?php 
$connect = mysqli_connect("localhost","root","","facemask");


function redirect($page="index.php"){
    echo "<script>window.open('$page','_self')</script>";
}
function alert($msg){
    echo "<script>alert('$msg')</script>";
}

session_start();


// login & register work

if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $password = sha1($_POST['password']);

    $cnf_password = sha1($_POST['cnf_password']);

    if($password != $cnf_password){
        alert("reentered password not matched");
    }
    else{
        $query = mysqli_query($connect,"insert into accounts (fname, lname, gender, dob, contact, password,email) value ('$fname','$lname','$gender','$dob','$contact','$password','$email')");

        if($query){
            $_SESSION['user'] = $email;
            redirect("../index.php");
        }
        else{
            alert("fail to create an account please try again");
            redirect("login.php");
        }
    }
}

// login work

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($connect, "select * from accounts where (email='$email' OR contact='$email') AND  password='$password'");

    $count = mysqli_num_rows($query);
    if($count > 0){
        $_SESSION['user'] = $email;
        redirect("../index.php");
    }
    else{
        alert("email or password may invalid try again");
    }

}
?>