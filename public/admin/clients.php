<?php
$this->layout('_themeAdmin', ['titulo' => 'Dashboard']) ?>
<?php if (!empty($_SESSION['alert'])) {
    echo $_SESSION['alert'];
}  ?>


<div class="content-header">
    <div class="container-fluid">
        <div class="card mb-2 shadow-lg">
            <div class="row">
                <div class="col-sm-6 ">
                    <h1 class="p-2 text-dark text-right ">Clientes</h1>
                </div>
                <div class="col-sm-6 mt-2">
                    <button type="button" class="btn btn-primary float-right ml-2 mr-2" onclick="criarUsuario()">
                        Cadastrar Novo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Clientes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">

                            <?php
                            $status = null;
                            foreach ($usuarios as $user) :  ?>

                                <li>
                                    <img src="<?= SITE['base_url'] ?>public/assets/img/<?= $user->avatar ?>" style="width: 110px; height: 100px;" alt="User Image">
                                    <a class="users-list-name" onclick="user(<?= $user->id ?>)" href="#"><?= $user->username ?></a>
                                    <small class="badge <?php foreach ($user->Api as $Api) : ?>
                                        <?php echo $status = $Api->token ? "badge-success" : "badge-danger" ?> <?php endforeach ?><?= $status ? : "badge-danger" ?>" id="statusApi" style="cursor:pointer" onclick="api(<?= $user->id ?>)">
                                        <i class="far fa-clock"></i>
                                        API
                                    </small>
                                    <span class="users-list-date"><?= $user->email ?></span>
                                </li>
                            <?php endforeach ?>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="ModalCriarUsuario" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Anotação</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="formCriarUsuario" method="POST" action="<?= SITE['base_url'] ?>admin/users/cadastro">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="username">Nome:</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Sobrenome:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Senha:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="permissao">Permissão:</label>
                                    <select class="form-control" id="permissao" name="permissao">
                                        <option value="1">Administrador</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar">
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
    <div class="modal fade" id="user" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">Alexander Pierce</h3>
                        <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?= SITE["base_url"] ?>vendor/almasaeed2010/adminlte/dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3,200</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13,000</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text">PRODUCTS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="token" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Token de acesso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <input type="hidden" name="idToken" id="idToken">
                    <span class="info-box-text text-center" id="conteudotoken"></span>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" id="gravarTokenButton" onclick="gravarTokenButton()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->push('scripts') ?>
    <script src="<?= SITE["base_url"] ?>public/assets/pages/edit-user.js"></script>

    <script>
        function api(id) {

            $("#token").modal();

            const url = '<?= SITE['base_url'] . 'admin/users/token' ?>';
            const imput = document.getElementById('idToken').value = id;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    if (data.status == 'error') {
                        const status = document.getElementById('conteudotoken');
                        document.getElementById("gravarTokenButton").setAttribute("style", "display: block;");

                        status.innerHTML = '';
                        status.innerHTML = data.message;
                    }
                    if (data.type == 'successToken') {
                        const status = document.getElementById('conteudotoken');
                        document.getElementById("gravarTokenButton").setAttribute("style", "display: none;");
                        status.innerHTML = '';
                        status.innerHTML = data.message;
                    }
                }
            };
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            formData = encodeURIComponent('id') + '=' + encodeURIComponent(id);
            xhr.send(formData);
        }

        function gravarTokenButton() {
            const id = document.getElementById('idToken').value;
            const url = '<?= SITE['base_url'] . 'admin/users/token' ?>';
            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    console.log(data)
                    $("#token").modal('hide');
                    document.getElementById("statusApi").classList.remove('badge-danger');
                    document.getElementById("statusApi").classList.add('badge-success');
                    toastr.success(data.message)

                }
            };
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            formData = encodeURIComponent('idInput') + '=' + encodeURIComponent(id);
            xhr.send(formData);
        }

        function user(res) {
            $("#user").modal()
        }
    </script>
    <?php $this->end() ?>