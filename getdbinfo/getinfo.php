<!DOCTYPE html>
<html>
	<head>
		<title>Show Info</title>
	</head>
	<body>
		<?php
			
			$host = $_POST['hostname'];
			$username = $_POST['usrname'];
			$password = $_POST['pwd'];
			$dbname = $_POST['dbname'];
			
			// Connect to mysql
			$connection = mysqli_connect($host, $username, $password, $dbname);

			if(!$connection)
			{
				die('Unable to connect: ' . mysql_error());
			}
			else
			{
				echo '<br><h2>Connection Successfull</h2><br>';
			}
			

			//Get table
			$sql = "SHOW TABLES FROM " . $dbname;
			$table = mysqli_query($connection, $sql);

			if(!$table)
			{
				echo 'Could not run query: ' . mysqli_error($connection);
				exit();
			}

			if(mysqli_num_rows($table) > 0)
			{
				while($row = mysqli_fetch_row($table))
				{
					$tableName = $row[0];
				}
				
			}
			else
			{
				echo '0 Table Results <br>';
			}

			//Get Columns
			$sql = "SHOW COLUMNS FROM " . $tableName;
			$columns = mysqli_query($connection, $sql);
			if(!$columns)
			{
				echo 'Could not run query: ' . mysqli_error($connection) . "<br>";
				exit();
			}

			if(mysqli_num_rows($columns) > 0)
			{
				while($row = mysqli_fetch_row($columns))
				{
					$cols[] = reset($row);
				}

			}
			else
			{
				echo '0 Column Results <br>';
			}


			//Print

			$sql = "SELECT * FROM " . $tableName;

			$result = mysqli_query($connection, $sql);
			
			if(!$result)
			{
				echo 'Could not run query: ' . mysqli_error($connection);
				exit();
			}
			
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					foreach($cols as $object)
					{
						echo "<br><b>" . $object . "</b>" . " : " . $row[$object] . "<br>";
					}
				}

			}
			else
			{
				echo "0 results";
			}
			
			mysqli_close($connection);
			
		?>
	</body>
</html>