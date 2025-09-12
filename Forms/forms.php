<?php
// Include database connection and mail class
require_once 'Database.php';
require_once 'SendMail.php';

class forms
{
    // Handle user signup
    public function handleSignupForm($conf)
    {
        global $mysqli; // Use the DB connection

        $ObjSendMail = new SendMail(); // Instantiate mailer

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            // Sanitize inputs
            $username = htmlspecialchars($_POST['username']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST['password']);

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return '<div class="alert alert-danger mt-4" role="alert">Invalid email format. Please try again.</div>';
            }

            $verifyLink = "http://localhost/approve.php?email=" . urlencode($email);

            // Prepare email content
            $mailCnt = [
                'email_from' => 'eobosi14@gmail.com',
                'name_from' => 'Eliud',
                'email_to' => $email,
                'name_to' => $username,
                'subject' => 'Welcome to Our Website - Verify',
                'body' => "Hello, $username! <br>
                                 Thank you for signing up. <br>
                                 Please <a href='$verifyLink'>Click here</a> to verify your account.<br>
                                 Regards,<br>"
            ];

            // Hash password
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Check if user already exists
            $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->close();
                return '<div class="alert alert-danger mt-4">Email already registered.</div>';
            }
            $stmt->close();

            // Insert new user
            $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password_hash);

            if ($stmt->execute()) {
                $stmt->close();
                // Send verification email
                $result = $ObjSendMail->Send_Mail($conf, $mailCnt, false);
                return '<div class="alert alert-success mt-4">' . $result . '</div>';
            } else {
                $stmt->close();
                return '<div class="alert alert-danger mt-4">Registration failed. Please try again.</div>';
            }
        } else {
            ob_start();
            $this->signup();
            return ob_get_clean();
        }
    }

    // Handle user login
    public function handleLoginForm()
    {
        global $mysqli; // Use the DB connection

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            // Fetch user password from DB
            $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($hashed_password);

            if ($stmt->fetch()) {
                if (password_verify($password, $hashed_password)) {
                    $stmt->close();
                    return "<div class='alert alert-success mt-4'>Welcome back, $username!</div>";
                } else {
                    $stmt->close();
                    return "<div class='alert alert-danger mt-4'>Incorrect password.</div>";
                }
            } else {
                $stmt->close();
                return "<div class='alert alert-danger mt-4'>User not found.</div>";
            }
        } else {
            ob_start();
            $this->login();
            return ob_get_clean();
        }
    }

    // Signup form HTML
    public function signup()
    {
        ?>
        <form method="post" action="index.php?page=signup">
            <h2>Sign Up</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit" name="signup">Sign Up</button>
            <br><br>
            <a href="Login.php">Already have an account? Login</a>
        </form>
        <?php
    }

    // Login form HTML
    public function login()
    {
        ?>
        <form method="post" action="Login.php">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit" name="login">Login</button>
            <br><br>
            <a href="index.php?page=signup">Don't have an account? Sign up</a>
        </form>
        <?php
    }
}
