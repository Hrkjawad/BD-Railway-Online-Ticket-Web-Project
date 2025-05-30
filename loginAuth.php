<?php
if(isset($_POST['login'])){
    $conn = new mysqli('localhost', 'root', '', 'bangladeshrailway');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $nid = $_POST['nid'];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE nid='$nid' And Password='$password'");

    if(mysqli_num_rows($result)>0){
        session_start();
        echo "<script>alert('Login successful')</script>";
        $_SESSION['nid'] = $nid;
        echo "<script>location.href='search_ticket.php'</script>";
        
    }
    else{
        echo "<script>alert('Invalid NID or Password!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}

?>