
<!DOCTYPE html>
<html>
<title>MediAdmin - Add new patient detail</title>
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
    <a href="index.php" class="w3-bar-item w3-button w3-padding">  Overview</a>
    <a href="newpatient.php" class="w3-bar-item w3-button w3-padding w3-blue">  Add new patient</a>
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
    <h5>Add details about a new patient</h5>
<div class="w3-ul w3-card-4 w3-white">
   <div class="w3-padding-16 w3-cell">
      <div class="w3-cell w3-left w3-margin-right">



    <form action="actiondb.php" target="_blank"  method='post' enctype='multipart/form-data' style="width:500px;">

      <div class="w3-section w3-container">
        <label>Enter patient name</label>
        <input class="w3-input w3-border" type="text" name="p_name" required>
      </div>
      <div class="w3-section w3-container">
        <label>Enter age</label>
        <input class="w3-input w3-border" type="text" name="p_age" required>
      </div>
      <div class="w3-section w3-container">
        <label>Upload photo</label>
        <input class="w3-input w3-border" type="file" name="fileToUpload" ><!-- required add?!?!? -->
      </div>

      <div class="w3-section w3-container">
        <input class="" type='radio' name='p_gender' value="male" required>
         <label>Male</label> &nbsp;&nbsp;&nbsp;
        <input class="" type='radio' name='p_gender' value="female" required>
         <label> Female</label>
      </div>

      <div class="w3-section w3-container">
        <label>Enter BP</label>
        <input class="w3-input w3-border" type="text" name="p_bp" required>
      </div>
      <div class="w3-section w3-container">
        <label>Enter pulse</label>
        <input class="w3-input w3-border" type="text" name="p_pulse" required>
      </div>
      <div class="w3-section w3-container">
        <label>Enter respiration</label>
        <input class="w3-input w3-border" type="text" name="p_resp" required>
      </div>

      <div class="w3-section w3-container">
         Respiration<br>
        <input class="" type='radio' name='respirate' value="1" required>
         <label>Yes</label> &nbsp;&nbsp;&nbsp;
        <input class="" type='radio' name='respirate' value="0" required>
         <label>No</label>
      </div>
      <div class="w3-section w3-container">
         Perfusion<br>
        <input class="" type='radio' name='perfusion' value="1" required>
         <label>+2 Sec</label> &nbsp;&nbsp;&nbsp;
        <input class="" type='radio' name='perfusion' value="0" required>
         <label>-2 Sec</label>
      </div>
      <div class="w3-section w3-container">
         Mental status<br>
        <input class="" type='radio' name='mental' value="1" required>
         <label>Can do</label> &nbsp;&nbsp;&nbsp;
        <input class="" type='radio' name='mental' value="0" required>
         <label>Can't do</label>
      </div>
<div class="w3-section w3-container">
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="salivate" value="1"> S Salivation<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="lacrimate" value="1"> L Lacrimation<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="urinate" value="1"> U Urination<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="defecate" value="1"> D Defecation<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="distress" value="1"> G G.I Distress<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="emesis" value="1"> E Emesis<br></div>
      <div style="padding: 5px 5px 0px 0px;"><input type="checkbox" name="miosis" value="1"> M Miosis<br></div>
<br>
      <input type='radio' name='status' value="1" required/> Minor&nbsp;&nbsp;&nbsp; <input type='radio' name='status' value="2" required/> Delayed &nbsp;&nbsp;&nbsp;<input type='radio' name='status' value="3" required/> Immediate&nbsp;&nbsp;&nbsp;
      <input type='radio' name='status' value='4' required /> Morgue
</div>


      <div class="w3-section w3-container">
      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Add new patient</button>
   </div>
    </form>
</div>
</div>
</div>
  </div>
  <hr>

  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>© MediAdmin</h4>
    <p>Developed by Lavan, Krishna Reddy and Prince David</p>
</footer><hr>
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

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
