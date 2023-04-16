<?php
$this->layout('_themeAdmin', ['titulo' => 'Dashboard']) ?>
<?php if (!empty($_SESSION['alert'])) {
  echo $_SESSION['alert'];
}  
?>
 
<div class="content-header">
  <div class="container-fluid">
    <div class="card mb-2 shadow-lg">
      <div class="row">
        <div class="col-sm-7 ">
          <h1 class="p-2 text-dark text-right ">WhatsApp chat Bot </h1>
        </div>
        <!-- <div class="col-sm-5 mt-2">
          <button type="button" class="btn btn-primary float-right ml-2 mr-2" onclick="startservidor()">
            Iniciar servidor
          </button>
        </div> -->
      </div>
    </div>

  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-2 bg-success" id="corElement">
          <div class="info-box-content ">
            <div class="row">
              <div class="col-sm-8 ">
                <span class="info-box-text desconectado" id="statusServidor"> Aguarde ....</span>
              </div>
            </div>
          </div>

        </div>
        <div id="qrcode">
            
        </div>
      </div>
      
      <!-- <div class="col-12 col-sm-6 col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Descrição da Anotação</h3>

          </div>
          <div class="card-body p-0">

          </div>
        </div> 
      </div> -->
    </div>

  </div>
</section>
<div class="modal fade" id="modal-lg" style="display: none; " aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title mx-auto">Adicionar Nova Tarefa</h4>

      </div>
      <div class="modal-body">
        <form id="form_tarefa">
          <div class="form-group">
            <label for="inputName">Titulo da tarefa</label>
            <input type="text" id="titulo" name="titulo" class="form-control">
          </div>
          <div class="form-group" id="formGroupEdit">
            <label for="inputDescription">Descrição</label>
            <textarea id="summernote" name="descricao" class="form-control" rows="100" cols="33"></textarea>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
        <button type="submit" class="btn btn-primary" id="gravar">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div> <!-- /.Fim modal -->
<div class="modal fade" id="ModalEdit" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Anotação</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formEditAnotacao">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="inputName">Titulo da Anotaçãao</label>
            <input type="text" id="tituloAnotacao" name="titulo" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputDescription">Descrição</label>
            <textarea id="descricaoAnotacao" name="descricao" class="form-control summernote2 "></textarea>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
        <button type="submit" class="btn btn-primary" id="gravar">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div> <!-- /.Fim modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div id="my-modal">

</div>

<?php $this->push('scripts') ?>
<script src="<?= SITE["base_url"] ?>public/assets/js/qrcode.min.js"></script>
<!-- <script src="<?= SITE["base_url"] ?>public/assets/js/qrcode.js"></script> -->
<script>
  var xhr = new XMLHttpRequest();

  function startservidor() {
    let url = "<?= SITE["base_url"] ?>servidor/start"; 
    xhr.open('POST', url, true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log(xhr.responseText)
        var data = JSON.parse(xhr.responseText); 
      }
    };
    xhr.send();
  };

  function excluirAnotacao(id) {
    var xhr = new XMLHttpRequest();
    $('#confirm-delete').modal();
    var formData = '';
    console.log("id = " + id)
    document.getElementById('confirm-delete-butoon').addEventListener('click', function() {
      let url = "<?= SITE["base_url"] ?>anotacao/delete";
      xhr.open('POST', url, true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          window.location.reload(true);
        }
      }
      formData = encodeURIComponent('id') + '=' + encodeURIComponent(id);
      xhr.send(formData);
    });

  }
  $(function() {
    let url = "<?= SITE["base_url"] ?>api/qrcode";
    let urlQrcode = 'http://localhost:3001/qrcode'
    var xhr = new XMLHttpRequest();
    xhr.open("GET", urlQrcode, true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        /* if (data.status == 'AUTHENTICATED') {
          console.log('conectado');
          removeElements();
          conectado();
        } */
        if (data.qrcode) {
          removeElements();
          console.log('desconectado');
          desconectado()
          var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: data.qrcode,
            width: 296,
            height: 256,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.M
          });
        }

      }
    };
    xhr.send();
    window.setInterval(5000);

  });

  /* function tmp() {
    
  } */
  function conectado() {
    console.log('elementos')
    const status = document.getElementById('statusServidor');
    if (!status.classList.contains('conectado') || status.classList.contains('conectado')) {
      status.classList.remove('desconectado');
      status.classList.add('conectado');
      status.innerHTML = '';
      status.innerHTML = 'Servidor Conectado';
    }

    const cor = document.getElementById('corElement');
    if (!cor.classList.contains('bg-success') || cor.classList.contains('bg-success')) {
      cor.classList.remove('bg-danger');
      cor.classList.add('bg-success');
    }
  }

  function desconectado() {
    const status = document.getElementById('statusServidor');
    if (!status.classList.contains('desconectado') || status.classList.contains('desconectado')) {
      status.classList.remove('conectado');
      status.classList.add('desconectado');
      status.innerHTML = '';
      status.innerHTML = 'Servidor OFFLINE';
    }
    const cor = document.getElementById('corElement');
    if (!cor.classList.contains('bg-danger') || cor.classList.contains('bg-danger')) {
      cor.classList.remove('bg-success');
      cor.classList.add('bg-danger');
    }
  }

  function removeElements() {

    const qrcodeDiv = document.getElementById('qrcode');
    const canvasElement = qrcodeDiv.querySelector('canvas'); // selecionando o canvas dentro da div com id qrcode
    const imgElement = qrcodeDiv.querySelector('img'); // selecionando a imagem dentro da div com id qrcode
    if (canvasElement) {
      canvasElement.remove();
    }

    if (imgElement) {
      imgElement.remove();
    }
  }
</script>
<?php $this->end() ?>