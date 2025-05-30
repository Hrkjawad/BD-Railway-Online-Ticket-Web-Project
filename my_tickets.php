<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Tickets - Bangladesh Railway</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="my_tickets.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <img class="img-fluid logo" src="img/logo.png" alt="Bangladesh Railway Logo" />
        <header class="site-title"><h1>Bangladesh Railway</h1></header>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <?php
          session_start();
          $nid = isset($_SESSION['nid']) ? $_SESSION['nid'] : null;
          ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="search_ticket.php">Search Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="privacy_policy.php">Privacy Policy</a>
            </li>
            <?php if (isset($_SESSION['nid']) && !empty($_SESSION['nid'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="my_tickets.php">My Tickets</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? 'logout.php' : 'login.php'; ?>">
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

    <!-- Main container -->
    <div class="container mt-5">
      <div class="row d-flex align-items-center p-4">
        <!-- Left Column: Scrollable Ticket List -->
        <div class="col-md-6 ticket-list">
          <?php
          $conn = new mysqli("localhost", "root", "", "bangladeshrailway");

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          if ($nid) {
              $sql = mysqli_query($conn,"SELECT 
              date, 
              route, 
              seat_type, 
              TRIM(GROUP_CONCAT(DISTINCT seat_number ORDER BY seat_number SEPARATOR ', ')) AS seat_numbers, 
              TRIM(GROUP_CONCAT(DISTINCT booked_by ORDER BY booked_by SEPARATOR ', ')) AS booked_by_list 
              FROM tickets 
              WHERE nid = $nid 
              GROUP BY date, route, seat_type");

            if (mysqli_num_rows($sql)> 0) {
              // Fetch ticket data
              while ($row = $sql->fetch_assoc()) {
                $date = $row['date'];
                $route = $row['route'];
                $seat_type = $row['seat_type'];
                $seat_numbers = $row['seat_numbers'];
                $booked_by_list = $row['booked_by_list'];
          ?>
          <div class="ticket">
            <div class="location1"><?php echo htmlspecialchars($route); ?></div>  
            <img class="img-fluid barlogo" src="img/bar-logo.png" />
            <div class="train-name">Kalni Express - 6:45h</div><br>
            <div class="time1">Departure&ensp;: <span class="time11"><?php echo htmlspecialchars($date); ?>, 6:15am</span></div>
            <div class="time2">Arrival&ensp;&ensp;&ensp;&ensp;: <span class="time22"><?php echo htmlspecialchars($date); ?>, 1:00am</span></div>
            <p class="details1">Seat Type &ensp;: &ensp;<span class="details11" ><?php echo htmlspecialchars($seat_type); ?></span></p>
            <table class="details-table" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Seats</th>
                    <td style="padding: 8px; border: 1px solid #ddd;">
                        <?php echo htmlspecialchars($seat_numbers); ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Passenger</th>
                    <td style="padding: 8px; border: 1px solid #ddd;">
                        <?php echo htmlspecialchars($booked_by_list); ?>
                    </td>
                </tr>
            </table>
            <form action="cancelSeat_and_deleteAccount.php" method="POST">
                <input type="hidden" name="seat" value="<?php echo htmlspecialchars($row['seat_numbers']); ?>" />
                <input type="hidden" name="route" value="<?php echo htmlspecialchars($route); ?>" />
                <input type="hidden" name="date" value="<?php echo htmlspecialchars($date); ?>" />
                <input type="hidden" name="seat_type" value="<?php echo htmlspecialchars($seat_type); ?>" />
                <div class="text-center">
                  <button type="submit" name="action" value="cancel" class="Cancle">Cancel</button>
                </div>
            </form>
          </div>
          <?php
              }
            } else {
              echo '<h2 class="text-center mb-4">No Journey Yet</h2>';
            }
            $sql->close();
          } else {
            echo '<h2 class="text-center mb-4">No Journey Yet</h2>';
          }
          $conn->close();
          ?>
        </div>

        <!-- Right Column: Fixed Image -->
        <div class="col-md-6 img-container">
          <img
            class="img-fluid"
            src="img/image-1.png"
            alt="image"
            style="object-fit: cover"
          />
          <br />
          <div class="text-center">
            <p>Happy Train Journey</p>
          </div>
          <br>
          <div class="text-center">
          <?php if (isset($_SESSION['nid']) && !empty($_SESSION['nid'])): ?>
          <button type="submit" name="action" value="delete" class="deleteAccount">Delete Account</button>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
