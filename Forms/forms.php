<?php
class forms
{
    public function signup()
    {
        ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            <br><br>
            <input type="submit" value="signup">
        </form>';
        <?php
    }
}