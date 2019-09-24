<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-3 col-8 offset-2">
            <div class="card p-4">
                <h3>Login</h3>
                <hr> 
                <form action="<?php echo site_url('usuarios/login') ?>" method="post">

                    <!-- erro -->
                    <?php if(isset($erro)): ?>
                        <p class="alert alert-danger text-center"><?php echo $erro ?></p>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="usuario">Usuário</label>
                        <input  type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>                        
                        <input  type="password" class="form-control" name="senha" id="senha" placeholder="A sua senha" required>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo site_url('geral/home') ?>" class="btn btn-primary">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>