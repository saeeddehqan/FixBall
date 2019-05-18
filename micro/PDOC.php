<?php
$dbConnect = array("host" => "localhost", "name" => "fixball", "user" => "root", "pass" => "");

function pdoConnect($sql, $var=null){
	global $dbConnect;
	$cdb = new PDO("mysql:host=" . $dbConnect["host"] . ";dbname=" . $dbConnect["name"] . ";charset=utf8", $dbConnect["user"], $dbConnect["pass"]);
	
	if(!is_null($var)){
		$exec = $cdb->prepare($sql);
		$exec->execute($var);
		return $exec->fetchAll();
	}
	$exec = $cdb->query($sql);
	return $exec->fetchAll(2);
}

function create_db($file){
	global $dbConnect;
	$cdb = new PDO("mysql:host=" . $dbConnect["host"] . ";dbname=;charset=utf8", $dbConnect["user"], $dbConnect["pass"]);
	function importSqlFile($pdo, $sqlFile, $tablePrefix = null, $InFilePath = null)
	{
		try {
			
			// Enable LOAD LOCAL INFILE
			$pdo->setAttribute(\PDO::MYSQL_ATTR_LOCAL_INFILE, true);
			
			$errorDetect = false;
			
			// Temporary variable, used to store current query
			$tmpLine = '';
			
			// Read in entire file
			$lines = file($sqlFile);
			
			// Loop through each line
			foreach ($lines as $line) {
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || trim($line) == '') {
					continue;
				}
				
				// Read & replace prefix
				$line = str_replace(['<<prefix>>', '<<InFilePath>>'], [$tablePrefix, $InFilePath], $line);
				
				// Add this line to the current segment
				$tmpLine .= $line;
				
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';') {
					try {
						// Perform the Query
						$pdo->exec($tmpLine);
					} catch (\PDOException $e) {
						echo "<br><pre>Error performing Query: '<strong>" . $tmpLine . "</strong>': " . $e->getMessage() . "</pre>\n";
						$errorDetect = true;
					}
					
					// Reset temp variable to empty
					$tmpLine = '';
				}
			}
			
			// Check if error is detected
			if ($errorDetect) {
				return false;
			}
			
		} catch (\Exception $e) {
			echo "<br><pre>Exception => " . $e->getMessage() . "</pre>\n";
			return false;
		}
		
		return true;
	}
	$cdb->exec("CREATE DATABASE fixball");
	$cdb = new PDO("mysql:host=" . $dbConnect["host"] . ";dbname=" . $dbConnect["name"] . ";charset=utf8", $dbConnect["user"], $dbConnect["pass"]);
	$res = importSqlFile($cdb, $file);
	if ($res === false) {
		die('ERROR FOR CREATE DATABASE AND TABLES');
		return False;
	}
	else{
		return True;
	}
}

function is_date($v){
	$userPattern = "/[0-9]{1,4}+\/[0-9]{1,4}+\/[0-9]{1,4}+/i";
	if (preg_match($userPattern, $v)){
		return true;
	}
	else{
		return false;
	}
}

function is_min($v){
	$v = (int)$v;
	if ($v > 95 or $v < 0){
		return False;
	}
	else{
		return true;
	}
}
// create_db();

?>