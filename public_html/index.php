<?php require_once('bootstrap.php'); ?><!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mkrspc.se - Förkorta URL:er">
    <meta name="author" content="Jim Nelin">

    <title>Mkrspc.se - Förkorta URL:er</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./assets/css/mkrspc.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="./assets/js/html5shiv.js"></script>
      <script src="./assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id="wrap">
      <div class="container">
        <div class="page-header">
          <h1 class="center">Mkrspc.se - Förkorta URL:er</h1>
        </div>
        <p class="lead">Detta är en fri, öppen och gratis tjänst för att förkorta URL för Stockholm Makerspace.</p>
		<p>Givetvis skulle man kunna använda någon existerande tjänst istället, t.ex. bit.ly istället - Men vi tycker det är häftigare med en egen tjänst för egna länkar inom och till föreningen. Håller du inte med?</p>
		<br>
		
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Fyll i URL:en som du vill förkorta</h3>
			</div>
			<div class="panel-body">
				<form role="form" id="urlform">
					<div class="form-group">
						<input type="url" class="form-control" id="url" required placeholder="http://">
					</div>
					
					<button type="submit" class="btn btn-default btn-block">Förkorta min URL</button>
				</form>
			</div>
			<div class="panel-footer" id="result"></div>
		</div>
		
		
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">En tjänst utvecklad av och för Stockholm Makerspace - Läs mer på <a href="http://www.makerspace.se">http://www.makerspace.se/</a></p>
      </div>
    </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/mkrspc.js"></script>
  </body>
</html>
