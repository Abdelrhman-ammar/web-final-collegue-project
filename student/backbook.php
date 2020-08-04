<?php
    session_start();
    $page_title ='borrow books ';
    include 'init.php';
    
    if(isset($_SESSION['name']))
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
                $id=$_REQUEST['id'];
                
                $statement=$conn->prepare("UPDATE books SET borrower_id=?,date_back=null WHERE id=?");
                $statement->execute(array(0,$id));
                back_to_right_main_page();
                

        }
        else
        {
            back_to_right_main_page();
        }
    }
    else
    {
        header ('location: ../admin/login.php');
        exit();
    }