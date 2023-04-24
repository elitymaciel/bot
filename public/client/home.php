<?php
$this->layout('_themeAdmin', ['titulo' => 'Dashboard']) ?>
<?php if (!empty($_SESSION['alert'])) {
  echo $_SESSION['alert'];
}  ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card mb-2 shadow-lg">
      <div class="row">
        <div class="col-sm-8 ">
          <h1 class="p-2 text-dark text-right ">Dashboard</h1>
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
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">CPU Traffic</span>
            <span class="info-box-number">
              10
              <small>%</small>
            </span>
          </div> 
        </div> 
      </div> 
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div> 
        </div> 
      </div>  
  
      <div class="col-md-6">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-warning">
          <span class="info-box-icon"><i class="fas fa-tag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Inventory</span>
            <span class="info-box-number">5,200</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-success">
          <span class="info-box-icon"><i class="far fa-heart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Mentions</span>
            <span class="info-box-number">92,050</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-danger">
          <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Downloads</span>
            <span class="info-box-number">114,381</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-info">
          <span class="info-box-icon"><i class="far fa-comment"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Direct Messages</span>
            <span class="info-box-number">163,921</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

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
</div>  
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
</div>  
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modal-title"><i class="fas fa-exclamation-circle mr-2"></i>Deseja realmente excluir?</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Esta ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirm-delete-butoon">Excluir</button>
      </div>
    </div>
  </div>
</div>



<?php $this->push('scripts') ?>  
  <script>
  $(document).ready(function() {
     
  });
</script>
<?php $this->end() ?>