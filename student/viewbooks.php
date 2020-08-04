<?php
    session_start();
    $page_title ='show books ';
    include 'connect.php';
    include 'function.php';
    
    if(isset($_SESSION['name']))
    {
        $statement=$conn->prepare("SELECT * from books ");
        $statement->execute();
        $all_books=$statement->fetchAll();
        
        
        ?>
        <div class="container">
          
         
        <div class="card d-flex justify-content-center" >
                        <div class="card-header">
                            <div class="h1 d-flex justify-content-center">All Books</div>
                        </div>
                        <div class="card-body">
                        <?php
                        foreach($all_books as $book)
                        {
                           ?>
                            
                          <div class="book" id="item<?php echo $book['id']; ?>">
                           
                            <h3><?php echo $book['name'] ?></h3>
                            <p class="details"><?php echo $book['details'] ?></p>
                            <span class="year">at : <?php echo $book['publication_year']?></span>
                            <br>
                            <br>
                            <span class="auther">by: <?php echo $book['auther']?></span>
                            
                             
                            
                            <br>
                             <?php
                             if($book['borrower_id']==0)
                             {?>
                                <form method="POST" action="
                                <?php
                                if($_SESSION['role']==0)
                                {
                                    echo "borrow.php?id=" .$book['id'];
                                }
                                else
                                {
                                    echo "../student/borrow.php?id=" .$book['id'];
                                }
                                ?>
                                 ">
                                
                                <button class="btn btn-primary btn-sm">borrow the book</button>
                                <select name="period" >
                                 <option value="1">1 weak</option>
                                 <option value="2">2 weak</option>
                                </select> 
                               </form>
                               <button onclick="destination('showBook.php?id=<?php echo $book['id'] ?>');" class="btn show_book btn-success btn-sm">show the book</button>

                               

                            <?php }
                             else
                             {
                                 ?>
                                 <div class="borr">the book is borrowed</div>
 
                            <?php 
                            }
                            ?>
                             
                                
                               
                              
                             
                          </div>

                            <?php
                        }
                        
                        ?>
                        </div>
        </div>
     </div>

     <?php
    }
     
    else
    {
        header ('location: ../admin/login.php');
        exit();
    }

