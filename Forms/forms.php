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
            <?php $this->submit_button('signup', 'signup'); ?>
            <a href="signin.php">Already have an account?Login</a>

        </form>';
        <?php
    }

    private function submit_button($value, $name)
    {
        ?>
        <button type="submit" name="<?php echo $name; ?>" value="<?php echo $value; ?>"><?php echo $value; ?></button>
        <?php
    }
    public function login()
    {
        ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            <br><br>
            <?php $this->submit_button('Login', 'login'); ?>
            <input type="submit" value="login"><a href="./">Don't have an account?Sign up</a>
        </form>';
        <?php

    }
}