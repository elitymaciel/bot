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

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Menu Principal</h3>
                <button type="button" id="menuPrincipal" class="btn btn-primary float-right ml-2 mr-2">
                  Visualizar
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php 
              $options = [];

              foreach ($mensagems as $key => $mensagem) :
                if (!in_array($mensagem->categoria, $options)) :
                  $options[] = $mensagem->categoria;
                endif;
              endforeach;
              ?>

              <?php foreach ($options as $key => $categoria) : ?>
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  <li style="cursor:pointer ">
                    <span class="text"><?= $key + 1 . ' - ' .  $categoria ?></span>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash"></i>
                    </div>
                  </li>
                </ul>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Opções 1</h3>
                <button type="button" class="btn btn-primary float-right ml-2 mr-2" data-toggle="dropdown">
                  Add
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                  <a class="dropdown-item" href="#" onclick="createMessage()">Mensagem</a>
                  <a class="dropdown-item" href="#">Audio</a>
                  <a class="dropdown-item" href="#">Vídeo</a>
                </div>
              </div>
            </div>
            <div class="card-body minhalista">
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Opções 2</h3>
                <button type="button" class="btn btn-primary float-right ml-2 mr-2" data-toggle="dropdown">
                  Add
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                  <a class="dropdown-item" href="#" onclick="createMessage()">Mensagem</a>
                  <a class="dropdown-item" href="#">Audio</a>
                  <a class="dropdown-item" href="#">Vídeo</a>
                </div>
              </div>
            </div>
            <div class="card-body">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_menu1" tabindex="-1" role="dialog" aria-labelledby="edit_menu1_label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_menu1_label">Editar Anotação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditMenu1">
          <input type="hidden" id="EditIdNome" name="EditIdNome">
          <div class="form-group">
            <label for="EditInputNome">Nome:</label>
            <input type="text" id="EditInputNome" name="EditInputNome" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-3d" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary btn-3d" form="formEditMenu1">Salvar</button>
      </div>
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
        <button type="button" class="btn btn-secondary btn-3d" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger btn-3d" id="confirm-delete-butoon">Excluir</button>
      </div>
    </div>
  </div>
</div>


<?php $this->push('scripts') ?>
<script src="<?= SITE['base_url'] ?>public/assets/pages/bot.js"></script>
<?php $this->end() ?>