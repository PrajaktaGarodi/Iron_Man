$(document).ready(function () {
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting

        // Validation variables
        let isValid = true;
        const email = $('#email').val().trim();
        const password = $('#password').val().trim();

        // Email validation
        if (email === '' || !validateEmail(email)) {
            $('#emailError').removeClass('d-none');
            isValid = false;
        } else {
            $('#emailError').addClass('d-none');
        }

        // Password validation
        if (password === '' || password.length < 6) {
            $('#passwordError').removeClass('d-none');
            isValid = false;
        } else {
            $('#passwordError').addClass('d-none');
        }

        // If form is valid, proceed
        if (isValid) {
            alert('Login Successful');
        }
    });

    // Helper function for email validation
    function validateEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return emailPattern.test(email);
    }
});
