<?php
 require_once(__DIR__ . '/db-connect.php'); 
 session_start();

if($_POST){

    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['size']) || empty($_POST['condition']) || empty($_POST['price'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }

   

}       

if($_POST['gender'] == 'f') {
     $gender = '0';  
} else {
     $gender = '1';
}

if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 
    // File path config 
    // $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($_FILES['image']['name'])['extension'];
     
    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
    $tmpName  = $_FILES['image']['tmp_name'];  
    $fp = fopen($tmpName, 'rb'); // read binary
    } else{
        sendErrorMessage('* Sorry, only JPG, JPEG, & PNG files are allowed to upload', __LINE__ );
    }
}
   
    //Getting Post Values
    $title =$_POST['title'];
    $description =$_POST['description'];
    $condition =$_POST['condition'];
    $size =$_POST['size'];
    $price =$_POST['price'];
    $idCategory=$_POST['category'];
    $idWarehouse = $_POST['warehouses'];
    $idBrand = $_POST['brand'];
    
   
    // Query for validation of username and email-id
    $ret="SELECT * FROM customers where idCustomer=:userName";
    $queryt = $dbh -> prepare($ret);
    $queryt->bindParam(':userName',$_SESSION['username'],PDO::PARAM_STR);
    $queryt -> execute();
    $results = $queryt -> fetchAll(PDO::FETCH_OBJ);
    if($queryt -> rowCount() == 1)
    {
        
    // Query for Insertion
    $sql="INSERT INTO products (`idCustomer`,`idWarehouse`,`title`,`description`,`image`,`size`,`condition`,`price`,`gender`,`idCategory`,`idBrand`) 
            VALUES (:idCustomer,:idWarehouse,:title,:description,:image,:size,:condition,:price,:gender,:idCategory,:idBrand)";
    $query = $dbh->prepare($sql);

    // Binding Post Values
    $query->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_INT);
    $query->bindParam(':idWarehouse',$idWarehouse,PDO::PARAM_INT);
    $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':image',$fp,PDO::PARAM_LOB);
    $query->bindParam(':size',$size,PDO::PARAM_STR);
    $query->bindParam(':condition',$condition,PDO::PARAM_STR);
    $query->bindParam(':price',$price,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_BOOL);
    $query->bindParam(':idCategory',$idCategory,PDO::PARAM_INT);
    $query->bindParam(':idBrand',$idBrand,PDO::PARAM_INT);


    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo '{"status": 1, "message":"New record created successfully", "line":"'.__LINE__.'"}';
    }
    else
    {
        sendErrorMessage('* Something went wrong, please try again', __LINE__ );
    }
    }
     else
    {
        sendErrorMessage('* User or email already exist', __LINE__ );
    }
    


   
    function sendErrorMessage($sErrorMessage, $iLineNumber){
        echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
        exit;
    }


    
    



