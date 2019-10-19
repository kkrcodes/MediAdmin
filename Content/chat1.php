<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Chat | MediAdmin - Network for Medical Camps</title>
	<link rel="icon" href="favicons.ico">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/structure.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="prefetch" type="application/l10n" href="locales/locales.ini" />
    <script type="text/javascript" src="js/l10n.js"></script>
</head>
<body style="margin:0 0 0 0;">

		<span id="vc_count"></span>
    <div id="top-nav" class="navbarmed" role="navigation">
      <div class="container">
        <div class="navbar-header">
			  <a href="/content/" class="brand navbar-brand"><img src="img/iconweb.png" width="24" alt="MediAdmin-logo-small">&nbsp;MediAdmin</a>
          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span data-l10n-id="commonNavbarToggle" class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <div class="container">
		  <ul class="nav navbar-nav">
            <li><a data-l10n-id="commonNavbarHome" href="/" class="active">Home</a></li>
            <li><a data-l10n-id="commonNavbarCapture" href="#" class="active">Capture</a></li>
			<li><a data-l10n-id="commonNavbarAnalysis" href="#">Analysis</a></li>
			<li><a data-l10n-id="commonNavbarChat" href="chat.php">Chat</a></li>
 			<li><a data-l10n-id="commonNavbarAbout MediAdmin" href="#">About MediAdmin</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	</div>

<div class="container">

	<div class="lb-content">
		<section id="content">
	<!-- visitor counter -->
			<div id="welcome">
				<div class="container">
					<h1>Welcome to MediAdmin Chat</h1>
					<p>Chat with fellow doctors in the network.</p>
				</div>
			</div>
			<div class="container">
				
				<div class="two-thirds" id="chatcontainer">
					<div id="chat" class="card last">
						<h2 data-l10n-id="indexChatChat">Chat</h2>
						<div id="shoutbox" class="shoutbox_content"></div>
						<form method="POST" name="psowrte" id="sb_form" >
							<div id="shoutbox-input">
								<input data-l10n-id="indexChatName" class="nickname" type="text" 	name="name">
								<input data-l10n-id="indexChatMessage" class="message" 	type="text" 	name="data" 	placeholder="Message...">
								<button class="btn-default" type="submit" name="submit" data-l10n-id="indexchatSend">Send</button>
							</div>
							<div id="shoutbox-options">
								<h3>Text Color:</h3>
								<label for="def" 	class="bg-black" data-l10n-id="indexShoutboxDefault">	<input name="color" type="radio" value="def" 	id="def" checked>Default</label>
								<label for="blue" 	class="bg-blue" data-l10n-id="indexShoutboxBlue">	<input name="color" type="radio" value="blue" 	id="blue"		>Blue</label>
								<label for="green" 	class="bg-green" data-l10n-id="indexShoutboxGreen">	<input name="color" type="radio" value="green" 	id="green"		>Green</label>
								<label for="orange" class="bg-orange" data-l10n-id="indexShoutboxOrange">	<input name="color" type="radio" value="orange" id="orange"		>Orange</label>
								<label for="red" 	class="bg-red" data-l10n-id="indexShoutboxRed">		<input name="color" type="radio" value="red" 	id="red"		>Red</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	<div class="starter-template">


  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/files-top.js"></script>
  <script src="js/vc_tally.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
