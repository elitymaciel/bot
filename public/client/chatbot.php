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
                <button type="button" class="btn btn-primary float-right ml-2 mr-2">
                  Add
                </button>
              </div>
            </div>
            <div class="card-body">
              <?php $options = [];
              foreach ($mensagems as $key => $option) : ?>
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  <li style="cursor:pointer ">
                    <span class="text" ><?= $key + 1 . ' - ' . $option ?></span>
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
              asdf
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php $this->push('scripts') ?> 
<script src="<?= SITE['base_url'] ?>public/assets/pages/bot.js"></script> 
<?php $this->end() ?>