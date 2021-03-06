<?php
session_start();

$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['uname']) && isset($_POST['pass']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	// Connect to the DB
	require("connectDB.php");
	$db = get_db();
	$query = 'SELECT * FROM public.user WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
        $hashedPasswordFromDB = $row['password'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $admin = $row['admin'];
        $id = $row['id'];
		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
            $_SESSION['username'] = $username;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['admin'] = $admin;
            $_SESSION['id'] = $id;
			header("Location: appointment.php");
			die();
        }
        else if ($password == $row['password'])
        {
            $_SESSION['username'] = $username;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['admin'] = $admin;
            $_SESSION['id'] = $id;
            header("Location: appointment.php");
			die();
        }
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div>
        <h1>Please Login or Register an Account</h1>

        <form action="login.php" method="post">
            Username:
            <input type="text" id="uname" name="uname" placeholder="Username" autofocus required>
            <br>
            Password:
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <br>
            <br>
            <input type="submit" class="submit" value="Login">
        </form>
        <form action="register.php" method="post">
            <input type="submit" class="submit" value="Register">
        </form>
    </div>
</body>
</html>