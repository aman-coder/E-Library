<?php
    require 'conn.php';

    $errorMsg_name ='';
    $errorMsg_authname='';
    $errorMsg_img='';
    $errorMsg_pdf='';
    $errorMsg_description='';
    
    if(isset($_POST['name']) && isset($_POST['auth_name']) && isset($_POST['img']) && isset($_POST['dscription']) && isset($_POST['pdf_link']) ){
        $name= $_POST['name'];
        $auth_name= $_POST['auth_name'];
        $img= $_POST['img'];
        $dscription= $_POST['dscription'];
        $pdf_link= $_POST['pdf_link'];
    
        //to insert values to the server ---------------------------------------------------------
    
        if(empty($name)) {
            $errorMsg_name=  "error : You did not enter a name.";
         
          }
          elseif(empty($auth_name)) {
            $errorMsg_authname=  "error : Please enter Author Name.";
            
          }
          elseif(empty($img)) {
            $errorMsg_img=  "error : Please enter Image URL.";
            
          }
          elseif(empty($pdf_link)) {
            $errorMsg_pdf=  "error : Please enter Pdf-URl.";
            
          }
          elseif(empty($dscription)) {
            $errorMsg_description=  "error : Please enter Description.";
            
          }
              else {
            $sql = 'INSERT INTO book(name, auth_name, img, dscription, pdf_link) VALUES (:name, :auth_name, :img, :dscription, :pdf_link)';
        $statement = $conn->prepare($sql);
        $statement->execute([':name'=> $name, 'auth_name'=> $auth_name, 'img'=> $img, 'dscription'=>$dscription, 'pdf_link'=> $pdf_link]);
        $id = $conn->lastInsertId();
            ?>
           
            
        <?php }
    
    }
        
    
    
    
            ?>
