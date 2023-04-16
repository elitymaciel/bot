<?php $v->layout("_theme")?>

<?php if (!empty($_SESSION['alert'])) {
                echo $_SESSION['alert'];
            } 

        $id = explode("/", $_GET['route'])[3]; 
?>
<form action="<?= SITE["base_url"]?>login/new_password/<?= $id?>" method="POST">
    <img src="<?= SITE["base_url"] ?>/public/assets/img/avatar.svg">
    <h2 class="title">Nova Senha</h2> 
    <div class="input-div pass">
        <div class="i"> 
            <i class="fas fa-lock"></i>
        </div>
        <div class="div">
            <h5>Senha</h5>
            <input type="password" name="password" class="input" required>
        </div>
    </div>
    <div class="input-div pass">
        <div class="i"> 
            <i class="fas fa-lock"></i>
        </div>
        <div class="div">
            <h5>Senha 2</h5>
            <input type="password" name="password2" class="input" required>
        </div>
    </div> 
    <a href="<?= SITE['base_url']?>login/reset">Esqueceu sua senha?</a>
    <input type="submit" class="btn" value="Entrar">
</form>