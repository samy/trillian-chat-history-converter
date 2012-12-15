<?php
$xmlOut='';
if (isset($_FILES) && (sizeof($_FILES)>0)) {
	include("xml_formatting.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Trillian XML chat history converter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">	
		  <h1>Trillian XML chat history converter</h1>
		  <?php if ($xmlOut!='') { ?>
				<p class="lead">Here is your chat history</p>
				<?php echo $xmlOut; ?>
		  <?php } else { ?>
			  <p>Upload your XML file, to see its content formated.</p>
			<form action="" method="post" enctype="multipart/form-data">
				<p>First step, select your file</p>
				<input type="file" name="file" />
				<p>Second step</p>
				<p><button type="submit" class="btn">Submit</button></p>			
			</form>
		<?php } ?>
    </div> <!-- /container -->
  </body>
</html>
