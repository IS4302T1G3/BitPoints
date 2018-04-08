<?php
if (!isset($retry) || $retry) {
    echo '
        <fieldset>
		<div class="container">
            <div class="row">
            <div class="col-lg-12 text-center">
			<br>
			<h2 class="section-heading text-uppercase">Login</h2>
            <form action="?redirect=' . $_GET['redirect'] . '" method="post">
                <table align="center">
                    <tr>
					<br>
                        <td>Email:</td>
                        <td><input class="form-control" type="text" name="email" value="' . (isset($email) ? $email : '') . '"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input class="form-control" type="password" name="password"></td>
                    </tr>
                    <tr>
					<td colspan=2 align="right"><br> <button class="btn btn-primary btn-xl text-uppercase" type="submit" name="login" value="Login">Login</button></td>
                    </tr>
					<tr>
					<td colspan=2 align="center"><br><a href=register.php>Have not registered?</a> </td>
                    </tr>
                </table>
            </form>
			</div>
			</div>
			</div>
        </fieldset>
    ';
}

?>
<?php
require 'connect.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $error_message = "";

    if (empty($password)) {
        $error_message .= "Please enter your password.<br>";
    }

    if (empty($error_message)) {
        // Calculate password_hash (SHA256 to the original password)
        //$password_hash = hash('sha256', $password);

        $sql_select_user = "SELECT * FROM login WHERE email='$email' AND password='$password'";

        // Check for sql error
        if ($result = $conn->query($sql_select_user)) {
            // Check if user is found
            if ($result->num_rows != 0) {
                $row = $result->fetch_assoc();

                // Login successful, initialize session information
                session_start();
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $retry = false;
				header("Location:./main.php");
            } else {
                echo "Invalid email and password combination.";
                $retry = true;
            }

            $result->free();
        } else {
            echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
            $retry = true;
        }
    } else {
        echo $error_message;
        $retry = true;
    }
}


?>