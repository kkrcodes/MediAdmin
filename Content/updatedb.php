<?php

   require_once("funcs.php"); // Lavan funcs
   require_once('flatdb.php'); // Flat DB

   //Init DB Patient
   $db_camp = new FlatDB(__DIR__ . '/data', 'camp');

   if(!empty($_POST))   {
      ECHO "1ST APPROACH <hr>";
      if( !empty($_POST['p_bpu']))  {

         $data=$db_camp->table('patients')->select(array('p_name','p_age','p_gender','p_bp','p_pulse','p_resp' ,'respirate' ,'perfusion', 'mental', 'salivate' , 'lacrimate','urinate', 'defecate', 'distress', 'emesis' , 'miosis' ,'status'))->find($_POST["idu"]);

         extract($data);
         echo "<hr> LOOK : $p_bp $p_pulse $p_resp<hr>";

         $p_bpu = sanitize(trim($_POST["p_bpu"]));
         $p_pulseu = sanitize(trim($_POST["p_pulseu"]));
         $p_respu = sanitize(trim($_POST["p_respu"]));
         $statusu = sanitize(trim($_POST["statusu"]));
         $respirateu = sanitize(trim($_POST["respirateu"]));
         $perfusionu = sanitize(trim($_POST["perfusionu"]));
         $mentalu = sanitize(trim($_POST["mentalu"]));

         $p_bp=$p_bp.",".$p_bpu;
         $p_pulse=$p_pulse.",".$p_pulseu;
         $p_resp=$p_resp.",".$p_respu;

         echo "<hr> LOOK : $p_bp <hr>";

         $db_camp->table('patients')->update($_POST['idu'], (array('p_name' => $p_name, 'p_age' => $p_age ,'p_gender' => $p_gender, 'p_bp' => $p_bp , 'p_pulse' => $p_pulse ,'p_resp' => $p_resp ,'respirate' => $respirateu ,'perfusion' => $perfusionu , 'mental' => $mentalu , 'salivate' => $salivate , 'lacrimate' => $lacrimate,'urinate' => $urinate, 'defecate' => $defecate, 'distress' => $distress, 'emesis' => $emesis, 'miosis' => $miosis , 'status' => $statusu )));

   }
}

echo '<hr>';
$data = $db_camp->table('patients')->find($_POST['idu']);
var_dump($data);
echo '<hr>';


header('Location: index.php');
?>
