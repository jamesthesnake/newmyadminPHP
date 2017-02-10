<!DOCTYPE html>
<html>
<head>
<title> Input Your name and Email to see confimration </title>
</head>
<body>
<h3> File Upload</h3>
<form action="thankyou.php" method="post">
  Name:<br>
  <input type="text" name="u_name" required><br>
 
  Email:
  <input type="email" name="u_email" required><br>

Subject:<br>
  <input type="text" name="subj" required><br>

file:<br>
  <input type="file" name="file" required><br>
<input type="submit" value="Submit"><br>
</form>
</body>
</html>
