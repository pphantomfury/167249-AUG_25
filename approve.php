</php $email=$_GET['email'] ?? '' ; if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h2> Account verified for $email</h2>" ; // TODO: update database to mark user as verified } else {
    echo "<h2> Invalid or missing verification link.</h2>" ; }