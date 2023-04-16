<?php $this->push('styles') ?>

<style>
    .modal-title {
        text-align: center;
    }
</style>
<?php $this->end() ?>

<div class="modal fade" id="fistModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center;">
                <h4 class="modal-title">
                    Olá Bem vindo! no seu primeiro acesso
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                  
                <form id="formEditAnotacao" method="POST" action="<?= SITE['base_url']?>client" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Nome completo</label>
                                <input type="text" id="nome_completo" name="nome_completo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputDescription">Cpf</label>
                                <input type="text" id="idcpf" name="cpf" class="form-control "> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputDescription">Telefone</label>
                                <input type="text" id="idtelefone" name="telefone" class="form-control "> 
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputDescription">CEP</label>
                                <input type="text" id="idcep" name="cep" class="form-control "> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputDescription">Cidade</label>
                                <input type="text" id="idcidade" name="cidade" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputDescription">Endereço</label>
                                <input type="text" id="idendereco" name="endereco" class="form-control ">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
                <button type="submit" class="btn btn-primary" id="gravar">Atualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>