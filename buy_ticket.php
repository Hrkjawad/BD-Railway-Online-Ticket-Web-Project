<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy Tickets - Bangladesh Railway</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="buy_ticket.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <img class="logo" src="img/logo.png" alt="Bangladesh Railway Logo" />
        <header class="site-title"><h1>Bangladesh Railway</h1></header>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <?php
          session_start();
          $nid = isset($_SESSION['nid']) ? $_SESSION['nid'] : null;
          ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="search_ticket.php">Buy Tickets</a></li>
            <li class="nav-item"><a class="nav-link" href="privacy_policy.php">Privacy Policy</a></li>
            <?php if (isset($_SESSION['nid']) && !empty($_SESSION['nid'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="my_tickets.php">My Tickets</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a
                class="nav-link"
                href="<?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? 'logout.php' : 'login.php'; ?>"
              >
                <?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? "NID: $nid | Logout" : 'Login'; ?>
              </a>
            </li>
          </ul>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="container mt-5">
      <div class=" d-flex align-items-center p-4">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'bangladeshrailway');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $from = $_POST['from_station'] ?? $_GET['from'];
        $to = $_POST['to_station'] ?? $_GET['to'];
        $travel_date = $_POST['travel_date'] ?? $_GET['date'];
        $formatted_date = date("Y-m-d", strtotime($travel_date));
        $seat_type = $_POST['seat_type'] ?? $_GET['sit_type'];
        $nid = $_SESSION['nid'] ?? null;

        $sql = "SELECT id, seat_number, is_available 
                FROM tickets 
                WHERE route = '$from to $to' 
                  AND date = '$formatted_date' 
                  AND seat_type = '$seat_type'";
        $result = $conn->query($sql);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        // Store seat availability in an array
        $seats = [];
        while ($row = $result->fetch_assoc()) {
            $seats[$row['seat_number']] = $row['is_available'];
        }

        //submission for booking seats
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedSeats'], $_POST['passengerNames'])) {
            $selectedSeats = json_decode($_POST['selectedSeats'], true);
            $names = $_POST['passengerNames'];
        
            foreach ($selectedSeats as $seat) {
                $sqlUpdate = "UPDATE tickets 
                              SET is_available = 0, booked_by = '$names', nid = '$nid' 
                              WHERE seat_number = '$seat' 
                                AND route = '$from to $to' 
                                AND date = '$formatted_date' 
                                AND seat_type = '$seat_type'";
                if (!$conn->query($sqlUpdate)) {
                    die("Failed to update seat: " . $conn->error);
                }
            }
            echo '<script>alert("Seats booked successfully!"); window.location.href="my_tickets.php";</script>';
            exit();
        }

        $conn->close();
        ?>
      <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div class="ticket" style="width: 90%; max-width: 400px">
            <img class="barlogo" src="img/bar-logo.png" />
            <div class="location1"><?php echo htmlspecialchars($from); ?></div>
            <div class="location2"><?php echo htmlspecialchars($to); ?></div>
            <p class="arrow">&#8594;</p>
            <div class="train-name">Kalni Express</div>
            <div class="time1"><?php echo htmlspecialchars($formatted_date); ?>, 6:15am</div>
            <div class="time2"><?php echo htmlspecialchars($formatted_date); ?>, 1:00pm</div>
            <div class="duration">6:45h</div>
            <div class="card">
              <div class="card-title">SNIGDHA</div>
              <div class="card-price">AC</div>
              <div class="card-number">৳720</div>
            </div>
            <div class="card2">
              <div class="card-title2">FIRST CLASS</div>
              <div class="card-price2">NON AC</div>
              <div class="card-number2">৳575</div>
            </div>
            <div class="card3">
              <div class="card-title3">SOVON CHAIR</div>
              <div class="card-price3">NON AC</div>
              <div class="card-number3">৳375</div>
            </div>
          </div>
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
          <h2 class="text-center mb-4"><?php echo htmlspecialchars($seat_type); ?></h2>
          <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center train-compartment">
            <?php
            $layout = [
              ['KA1', 'KA2', '', 'KA3', 'KA4'],
              ['KA5', 'KA6', '', 'KA7', 'KA8'],
              ['KA9', 'KA10', '', 'KA11', 'KA12'],
              ['KA13', 'KA14', '', 'KA15', 'KA16'],
              ['KA17', 'KA18', '', 'KA19', 'KA20'],
              ['KA21', 'KA22', '', 'KA23', 'KA24'],
              ['KA25', 'KA26', '', 'KA27', 'KA28'],
              ['KA29', 'KA30', '', 'KA31', 'KA32'],
            ];

            foreach ($layout as $row) {
              echo '<div class="row">';
              foreach ($row as $seat) {
                if ($seat === '') {
                  echo '<div class="aisle"></div>';
                } else {
                  $is_available = isset($seats[$seat]) && $seats[$seat];
                  $seat_class = $is_available ? 'seat available' : 'seat unavailable';
                  echo '<div class="' . $seat_class . '" data-seat="' . $seat . '">' . $seat . '</div>';
                }
              }
              echo '</div>';
            }
            ?>
          </div>
          <br />
          <p class="total">Total: ৳0</p>
          <button class="buyButton" id="proceedButton">Proceed</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter Passenger Names</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
    <form id="nameForm" method="POST">
        <div class="mb-3">
            <label for="passengerNames" class="form-label">Passenger Names</label>
            <textarea id="passengerNames" name="passengerNames" class="form-control" rows="4" placeholder="Enter names separated by commas"></textarea>
        </div>
        <!-- Include selected seats, from, to, date, and seat type in hidden inputs -->
        <input type="hidden" id="selectedSeats" name="selectedSeats" />
        <input type="hidden" name="from_station" value="<?php echo htmlspecialchars($from); ?>" />
        <input type="hidden" name="to_station" value="<?php echo htmlspecialchars($to); ?>" />
        <input type="hidden" name="travel_date" value="<?php echo htmlspecialchars($formatted_date); ?>" />
        <input type="hidden" name="seat_type" value="<?php echo htmlspecialchars($seat_type); ?>" />
        <button type="submit" id="confirmButton" class="btn btn-primary">Confirm</button>
    </form>
</div>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       let selectedSeats = [];
    const seatType = "<?php echo $seat_type; ?>";
    const priceMap = {
        "Sovon": 375,
        "FirstClass": 575,
        "Snigdha": 720
    };

    // Handle seat selection
    document.querySelectorAll(".seat.available").forEach((seat) => {
        seat.addEventListener("click", () => {
            if (seat.classList.contains("selected")) {
                // Unselect seat
                seat.classList.remove("selected");
                seat.style.backgroundColor = "white";
                selectedSeats = selectedSeats.filter((s) => s !== seat.dataset.seat);
            } else {
                // Select seat
                seat.classList.add("selected");
                seat.style.backgroundColor = "green";
                selectedSeats.push(seat.dataset.seat);
            }

            // Update total price
            if (seatType === "Snigdha") {
                const totalPrice = selectedSeats.length * (priceMap[seatType] || 0);
                document.querySelector(".total").textContent = `Total: ৳${totalPrice}`;
            }
            if (seatType === "Sovon") {
                const totalPrice = selectedSeats.length * (priceMap[seatType] || 0);
                document.querySelector(".total").textContent = `Total: ৳${totalPrice}`;
            }
            if (seatType === "FirstClass") {
                const totalPrice = selectedSeats.length * (priceMap[seatType] || 0);
                document.querySelector(".total").textContent = `Total: ৳${totalPrice}`;
            }
        });
    });

    // Show modal or popup
    document.getElementById("proceedButton").addEventListener("click", () => {
        const isLoggedIn = <?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? "true" : "false"; ?>;
        if (!isLoggedIn) {
            alert("Please log in to proceed!");
            return;
        }

        // Pass selected seats to the form
        document.getElementById("selectedSeats").value = JSON.stringify(selectedSeats);

        // Show modal
        const nameModal = new bootstrap.Modal(document.getElementById("nameModal"));
        nameModal.show();
    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
