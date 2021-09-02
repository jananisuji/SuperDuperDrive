<?php
    //Destroying session
    //By destroying session you can remove all the values from session at once.
    
    //Step-1: initialize session by calling session_start()
    session_start();

    //Step-2: Call the function session_destroy() to remove all values from session.
    session_destroy();

    //Remove some specific value from session.
    //unset($_SESSION['key_to_remove'])

    header('location:login.php');
 ?>   