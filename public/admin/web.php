<?php
$this->layout('_themeAdmin', ['titulo' => 'Dashboard']) ?>
<?php if (!empty($_SESSION['alert'])) {
  echo $_SESSION['alert'];
}  
?>
  

<section class="content">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-7">
        <h1 class="m-0 text-dark">Web</h1>
      </div>
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= SITE['base_url']?>admin">Home</a></li>
          <li class="breadcrumb-item active">Web</li>
        </ol>
      </div>
    </div>
    <div class="card shadow-lg">
      <div class="card-body">
        <p>Este é um exemplo de uma página bonita com cabeçalho e navegação do AdminLTE.</p>
      </div>
    </div>
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
 

<?php $this->push('scripts') ?>
 
<?php $this->end() ?>