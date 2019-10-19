<?php
$start = microtime(true);

  //your script here

?>
<!DOCTYPE html>
<html>
<title>MediAdmin - Overview</title>
<meta charset="UTF-8">
	<link rel="icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<?php
   require_once("funcs.php"); // Lavan funcs
   require_once('flatdb.php'); // Flat DB
   $db_camp = new FlatDB(__DIR__ . '/data', 'camp');
   $data = $db_camp->table('patients')->select(array('p_name'))->find(1);

   $min=0;
   $imm=0;
   $del=0;
   $mor=0;

   for($i=1; $data ; $i++){
      $data = $db_camp->table('patients')->select(array('p_name','status'))->find($i);
      if($data){
         extract($data);
         switch($status){
            case 1:$min++;break;
            case 2:$imm++;break;
            case 3:$del++;break;
            case 4:$mor++;break;
         }
         //echo "$p_name $status WOW$i";
         //echo '<hr>';
      }
   }
   //echo "Numbers $min $imm $del $mor <h3>"; NUMBERS OF THE PATIENTS STATUS COUNTS



?>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-light-grey w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-red" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <!-- <span class="w3-bar-item w3-right">Logo</span> -->
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/iconweb.PNG" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s6 w3-bar">
      <span>Welcome to <strong>MediAdmin</strong></span><br>
   <!--   <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
   -->
    </div>
  </div>
  <hr>

  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue">  Overview</a>
    <a href="newpatient.php" class="w3-bar-item w3-button w3-padding">  Add new patient</a>
    <a href="filteredview.php?filter=1" class="w3-bar-item w3-button w3-padding">  Minor</a>
    <a href="filteredview.php?filter=2" class="w3-bar-item w3-button w3-padding">  Delayed</a>
    <a href="filteredview.php?filter=3" class="w3-bar-item w3-button w3-padding">  Immediate</a>
    <a href="filteredview.php?filter=4" class="w3-bar-item w3-button w3-padding">  Morgue</a>
    <a href="chat.php" class="w3-bar-item w3-button w3-padding">  Chat</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header> -->

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><a href="filteredview.php?filter=1" style="text-decoration:none;"> <img src="images/glyph.png" /></div>
        <div class="w3-right">
         <h3><?php echo $min; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Minor</h4></a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-yellow w3-padding-16">
        <div class="w3-left">
          <a href="filteredview.php?filter=2" style="text-decoration:none;"><img src="images/glyph.png" /></i></div>
        <div class="w3-right"> <h3><?php echo $imm; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Delayed</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left">
         <a href="filteredview.php?filter=3" style="text-decoration:none;"> <img src="images/glyph.png" /></div>
        <div class="w3-right"> <h3><?php echo $del; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Immediate</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-grey w3-text-white w3-padding-16">
        <div class="w3-left">
          <a href="filteredview.php?filter=4" style="text-decoration:none;"><img src="images/glyph.png" /></div>
        <div class="w3-right"> <h3><?php echo $mor; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Morgue</a></h4>
      </div>
    </div>
  </div>


  <div class="w3-container">
    <h5>Recent patients</h5>



    <?php

    $data = $db_camp->table('patients')->select(array('p_name'))->find(9);
    for($i=1; $data ; $i++)
    {
       $data = $db_camp->table('patients')->select(array('p_name','status'))->find($i);
    }

    $max=$i-2;

    $data = $db_camp->table('patients')->select(array('p_name'))->find(9);
    $filter1=0;
   for($i=$max; $data ; $i--)
   {
      $data = $db_camp->table('patients')->select(array('p_name','p_age','p_gender','p_bp','p_pulse','p_resp' ,'respirate' ,'perfusion', 'mental', 'salivate' , 'lacrimate','urinate', 'defecate', 'distress', 'emesis' , 'miosis' ,'status'))->find($i);
      if($data){
         extract($data);
         $bptemporal=explode(",",$p_bp);
         $pulsetemporal=explode(",",$p_pulse);
         $resptemporal=explode(",",$p_resp);

         echo '
               <ul class="w3-ul w3-card-4 w3-white">
                 <li class="w3-padding-16 w3-cell ">
                   <div class="w3-cell w3-left w3-margin-right">
                       <img src="pphoto/';
		echo $i.'.jpg" class=" "  style="width:150px">';

         if($status==1)
         {
            echo '
            <div class="w3-container w3-teal">
               <h4>Minor</h4>
            </div>';
         }
         elseif ($status==2) {
            echo '
            <div class="w3-container w3-yellow">
               <h4>Delayed</h4>
            </div>';
         }
         elseif ($status==3) {
            echo '
            <div class="w3-container w3-red">
               <h4>Immediate</h4>
            </div>';
         }
         elseif ($status==4) {
            echo '
            <div class="w3-container w3-grey">
               <h4>Morgue</h4>
            </div>';
         }
                              echo '

                     </div>  <!-- class="w3-left w3-circle w3-margin-right" -->
                   <div class="w3-cell w3-left w3-margin-right " >

                   <table border=1 class="w3-table-all">
                   <tr><td colspan="2"><h2>'.$p_name.'</h2><span class="w3-opacity"> #'.$i.'</span></td></tr><tr><td colspan="2"> <span class="w3-opacity">'.$p_gender.'</span></td></tr>
                      <tr><td>Age</td><td> '.$p_age.'<br></td></tr>
                      <tr><td>Respiration</td><td> '.yon($respirate).'<br></td></tr>
                      <tr><td>Perfusion</td><td> '.yon($perfusion).'<br></td></tr>
                      <tr><td>Mental Status</td><td> '.yon($mental).'<br></td></tr>
                   </table>



                 </div>
                 <div class="w3-cell w3-left w3-margin-right " >
                    <table border=1 class="w3-table-all">
                       <tr><td>Salivate:</td><td> '.yon($salivate).'<br></td></tr>
                       <tr><td>Lacrimate:</td><td> '.yon($lacrimate).'<br></td></tr>
                       <tr><td>Urinate:</td><td> '.yon($urinate).'<br></td></tr>
                       <tr><td>Defecate:</td><td> '.yon($defecate).'<br></td></tr>
                       <tr><td>Distress:</td><td> '.yon($distress).'<br></td></tr>
                       <tr><td>Emesis:</td><td> '.yon($emesis).'<br></td></tr>
                       <tr><td>Miosis:</td><td> '.yon($miosis).'<br></td></tr>
                    </table><br>
                 </div>
                 <div class="w3-cell w3-left w3-margin-right " >
                    <table border=1 class="w3-table-all">
                       <tr><td colspan="4">Vital Signs</td></tr>
                       <tr><td>#</td> <td>BP</td><td>Pulse</td><td>Respiration</td></tr>';
$iii=0;
               foreach ($bptemporal as $test) {
                  $tem=$iii+1;
                  echo '<tr><td>'.$tem.'</td><td>'.$bptemporal[$iii].'</td><td>'.$pulsetemporal[$iii].'</td><td>'.$resptemporal[$iii].'</td></tr>';
                  $iii++;
               }



               echo '



                       <tr><td colspan=3><a href="update.php?id='.$i.'">Update</a></td></tr>
                    </table>
                 </div>

                 </li>

               </ul><br>
               ';
            }
         }




    ?>


  </div>


  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>© MediAdmin</h4>
    <p>Developed by Lavan, Krishna Reddy and Prince David</p>
  </footer>

  <hr>
  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
// bump
// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
<?php 

$end = microtime(true);
$time = $end - $start;
echo('script took ' . $time . ' seconds to execute.');
?>