$('#btn-logout').on('click', function () {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform logout action using AJAX
            $.ajax({
                url: 'logout.php',
                method: 'POST',
                success: function () {
                    // Redirect to the login page after logout
                    window.location.replace('login.php');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});