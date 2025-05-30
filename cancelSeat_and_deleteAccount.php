<?php
$conn = new mysqli("localhost", "root", "", "bangladeshrailway");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $route = $_POST['route'];
    $date = $_POST['date'];
    $formatted_date = date('Y-m-d', strtotime($date));
    $seat_type = $_POST['seat_type'];
    $seat_numbers = $_POST['seat'];
    $action = $_POST['action'];

    // Split for together delete seats all
    $seat_numbers_array = explode(', ', $seat_numbers);
    $seat_numbers_list = implode("', '", $seat_numbers_array);

    //"Cancel" button
    if ($action === 'cancel') {
        $sqlUpdate = "UPDATE tickets 
                      SET is_available = 1, booked_by = NULL, nid = NULL 
                      WHERE seat_number IN ('$seat_numbers_list') 
                        AND route = '$route' 
                        AND date = '$formatted_date' 
                        AND seat_type = '$seat_type'";

        if (mysqli_query($conn, $sqlUpdate)) {
            echo "<script>alert('Seats cancelled successfully')</script>";
            echo "<script>location.href='my_tickets.php'</script>";
        } else {
            echo "<script>alert('Failed to cancel seats')</script>";
        }
    }

    //"Delete Account" button
    if ($action === 'delete') {

        $sqlUpdateSeats = "UPDATE tickets 
                           SET is_available = 1, booked_by = NULL, nid = NULL 
                           WHERE seat_number IN ('$seat_numbers_list') 
                             AND route = '$route' 
                             AND date = '$formatted_date' 
                             AND seat_type = '$seat_type'";

        $seatsCancelled = mysqli_query($conn, $sqlUpdateSeats);


        session_start();
        $nid = $_SESSION['nid'];

        $sqlDeleteUser = "DELETE FROM `users` WHERE nid = $nid";

        if ($seatsCancelled && mysqli_query($conn, $sqlDeleteUser)) {
            session_unset();
            session_destroy();
            echo "<script>alert('Your account and tickets have been successfully deleted')</script>";
            echo "<script>location.href='search_ticket.php'</script>";
        } else {
            echo "<script>alert('Failed to delete your account or cancel tickets')</script>";
        }
    }
}

$conn->close();
?>