<?php

get_header();

if(!empty($_POST)){
    echo 'отправлено';
}
?>

<!--Здесь тренировался отправлять форму на страницу  admin-post.php в админке /wp-admin-->
<div id="content">
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" required>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Your Message</label>
        <textarea name="message" id="message"></textarea>
        <input type="hidden" name="action" value="contact_form">
        <input type="submit" value="Send My Message">
    </form>



</div>




<?php
get_footer();
