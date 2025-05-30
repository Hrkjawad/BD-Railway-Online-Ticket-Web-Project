<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Bangladesh Railway</title>
    <link rel="stylesheet" href="search_ticket.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
    <main class="main-content container-fluid justify-content-center ">
      <form action="buy_ticket.php" method="POST">
          <div class="form-group from-bar">
            <label for="from-station">From</label>
            <select class="form-select" name="from_station" required>
              <option value="" disabled selected>Select a station</option>
              <option>Sylhet</option>
              <option>Dhaka</option>
            </select>
          </div>
          <img class="bar-logo" src="img/bar-logo.png" alt="Search Bar Logo" />
          <div class="form-group to-bar">
            <label for="to-station">To</label>
            <select class="form-select" name="to_station" required>
              <option value="" disabled selected>Select a station</option>
              <option>Dhaka</option>
              <option>Sylhet</option>
            </select>
          </div>
          <div class="form-group sit-bar">
            <label for="sit-type">Sit Type</label>
            <select class="form-select" name="seat_type" required>
              <option value="" disabled selected>Select a Seat Class</option>
              <option>Sovon</option>
              <option>Snigdha</option>
              <option>FirstClass</option>
            </select>
          </div>
          <div class="form-group date-bar">
            <label for="travel-date">Date</label><br />
            <input  class="form-control"  type="date" id="travel-date" name="travel_date" required />
          </div>
          <br />
          <button type="submit" class="search-button">Search</button>
        </form>
    </main>

    <!-- Carousel -->
    <div class="container-fluid d-flex justify-content-center">
      <div
        id="carouselExample"
        class="carousel slide"
        data-bs-ride="carousel"
        style="width: 50%; margin-top: 10px">
      
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="img/slider-image-1.png"
              class="d-block w-100"
              alt="image 1"
              height="300px"
            />
          </div>
          <div class="carousel-item active">
            <img
              src="img/slider-image-2.png"
              class="d-block w-100"
              alt="image 2"
              height="300px"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/slider-image-3.png"
              class="d-block w-100"
              alt="image 3"
              height="300px"
            />
          </div>
          <div class="carousel-item">
            <img
              src="img/slider-image-4.png"
              class="d-block w-100"
              alt="image 4"
              height="300px"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </body>
  <script>
  // Get today's date
const today = new Date();
const futureDate = new Date();
futureDate.setDate(today.getDate() + 9);

const formattedToday = today.toISOString().split('T')[0];
const formattedFutureDate = futureDate.toISOString().split('T')[0];

document.getElementById('travel-date').setAttribute('min', formattedToday);
document.getElementById('travel-date').setAttribute('max', formattedFutureDate);

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
