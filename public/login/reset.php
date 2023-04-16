<?php $this->layout('_theme', ['titulo' => 'Reset Senha']) ?>

<?php if (!empty($_SESSION['alert'])) {
                echo $_SESSION['alert'];
            } ?>
<form action="<?= SITE["base_url"]?>login/reset" method="POST">
    <img src="<?= SITE["base_url"] ?>/public/assets/img/avatar.svg">
    <h2 class="title">Redefinir</h2>
    <div class="input-div one">
        <div class="i">
            <i class="fas fa-user"></i>
        </div>
        <div class="div">
            <h5>Email Cadastrado</h5>
            <input type="text" name="email" class="input" required>
        </div>
    </div>
    <a href="<?= SITE['base_url']?>">Fazer Login</a>
    <input type="submit" class="btn" value="Entrar">
</form>