<?php
class layout
{
    public function header()
    {
        // Define $conf with a default value if not already set
        if (!isset($conf) || !isset($conf['site_name'])) {
            $conf['site_name'] = 'My Website';
        }
        ?>
        <header>
            <h1>Welcome to <?php print $conf['site_name']; ?></h1>
        </header>
        <?php
    }

    public function footer()
    {
        ?>
        <footer>
            <p>Copyrights &copy; <?php echo date("Y"); ?> My Web Page:-All Rights Reserved</p>
        </footer>

        <?php
    }
}