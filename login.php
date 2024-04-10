<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Paficico|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira|Protest+Revolution" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-container form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'xulilogin.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'admin_page.php'; // redirect to admin page on success
                        } else {
                            $('.error-msg').html(response); // display error message
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="login-container">
        <div class="form-container">
            <form>
                <h3>Login</h3>

                <input type="text" name="username" required placeholder="enter your email">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="submit" value="login now" class="form-btn">
                <span class="error-msg"></span>
            </form>
        </div>
    </div>
</body>

</html>