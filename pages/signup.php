
<h1>Welcome to foot in door!<h1>
<h2>Eneter in information to create a new account<h2>

<form method="POST" action="../lib/auth/auth.php">
	Username:<input type="text" name="username" required></input><br>
	</br>
	Email:<input type="email" name="email" required></input><br>
	</br>
	Phone:<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" pattern="[0-9]{3}[0-9]{2}[0-9]{3}" required></input><br>
	</br>
	Password:<input type="Password" name="password" required></input><br>
	</br>
	<button type="submit" name="action" value="signup">Sign in</button>
</form>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
