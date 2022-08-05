<?php
    session_start();
    include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto bg-white border p-5">
                <h1 class="text-center fw-bold text-dark mb-3">Welcome <?php echo $_SESSION['username']; ?></h1>
                <h2 class="text-center fw-bold text-dark mb-3">Email Sender</h2>
		        <form action="send.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="sender_name" class="form-label">Sender Name</label>
                            <input type="text" class="form-control" id="sender_name" name="sender_name" value="<?php echo $_SESSION['username']; ?>" placeholder="John Doe" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sender" class="form-label">Sender Email</label>
                            <input type="email" class="form-control" id="sender" name="sender" placeholder="name@example.com" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sender_password" class="form-label">Sender Password</label>
                            <input type="password" class="form-control" id="sender_password" name="sender_password" placeholder="Enter your email password" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="How are you?" required>
                        </div>
                        <div class="col-6">
                            <label for="attachments" class="form-label">Attachments (Multiple)</label>
                            <input type="file" class="form-control" multiple id="attachments" name="attachments[]" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="recipient" class="form-label">Recipient Emails</label>
                        <input type="file" class="form-control" multiple id="recipient" name="recipient[]">

                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" name="body" placeholder="Hi, How are you?" rows="5" required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary me-2" name="send" type="submit">Send Email</button>
                        <button class="btn btn-danger" type="reset">Reset Form</button>
                        <input type="button" onclick="location.href='user_login.php'" value="Log-out" style="position:relative; left:62%">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>