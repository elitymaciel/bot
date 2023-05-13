<!DOCTYPE html>
<html>
<head>
	<title>Exemplo de página com cards</title>
	<!-- Inclua aqui os seus arquivos CSS e JS -->
	<style> 
    html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}
		body { 
			background: url('<?= SITE['base_url']?>/public/assets/img/6070859.jpg') no-repeat center center fixed;
			background-size: cover;
            display: flex;
			justify-content: center;
			align-items: center; 
		}

		.card-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}

		.card {
			width: 300px;
			height: 200px;
			margin: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			cursor: pointer;
			transition: all 0.3s ease;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}

		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
		}

		.card-title {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.card-description {
			font-size: 18px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="card-container">
		<div class="card">
			<div class="card-title">Card 1</div>
			<div class="card-description">Descrição do card 1.</div>
		</div>
		<div class="card">
			<div class="card-title">Card 2</div>
			<div class="card-description">Descrição do card 2.</div>
		</div>
	</div>
</body>
</html>
