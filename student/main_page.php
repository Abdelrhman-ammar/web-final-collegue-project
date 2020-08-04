 <?php
  
 session_start();
 include 'init.php';

 if(isset($_SESSION['name']))
    {
 ?>
 <div id="using_ajax"></div>
<?php
 }
 else
 {
    header ('location: ../admin/login.php');
    exit();
 }

 ?>