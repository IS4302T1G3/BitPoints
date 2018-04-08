<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<?php
if (!isset($retry) || $retry) {
    echo '
	
		<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
					<form action="?redirect=' . $_GET['redirect'] . '" method="post" class="form-horizontal">                                    
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="' . (isset($email) ? $email : '') . '" placeholder="Enter email">                                        
                        </div>
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                                    

                                
                        <div class="input-group">
                            <div class="checkbox">
								<label>
									<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
								</label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
								<button class="btn btm-success" type="submit" name="login" value="Login">Login</button>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Do not have an account?
										<a href=register.php>
											Sign Up Here
										</a>
                                    </div>
                                </div>
                            </div>    
						</div>
                    </form>     
                </div>                     
            </div>  
        </div>
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

        $sql_select_user = "SELECT email FROM users WHERE email='$email' AND password='$password'";

        // Check for sql error
        if ($result = $conn->query($sql_select_user)) {
            // Check if user is found
            if ($result->num_rows != 0) {
                $row = $result->fetch_assoc();

                // Login successful, initialize session information
                session_start();
                $_SESSION['email'] = $row['email'];

                $retry = false;
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