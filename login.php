<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Bangladesh Railway</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="auth_style.css" />
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
    <!-- Main container for the login page -->
    <div class="container mt-5">
      <div class="row d-flex align-items-center p-4">
        <!-- Left column: Form section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div style="width: 90%; max-width: 400px">
            <h2 class="text-center mb-4">Login</h2>
            <form action="loginAuth.php" method="post" id="loginForm">
              <!-- NID input field -->
              <div class="mb-3">
                <label for="nid" class="form-label">NID</label>
                <input
                  type="number"
                  class="form-control"
                  id="nid"
                  placeholder="Type your 10 digit NID number"
                  name="nid"
                  required
                />
              </div>
              <!-- Password input field -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  placeholder="Type your password"
                  name="password"
                  required
                />
              </div>
              <br />
              <!-- Login button -->
              <button type="submit" class="btn w-100" name="login">Login</button>
            </form>
          </div>
        </div>

        <!-- Right column: Image form -->

        <div
          class="col-md-6 d-flex flex-column justify-content-center align-items-center"
        >
          <img
            class="img-fluid"
            src="img/slider-image-2.png"
            alt="image"
            style="object-fit: cover"
          />
          <br />
          <div class="text-center">
            <a href="registration.php"> CREATE AN ACCOUNT</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- <script src="auth.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
