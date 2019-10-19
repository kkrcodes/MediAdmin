<?php

   require_once("funcs.php"); // Lavan funcs
   require_once('flatdb.php'); // Flat DB

   //Init DB Patient
   $db_camp = new FlatDB(__DIR__ . '/data', 'camp');
   //$db_camp->table('patients')->insert(array('p_name' => 'David', 'p_age' => '32' ,'p_gender' => 'male', 'p_bp' => '120' ,'p_pulse' => '74' ,'p_resp' => '40' ,'respirate' => '1' ,'perfusion' => '1' , 'mental' => '1' , 'salivate' => '0' , 'lacrimate' => '0','urinate' => '0', 'defecate' => '0', 'distress' => '0', 'emesis' => '0', 'miosis' => '0' , 'status' => '1'));
   //$db_camp->table('patients')->insert(array('p_name' => 'Jhon Doe', 'p_age' => '23' ));
   //$db_camp->table('patients')->remove(8); // TO REMOVE ANY ENTRY

   $target_dir = "data/camp/photo/";
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


   if(!empty($_POST))   {
      ECHO "1ST APPROACH <hr>";

// &&(!empty($_POST['p_bp'])) &&(!empty($_POST['p_pulse'])) &&(!empty($_POST['p_resp'])) &&(!empty($_POST['respirate'])) &&(!empty($_POST['perfusion'])) &&(!empty($_POST['mental']))

      if( (!empty($_POST['p_name'])) && (!empty($_POST['p_age'])) && (!empty($_POST['p_gender'])) && (!empty($_POST['p_bp'])) && (!empty($_POST['p_pulse'])) && (!empty($_POST['p_resp'])))  {
ECHO "2ND APPROACH <hr>";
         $p_name = sanitize(trim($_POST["p_name"]));
         $p_age = sanitize(trim($_POST["p_age"]));
         $p_gender = sanitize(trim($_POST["p_gender"]));
         $p_bp = sanitize(trim($_POST["p_bp"]));
         $p_pulse = sanitize(trim($_POST["p_pulse"]));
         $p_resp = sanitize(trim($_POST["p_resp"]));
         $respirate = sanitize(trim($_POST["respirate"]));
         $perfusion = sanitize(trim($_POST["perfusion"]));
         $mental = sanitize(trim($_POST["mental"]));
         $salivate = isset($_POST['salivate']) ? $_POST['salivate'] : 0 ;
         $lacrimate = isset($_POST['lacrimate']) ? $_POST['lacrimate'] : 0 ;
         $urinate = isset($_POST['urinate']) ? $_POST['urinate'] : 0 ;
         $defecate = isset($_POST['defecate']) ? $_POST['defecate'] : 0 ;
         $distress = isset($_POST['distress']) ? $_POST['distress'] : 0 ;
         $emesis = isset($_POST['emesis']) ? $_POST['emesis'] : 0 ;
         $miosis = isset($_POST['miosis']) ? $_POST['miosis'] : 0 ;
         $status = sanitize(trim($_POST["status"]));

         // USE THIS  -- >$checkbox = isset($_POST['post_friend']) ? $_POST['post_friend'] : 0 ;




         echo "Input correct or not check here: ".$p_name.'-'.$p_age;
         $result = $db_camp->table('patients')->insert(array('p_name' => $p_name, 'p_age' => $p_age ,'p_gender' => $p_gender,'p_bp' => $p_bp ,'p_pulse' => $p_pulse ,'p_resp' => $p_resp ,'respirate' => $respirate ,'perfusion' => $perfusion , 'mental' => $mental , 'salivate' => $salivate , 'lacrimate' => $lacrimate,'urinate' => $urinate, 'defecate' => $defecate, 'distress' => $distress, 'emesis' => $emesis, 'miosis' => $miosis , 'status' => $status));

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
			/*

         // Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

         */
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


   echo "\n WOWSTER THE DasdasB EVERYTHING\n";
   $bpss = "1,2,4";
   echo
      $db_camp->table('patients')->update(1, (array('p_name' => 'David', 'p_age' => '32' ,'p_gender' => 'male', 'p_bp' => $bpss ,'p_pulse' => '74' ,'p_resp' => '40' ,'respirate' => '1' ,'perfusion' => '1' , 'mental' => '1' , 'salivate' => '0' , 'lacrimate' => '0','urinate' => '0', 'defecate' => '0', 'distress' => '0', 'emesis' => '0', 'miosis' => '0' , 'status' => '1' )));

   echo '<hr>';
   // Get all entries from table
   $data = $db_camp->table('patients')->all(); //all();
   if($data){
      echo "test";
      var_dump($data);
   }




   echo '<hr>';
   $data = $db_camp->table('patients')->find(13);
   var_dump($data);
   echo '<hr>';
   $data = $db_camp->table('patients')->select(array('p_name'))->find(1);
   extract($data);
   echo "$p_name";
   echo '<hr>';
   var_dump($data);


/*
   // Return specific columns only
   $data1 = $db_camp->table('patients')->select(array('p_name', 'p_age'))->all();
   echo 'PRODUCTS (name and price only):';
   var_dump($data1);

*/
echo '<hr>';
?>


<html>
   <body>
      <br><br>
      <?php
         echo "<form name='patient'  action='index.php' method='post' enctype='multipart/form-data'>"; ?>
         Enter patient name: <input type="text" name="p_name" /><br>
         Enter age: <input type="text" name="p_age" /><br>
         Enter photo: <input type='file' name='fileToUpload'><br>
         Gender: <input type='radio' name='p_gender' value="male" /> Male <input type='radio' name='gender' value="female" /> Female<br>
         Enter BP: <input type="text" name="p_bp" /><br>
         Enter pulse: <input type="text" name="p_pulse" /><br>
         Enter respiration: <input type="text" name="p_resp" /><br>
         Respiration: <input type='radio' name='respirate' value="1" /> Yes <input type='radio' name='respirate' value="0" /> No<br>
         Perfusion: <input type='radio' name='perfusion' value="1" /> +2 Sec <input type='radio' name='perfusion' value="0" /> -2 Sec<br>
         Mental status: <input type='radio' name='mental' value="1" /> Can do <input type='radio' name='mental' value="0" /> Can't do<br>
         <input type="checkbox" name="salivate" value="1"> S Salivation<br>
         <input type="checkbox" name="lacrimate" value="1"> L Lacrimation<br>
         <input type="checkbox" name="urinate" value="1"> U Urination<br>
         <input type="checkbox" name="defecate" value="1"> D Defecation<br>
         <input type="checkbox" name="distress" value="1"> G G.I Distress<br>
         <input type="checkbox" name="emesis" value="1"> E Emesis<br>
         <input type="checkbox" name="miosis" value="1"> M Miosis<br>
         <br><br>
         <input type='radio' name='status' value="1" /> Minor <input type='radio' name='status' value="2" /> Immediate <input type='radio' name='status' value="3" /> Delayed <input type='radio' name='status' value="4" /> Morgue<br><br><br>




         <input type='submit' value='Add patient' class='submit' />
      </form>
   </body>
</html>
