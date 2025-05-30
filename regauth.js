    document.getElementById('registrationForm').addEventListener('submit', function (e) {
        e.preventDefault(); 

        // user input values from the form fields
        const nid = document.getElementById('nid').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (!nid || !email || !phone || !password || !confirmPassword) {
            alert('Please fill all fields.');
            return;
        }

        const nidRegex = /^\d{10}$/;
        if (!nidRegex.test(nid)) { 
            alert('Please enter a valid NID number');
            return;
        }

        const emailRegex = /^[a-zA-Z0-9]+@gmail\.com$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        const phoneRegex = /^(?:\+88|88)?01[3-9]\d{8}$/;
        if (!phoneRegex.test(phone)) {
            alert('Please enter a valid Bangladeshi phone number starting with 01 and containing 11 digits. You may optionally include "+88" or "88" as a prefix.');
            return;
        }

        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*,./;'])[a-zA-Z\d@#$%^&*,./;']{8,20}$/;
        if (!passwordRegex.test(password)) {
            alert('Password must contain at least one digit, one lowercase, one uppercase, one special character, and be 8-20 characters long.');
            return;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return;
        }

        // AJAX request to PHP backend
        let formData = new FormData(this);

        fetch('regInsert.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then( (data => {
            // Handle the response from the PHP script
            if (data.includes('This NID has already taken')) {
                alert('This NID has already taken!!');
                window.location.href = 'registration.php';
            } else {
                alert('Your account is successfully created'),
                window.location.href = 'login.php'
            }
        })).catch(error => console.error('Error:', error));
    });
