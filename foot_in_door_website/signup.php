<?php
require_once('../theme/header.php');
?>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
<<<<<<< HEAD
                  <h2>Enter in information to create a new account</h2>
=======
                  <h1>Welcome to foot in door!<h1>
                  <h2>Eneter in information to create a new account<h2>
>>>>>>> 098617f4b1ba0ccc21aac443569c025b93e5d4a9

                  <form method="POST" action="../lib/auth/auth.php">
                    Username:<input type="text" name="username" required></input><br>
                    </br>
                    Email:<input type="email" name="email" required></input><br>
                    </br>
                    Phone:<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" pattern="[0-9]{3}[0-9]{2}[0-9]{3}" required></input><br>
                    </br>
                    Password:<input type="Password" name="password" required></input><br>
                    </br>
<<<<<<< HEAD
                    <button type="submit" name="action" value="signup">Sign Up</button>
                  </form>
                  <a href="index.php">Go back to home page</a><br />
				  <a href="login.php">Sign In</a>
                </div>
            </div>
        </header>
<?php
require_once('../theme/footer.php');
?>


=======
                    <button type="submit" name="action" value="signup">Sign in</button>
                  </form>
                  <a href="index.php">Go back to home page</a>
                </div>
            </div>
        </header>
        <?php
		require_once('../theme/footer.php');
		?>
	</body>
</html>
<a href="login.php">Log In</a>
>>>>>>> 098617f4b1ba0ccc21aac443569c025b93e5d4a9
