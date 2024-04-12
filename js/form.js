function validateForm() {
    var studentID = document.getElementById('studentID').value;
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var age = document.getElementById('age').value;
    var sport = document.getElementById('sport').value;
    var gender = document.getElementById('gender').value;
    var role = document.getElementById('role').value;
    var picture = document.getElementById('image').value;

    if (studentID.trim() === '' || firstName.trim() === '' || lastName.trim() === '' || age.trim() === '' || sport.trim() === '' || gender.trim() === '' || role.trim() === '') {
        // Display SweetAlert for filling out all fields
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill out all fields.'
        });
        return false;
    }

    if (picture.trim() === '') {
        // Display SweetAlert for uploading a picture
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please upload a picture.'
        });
        return false;
    }

    // If everything is filled out, continue with form submission
    return true;
}


$(document).ready(function () {
    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');
    });

    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('.sidebar, .open-btn').length) {
            $('.sidebar').removeClass('active');
        }
    });
});