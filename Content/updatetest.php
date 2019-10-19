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
      if( !empty($_POST['p_bpu']))  {

         $data = $db_camp->table('patients')->select(array('p_bp'))->find(1);
         extract($data);
         echo "<hr> LOOK : $p_bp <hr>";

         $p_bpu = sanitize(trim($_POST["p_bpu"]));
         $p_bp=$p_bp.",".$p_bpu;
         echo "<hr> LOOK : $p_bp <hr>";

         $db_camp->table('patients')->update(1, (array('p_name' => 'David', 'p_age' => '32' ,'p_gender' => 'male', 'p_bp' => $p_bp , 'p_pulse' => '74' ,'p_resp' => '40' ,'respirate' => '1' ,'perfusion' => '1' , 'mental' => '1' , 'salivate' => '0' , 'lacrimate' => '0','urinate' => '0', 'defecate' => '0', 'distress' => '0', 'emesis' => '0', 'miosis' => '0' , 'status' => '1' )));

   }
}


   //$bpss = "1,2,4";

   //$db_camp->table('patients')->update(1, (array('p_name' => 'David', 'p_age' => '32' ,'p_gender' => 'male', 'p_bp' => '1,2' , 'p_pulse' => '74' ,'p_resp' => '40' ,'respirate' => '1' ,'perfusion' => '1' , 'mental' => '1' , 'salivate' => '0' , 'lacrimate' => '0','urinate' => '0', 'defecate' => '0', 'distress' => '0', 'emesis' => '0', 'miosis' => '0' , 'status' => '1' )));

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
         echo "<form name='patient'  action='updatetest.php' method='post' enctype='multipart/form-data'>"; ?>

         Enter BP: <input type="text" name="p_bpu" /><br>



         <input type='submit' value='Add patient' class='submit' />
      </form>
   </body>
</html>
