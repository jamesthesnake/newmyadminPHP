<?php

				$servername = "localhost";
				$password = "sgtce40group!";
				$username = "root";
				$dbname = "Natural Products DB";
                $table="twist_plates";

				class TableRows extends RecursiveIteratorIterator {
				function __construct($it) {
				parent::__construct($it, self::LEAVES_ONLY);
				}

				function current() {
				return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
				}

				function beginChildren() {
				echo "<tr>";
				}

				function endChildren() {
				echo "</tr>" . "\n";
				}
				}

				

				try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmts = $conn->prepare("SHOW COLUMNS FROM Ch_primer");
           
$mysqli = new mysqli("localhost", "root", "sgtce40group!", "Natural Products DB");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}



    // Set character set, to show its impact on some values (e.g., length in bytes)

    $query = "SELECT * FROM $table";

    
    if ($result = $mysqli->query($query)) {

        /* Get field information for all columns */
        $finfo = $result->fetch_fields();
        $final="<tr>";
        foreach ($finfo as $val) {
            $final .= "<th>" . $val->name."</th>";
            
        }
        $final .="</tr>";
        $result->free();
    }

$mysqli->close();
                echo "<table style='border: solid 1px black;'>";
				echo $final;
                 $seq=$_POST['Sequence'];;   
			     $stmt = $conn->prepare("SELECT * FROM $table WHERE Insert_sequence LIKE '%$seq%'");
			  $stmt->execute();

			  // set the resulting array to associative
			  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    
			  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			  echo $v;
			  }
			  }
			  catch(PDOException $e) {
			  echo "Error: " . $e->getMessage();
			  }
			  $conn = null;
			  echo "</table>";

			     
			  
?>