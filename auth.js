// document.getElementById("loginForm").addEventListener("submit", function (e) {
//   e.preventDefault(); // Prevent the default form submission behavior

//   // Retrieve user input values from the form fields
//   const nid = document.getElementById("nid").value;
//   const password = document.getElementById("password").value;

//   if (!nid || !password) {
//     alert("Please fill all fields.");
//     return;
//   }

//   const nidRegex = /^\d{10}$/;
//   if (!nidRegex.test(nid)) {
//     alert("Please enter a valid NID number");
//     return;
//   }

//   // AJAX request to PHP backend
//   let formData = new FormData(this);

//   fetch("loginAuth.php", {
//     method: "POST",
//     body: formData,
//   })
//     .then((response) => response.text())
//     .then((data) => {
//       if (data.includes("Login successful")) {
//         alert("Login successful");
//         window.location.href = "search_ticket.php";
//       } else if (data.includes("Invalid NID or Password")) {
//         alert("Invalid NID or Password!!");
//         window.location.href = "login.php";
//       } else {
//         alert("Login failed!");
//       }
//     })
//     .catch((error) => console.error("Error:", error));
// });
