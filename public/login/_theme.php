<!DOCTYPE html>
<html>
<head> 
<title><?=$this->e($titulo)?> | <?=$this->e($empresa)?></title>
	<link rel="stylesheet" type="text/css" href="<?= SITE["base_url"] ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?= SITE["base_url"] ?>public/assets/css/toastr.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="<?= SITE["base_url"] ?>/public/assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?= SITE["base_url"] ?>/public/assets/img/chatbot.png">
		</div>
		<div class="login-content">


<?=$this->section('content')?>

 
        </div>
    </div>
    <script type="text/javascript" src="<?= SITE["base_url"] ?>public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= SITE["base_url"] ?>public/assets/js/main.js"></script>
    <script src="<?= SITE["base_url"] ?>public/assets/js/toastr.min.js"></script>
    <?=$this->section('scripts')?>
    <?php 
        if (!empty($_SESSION['alert'])) {
            unset($_SESSION['alert']);
        }
    ?> 
</body>
</html>
