<?php

$target_dir = "";
$target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
chmod($_FILES["fileToUpload"]["tmp_name"],0777);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded" 
    } else {
        echo getcwd();
        echo get_current_user();
        echo substr(sprintf('%o', fileperms($_FILES["fileToUpload"]["tmp_name"])))
                                            

        echo "Sorry, there was an error uploading your file.";
    }
}
function hookup(){

$sqlname="localhost";
$username="root";
$table="tb_cform";
$password="sgtce40group!";



$db="responses";
$file= "thebest.csv";
$cons= mysqli_connect("$sqlname", "$username","$password","$db") ;
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
			    $result2=mysqli_query($cons,"select count(*) count from $table");
			    $r2=mysqli_fetch_array($result2);
			    $count2=(int)$r2['count'];
			    $count=$count2-$count1;



}

?>
