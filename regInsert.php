<?php
    $conn = new mysqli('localhost', 'root', '', 'bangladeshrailway');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $nid = $_POST['nid'];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];

    $insert_query ="INSERT INTO `users`(`nid`, `email`, `phone`, `password`) VALUES ('$nid','$email','$phone','$password')";
   

    $duplicate_nid = mysqli_query($conn,"SELECT * FROM `users` WHERE nid='$nid'");
    if(mysqli_num_rows($duplicate_nid)>0){
        echo "<script>alert('This NID has already taken!!')</script>";
        echo "<script>location.href='registration.php'</script>";
    }
    else{
        if(!mysqli_query($conn,$insert_query)){
            die("not inserted!!");
        }
        else{
            echo "<script>alert('Your account is successfully created!!')</script>";
            echo "<script>location.href='login.php'</script>";
        }  
    }