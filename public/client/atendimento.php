<?php $this->layout('_themeAdmin', ['titulo' => 'Anotações']) ?>

<?php if (!empty($_SESSION['alert'])) {
  echo $_SESSION['alert'];
} ?>
<div class="content-wrapper" style="min-height: 2646.44px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Lista de contatos -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contatos</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" onclick="contatos()">
                  <i class="fa fa-users"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column" id="contato"> 
                <!-- <?php foreach ($atendimentos as $contato) : ?>
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-circle <?= $contato->status ? "text-success" : "text-danger" ?>"></i>
                      <?= $contato->cliente ?> <small class="badge <?= $contato->status ? 'badge-success' : 'badge-danger' ?>  float-right" id="servicoAlert">
                        <i class="far fa-clock"></i> <?= $contato->status ? "Aguardando Atendimento" : "" ?></small>
                    </a>
                  </li>
                <?php endforeach ?>   -->
                <?php foreach ($chats as $contato) : ?>
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-circle <?= $contato->type ? "text-success" : "text-danger" ?>"></i>
                      <?= $contato->from_number ?> <small class="badge <?= $contato->status ? 'badge-success' : 'badge-danger' ?>  float-right" id="servicoAlert">
                        <i class="far fa-clock"></i> <?= $contato->status ? "Aguardando Atendimento" : "" ?></small>
                    </a>
                  </li>
                <?php endforeach ?> 
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <!-- Área de mensagens -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nome do Contato</h3>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="direct-chat-messages">
                  <!-- Mensagem enviada pelo remetente -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Nome do Remetente</span>
                      <span class="direct-chat-timestamp float-right">Data e Hora</span>
                    </div>
                    <img class="direct-chat-img" src="img/user1-128x128.jpg" alt="Avatar do Remetente">
                    <div class="direct-chat-text">
                      Mensagem de texto
                    </div>
                  </div>
                  <!-- Mensagem recebida pelo destinatário -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Nome do Destinatário</span>
                      <span class="direct-chat-timestamp float-left">Data e Hora</span>
                    </div>
                    <img class="direct-chat-img" src="img/user2-128x128.jpg" alt="Avatar do Destinatário">
                    <div class="direct-chat-text">
                      Mensagem de texto
                    </div>
                  </div>
                </div>
              </div>
              <div class="chat-box-body">
                <div class="messages"></div>
                <div class="emoji-picker"></div>
              </div>
            </div>
            <div class="card-footer">
              <form action="#" method="post">
                <div class="chat-box-body">
                  <div class="input-group">
                    <input type="text" name="message" id="message" placeholder="Digite uma mensagem" class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-default" data-toggle="tooltip" title="Enviar anexo">
                        <i class="fas fa-paperclip"></i>
                      </button>
                      <button type="button" class="btn btn-default" data-toggle="tooltip" title="Enviar imagem">
                        <i class="fas fa-image"></i>
                      </button>
                      <div class="dropdown">
                        <button id="emoji-picker-btn" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-smile"></i>
                        </button>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="drawflow"></div>
  </section>
  <!-- /.content -->
</div>
<?php $this->push('scripts') ?>
<script src="<?= SITE["base_url"] ?>public/assets/pages/atendimento.js"></script>

<script> 
</script>
<?php $this->end() ?>