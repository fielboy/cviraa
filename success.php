<?php
session_start();
?>

<script>
    // Function to show success message using Toastr
    function showSuccessMessage(message) {
        toastr.success(message);
    }

    // Check if there is a success message from PHP
    <?php if (isset($_SESSION['success'])): ?>
        showSuccessMessage("<?php echo $_SESSION['success']; ?>");
        <?php unset($_SESSION['success']); ?> // Clear the session variable after showing the alert
    <?php endif; ?>
</script>
