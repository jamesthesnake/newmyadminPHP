<html>
  <body>
    <?php
       $target_dir = "uploads/";
       $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
       $uploadOk = 1;
       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
       echo $_FILES["filesToUpload"]["tmp_name"];
       chmod($_FILES["filesToUpload"]["tmp_name"],0777);
       if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
           echo "The file ". basename( $_FILES["filesToUpload"]["name"]). " has been uploaded";
       }
       else {
           echo getcwd();
           echo get_current_user();
              echo "here";
 
           echo  $target_file;
           echo $_FILES["filesToUpload"]["tmp_name"];
           echo substr(sprintf('%o', fileperms($_FILES["filesToUpload"]["tmp_name"])));
           echo "Sorry, there was an error uploading your file.";
       }
    
    
    
       $sqlname="localhost";
       $username="root";
       $table=$_POST["tables"];
       $password="sgtce40group!";



       $db=$_POST["dbs"];
       $file= $target_file;
       $cons= mysqli_connect("$sqlname", "$username","$password","$db");

       $result1=mysqli_query($cons,"select count(*) count from $table");
       $r1=mysqli_fetch_array($result1);
       $count1=(int)$r1['count'];
  //If the fields in CSV are not seperated by comma(,)  replace comma(,) in the below query with that  delimiting character
  //If each tuple in CSV are not seperated by new line.  replace \n in the below query  the delimiting character which seperates two tuples in csv
  // for more information about the query http://dev.mysql.com/doc/refman/5.1/en/load-data.html
       mysqli_query($cons, '
       LOAD DATA LOCAL INFILE "'.$file.'"
       INTO TABLE '.$table.'
       FIELDS TERMINATED by \',\'
       LINES TERMINATED BY \'\n\'
       ');

  

  ?>
   
Welcomef <?php echo $_POST["tables"]; ?><br>
    Your email address is: <?php echo $_POST["dbs"]; ?>
    <?php echo $_FILES["filesToUpload"]["name"];?>


</body>
</html>
