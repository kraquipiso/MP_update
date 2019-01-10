<?php

// check hidden field
  if ($_POST['address'] != "") {
  echo '<div style="padding: 1em; font-size: 2em;">Form Error!</div>';
  exit;
}

// check input for special chars
function check_input($data)
 {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
    // create variables, name email and comments, and check its data
    $name = check_input($_POST['name']);
    $name = (string)$name;
    $email = check_input($_POST['email']);
    $email = (string)$email;
    $comments = check_input($_POST['comments']);
    $comments = (string)$comments;


if ($name && $email && $comments) {

            date_default_timezone_set('America/Los_Angeles');

            $to = "tony@musique-plastique.com";
            $from = "no-reply@musique-plastique.com";
            $headers = "From: " . $from . "\r\n";
            $subject = "New messge from " . $name;

            // create email body
            $body = "Name:" . $name . "\n"
                    . "Email: " . $email . "\n"
                    . "Comments:" . "\n"
                    . $comments
                    . "\n\n"
                    . "-----------------";


            if( filter_var($email, FILTER_VALIDATE_EMAIL) )
            {
                if (mail($to, $subject, $body, $headers, "-f " . $from))
                {

                    // write to email log
                    $file = 'inc/log.txt';
                    // Open the file to get existing content
                    $current = file_get_contents($file);
                    // Append a new person to the file
                    $current .= date('h:i:s a') . " - " . date('m') . "/" . date('d') . "/" . date('y') . " - " . $email . "\n";
                    // Write the contents back to the file
                    file_put_contents($file, $current);
                    // begin page
                    include('inc/header.php');
                    echo "Thanks for contacting us! We'll get back to you as soon as we can." . "<br><br>" . "<a style='color: inherit;' href='index.php'>Go back</a>";
                    include('inc/footer.php');
                }
                else
                {
                  include('inc/header.php');
                  echo 'Sorry, there was a problem with your info.' . "<br><br>" . "<a style='color: inherit;' href='contact.php'>Go back</a>";
                  include('inc/footer.php');
                }
            }
            else
            {
              include('inc/header.php');
              echo 'Sorry, there was a problem with your info.' . "<br><br>" . "<a style='color: inherit;' href='contact.php'>Go back</a>";
              include('inc/footer.php');
            }

}
?>
