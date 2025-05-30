<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration - Bangladesh Railway</title>
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
    <div class="container mt-5">
      <div class="row d-flex align-items-center">
        <!-- Left column: Form section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div style="width: 90%; max-width: 400px">
            <br />
            <h4 class="text-center mb-4">Create an Account</h4>
            <form id="registrationForm" method="post">
              <div class="mb-1">
                <label for="nid" class="form-label">NID</label>
                <input
                  placeholder="Type your 10 digit NID number"
                  type="text"
                  class="form-control"
                  id="nid"
                  name="nid"
                  required
                />
              </div>
              <div class="mb-1">
                <label for="email" class="form-label">Email</label>
                <input
                  placeholder="Type your valid email"
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  required
                />
              </div>
              <div class="mb-1">
                <label for="phone" class="form-label">Phone</label>
                <input
                  placeholder="Type your phone number"
                  type="tel"
                  class="form-control"
                  id="phone"
                  name="phone"
                  required
                />
              </div>
              <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input
                  placeholder="8 length - 1 digit, lower-uppercase, special character"
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <div class="mb-1">
                <label for="confirmPassword" class="form-label"
                  >Confirm Password</label
                >
                <input
                  placeholder="Repeat your password"
                  type="password"
                  class="form-control"
                  id="confirmPassword"
                  name="c_password"
                  required
                />
              </div>
              <br />
              <button type="submit" class="btn btn-primary w-100">
                Register
              </button>
            </form>
          </div>
        </div>

        <!-- Right column: Image section -->
        <div
          class="col-md-6 d-flex flex-column justify-content-center align-items-center"
        >
          <img
            class="img-fluid"
            src="img/slider-image-3.png"
            alt="image"
            style="object-fit: cover"
          />
          <div class="text-center mt-3">
            Already have an Account? <a href="login.php">Login</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="regauth.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
