
<?php

   require_once("funcs.php"); // Lavan funcs
   require_once('flatdb.php'); // Flat DB

   //Init DB Patient
   $db_camp = new FlatDB(__DIR__ . '/data', 'camp');
   //$db_camp->table('patients')->insert(array('p_name' => 'Jhon Doe', 'p_age' => '23' ));
   //$db_camp->table('patients')->remove(8); // TO REMOVE ANY ENTRY

   $target_dir = "\data\camp\photo\\";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


   if(!empty($_POST))   {
      if((!empty($_POST['p_name']))&&(!empty($_POST['p_age'])))  {
         $p_name = sanitize(trim($_POST["p_name"]));
         $p_age = sanitize(trim($_POST["p_age"]));
         echo "Input correct or not check here: ".$p_name.'-'.$p_age;
         $result = $db_camp->table('patients')->insert(array('p_name' => $p_name, 'p_age' => $p_age ,'p_photo' => 'test'));
         if(isset($_POST["fileToUpload"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				$temp = explode(".",$_FILES["fileToUpload"]["name"]);
            define ('SITE_ROOT', realpath(dirname(__FILE__)));

				$newfilename =  SITE_ROOT.$target_dir.$result['id']. '.' .end($temp);
            echo "<hr> LOOK HERE : $newfilename <hr>";

				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            }
         }
   }
}


   echo "\n WOWSTER THE DB EVERYTHING\n";
   // Get all entries from table
   $data = $db_camp->table('patients')->all();
   echo nl2br("PATIENTS: \n");
   var_dump($data);

?>


<html>
   <body>
      <br><br>
      <?php
         echo "<form name='patient'  action='index.php' method='post' enctype='multipart/form-data'>"; ?>
         Enter patient name: <input type="text" name="p_name" /><br>
         Enter age: <input type="text" name="p_age" /><br>
         Enter photo: <input type='file' name='fileToUpload'><br>
         Gender: <input type='radio' name='gender' value="male" /> Male
         <input type='radio' name='gender' value="female" /> Female<br>
         <input type='submit' value='Add patient' class='submit' />
      </form>
   </body>
</html>
