<?php
$this->layout('_themeAdmin', ['titulo' => 'Dashboard']) ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="card mb-2 shadow-lg">
        <div class="row">
          <div class="col-sm-7">
            <h1 class="p-2 text-dark text-right ">Automação</h1s>
          </div>
          <div class="col-sm-5 mt-2">
            <button type="button" class="btn btn-primary float-right ml-2 mr-2" data-toggle="dropdown">
              Adicionar Dialogo
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
              <a class="dropdown-item" href="#" onclick="createMessage()">Mensagem</a>
              <a class="dropdown-item" href="#">Audio</a>
              <a class="dropdown-item" href="#">Vídeo</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Menu Principal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">
  </div>
</div>
<div class="modal fade" id="dbclick2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span class="">Deseja realmente Excluir?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-danger" id="confirm-delete-butoon">Sim</button>
      </div>
    </div>
  </div>
</div>
<?php $this->push('scripts') ?>
<script src="https://cdn.jsdelivr.net/gh/jerosoler/Drawflow/dist/drawflow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jerosoler/Drawflow@0.0.48/dist/drawflow.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/painelwhatspp.local/public/assets/css/beautiful.css" />
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="<?= SITE['base_url'] ?>public/assets/pages/chatbot.js"></script>
<script src="<?= SITE['base_url'] ?>public/assets/pages/chatbotCreateNode.js"></script>
<script>
  function atualizarConteudo() { 
			var xhttp = new XMLHttpRequest();

			// Define o que acontece quando a resposta da fonte externa é carregada
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					// Atualiza o conteúdo da div com o novo conteúdo carregado da fonte externa
					document.getElementById("conteudo").innerHTML = this.responseText;
				}
			};

			// Abre uma conexão com a fonte externa (neste caso, um arquivo PHP)
			xhttp.open("GET", "conteudo.php", true);

			// Envie a solicitação para a fonte externa
			xhttp.send();
		}
</script> 
<?php $this->end() ?>