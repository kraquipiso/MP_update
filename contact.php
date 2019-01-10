<?php
$pageTitle = 'Contact | Musique Plastique';
include('inc/header.php');
?>

  <h3>Get in touch if you have any questions or comments</h3>

    <!-- CONTACT FORM -->
      <form style="border: solid 1px black; padding: 1em;" action="contact_us.php" method="post">
        <div style="width: 48%; float: left;">
          <label for="name">Name</label>
          <input type="text" name="name" maxlength="50" size="30">
        </div>
        <div style="width: 48%; float: right; margin: 0;">
          <label for="email">Email Address</label>
          <input type="text" name="email" maxlength="80" size="30">
        </div>
        <div style="clear:both;"></div>
        <br>
        <label for="comments">Comments</label>
        <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
        <input type="submit" value="Submit">
      </form>

<?php
include('inc/footer.php');
?>
