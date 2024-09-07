<?php
session_start();
if (isset($_SESSION['old_data'])) {
    $old_data = $_SESSION['old_data'];
} else {
    $old_data = [];
}

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
} else {
    $errors = [];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .contact-info {
            background-color: #1B3A61;
            color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .contact-info h4 {
            margin-bottom: 20px;
        }
        .contact-info .icon {
            margin-right: 10px;
        }
        .contact-info a {
            color: white;
            margin-right: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Send us a Message</h2>
    <form id="contactForm" action="/process/" method="POST">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input 
                            <?php 
                                if (count($old_data) > 0 && $old_data['name']) {
                            ?>
                                value="<?=$old_data['name']?>"
                            <?php 
                                } 
                            ?>
                            type="text" 
                            class="form-control" 
                            name="name" 
                            id="name" 
                            placeholder="Enter your name">
                            <small class="text-danger" id="nameError">
                                <?php
                                    if (count($errors) > 0 && isset($errors['name'])) {
                                ?>
                                <?=$errors['name']?>
                                <?php } ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input 
                            <?php 
                                if (count($old_data) > 0 && $old_data['email']) {
                            ?>
                                value="<?=$old_data['email']?>"
                            <?php 
                                } 
                            ?>
                            type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            <small class="text-danger" id="emailError">
                            <?php
                                if (count($errors) > 0 && isset($errors['email'])) {
                            ?>
                                <?=$errors['email']?>
                            <?php } ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input 
                            <?php 
                                if (count($old_data) > 0 && $old_data['phone']) {
                            ?>
                                value="<?=$old_data['phone']?>"
                            <?php 
                                } 
                            ?>
                            type="tel" 
                            class="form-control" 
                            name="phone" id="phone" 
                            placeholder="Enter your phone number">
                            <small class="text-danger" id="phoneError">
                            <?php
                                if (count($errors) > 0 && isset($errors['phone'])) {
                            ?>
                                <?=$errors['phone']?>
                            <?php } ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input 
                            <?php 
                                if (count($old_data) > 0 && $old_data['company']) {
                            ?>
                                value="<?=$old_data['company']?>"
                            <?php 
                                } 
                            ?>
                            type="text" 
                            class="form-control" 
                            name="company" 
                            id="company" 
                            placeholder="Enter your company name">
                            <small class="text-danger" id="companyError">
                            <?php
                                if (count($errors) > 0 && isset($errors['company'])) {
                            ?>
                                <?=$errors['company']?>
                            <?php } ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Enter your message">
                    
                    </textarea>
                    
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-6">
                <div class="contact-info">
                    <h4>Contact Information</h4>
                    <p><i class="fas fa-map-marker-alt icon"></i> 360 King Street<br>Feasterville Trevose, PA 19053</p>
                    <p><i class="fas fa-phone icon"></i> (800) 900-200-300</p>
                    <p><i class="fas fa-envelope icon"></i> info@example.com</p>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </form>
    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
            <div class="modal-header border-0">
                <h5 class="modal-title mx-auto" id="errorModalLabel">Face-plant!</h5>
            </div>
            <div class="modal-body">
                <p>Ooops, something went wrong.</p>
                <div class="display-4 text-danger"><i class="fas fa-times-circle"></i></div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Try again</button>
            </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap JS và dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#contactForm").submit(function(event) {
            event.preventDefault();

            // Clear previous error messages
            $(".text-danger").text("");

            // Validate inputs
            var isValid = true;

            var name = $("#name").val().trim();
            if (name === "") {
                $("#nameError").text("Please enter your name.");
                isValid = false;
            }

            var email = $("#email").val().trim();
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (email === "") {
                $("#emailError").text("Please enter your email address.");
                isValid = false;
            } else if (!emailPattern.test(email)) {
                $("#emailError").text("Please enter a valid email address.");
                isValid = false;
            }

            var phone = $("#phone").val().trim();
            var phonePattern = /^[0-9]{10,15}$/;
            if (phone === "") {
                $("#phoneError").text("Please enter your phone number.");
                isValid = false;
            } else if (!phonePattern.test(phone)) {
                $("#phoneError").text("Please enter a valid phone number.");
                isValid = false;
            }

            var company = $("#company").val().trim();
            if (company === "") {
                $("#companyError").text("Please enter your company name.");
                isValid = false;
            }

            var message = $("#message").val().trim();
            if (message === "") {
                $("#messageError").text("Please enter your message.");
                isValid = false;
            }

            // If the form is valid, submit it
            if (isValid) {
                this.submit();
            } else {
                $('#errorModal').modal('toggle');

            }
        });
    });
</script>

</body>
</html>
