<?php
$this->layout('_themeAdmin', ['titulo' => 'Configuração']) ?>
<?php if (!empty($_SESSION['alert'])) {
  echo $_SESSION['alert'];
}  ?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card mb-2 shadow-lg">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="p-2 text-dark text-center ">Configurações Painel</h1>
        </div>
      </div>
    </div>

  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= SITE['base_url'] . 'public/assets/img/' . $_SESSION['avatar'] ?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= ucfirst($_SESSION['nome']) . ' ' . ucfirst($_SESSION['lastname'])  ?></h3>

            <p class="text-muted text-center"><?= $_SESSION['email'] ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div> 
        </div> 
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#servico" data-toggle="tab">Serviços</a></li>
              <li class="nav-item"><a class="nav-link" href="#cobrancas" data-toggle="tab">Cobranças</a></li>
              <li class="nav-item"><a class="nav-link" href="#atendente" data-toggle="tab">Atendentes</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Perfil</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="servico">
                <div class="callout callout-danger" id="servicowhats">
                  <span class="text-bold">Serviços WhatsApp bot</span>
                  <small class="badge badge-danger" id="servicoAlert">
                    <i class="far fa-clock"></i></small>

                  <div class="row float-right">
                    <button class="btn  btn-primary mr-2 mt-0 p-1 mb-0" id="servicoButton" onclick="iniciarSession()">Iniciar Serviço</button>
                  </div>
                </div>
                <div>
                  <div id="imgQR">
                      <img src="" id="" alt="">
                  </div>
                  <div id="imgGif">
                      <img src="" id="" alt="">
                  </div>
                </div>
              </div> 
              <div class="tab-pane" id="atendente"> 
                Nao implementado
              </div>
              <div class="tab-pane" id="cobrancas">
                Nao implementado
              </div>

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="scanQrcode" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
        <button type="submit" class="btn btn-primary" id="gravarMsg">Salvar</button>
      </div>
    </div>
  </div>
</div>


<?php $this->push('scripts') ?>
<script src="<?= SITE["base_url"] ?>public/assets/js/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.1/socket.io.min.js" ></script>
<script src="<?= SITE["base_url"] ?>public/assets/pages/config.js"></script>
 
<?php $this->end() ?>