<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-3 col-8 offset-2">
            <div class="card p-4">
                <h3>Nova conta de usuário</h3>
                <hr>

                <form action="<?php echo site_url('admin') ?>" method="post">

                    <!-- erro -->
                    <?php if(isset($erro)): ?>
                        <p class="alert alert-danger text-center"><?php echo $erro ?></p>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="usuario">Usuário</label>
                        <input  type="text"
                                class="form-control"
                                name="usuario"
                                id="usuario"
                                placeholder="Usuário"
                                required
                                autofocus>
                    </div>
                    <div class="form-group">
                        <label for="senha_1">Senha</label>
                        <input  type="password"
                                class="form-control"
                                name="senha_1"
                                id="senha_1"
                                placeholder="A sua senha"
                                required>
                    </div>
                    <div class="form-group">
                        <label for="senha_2">Repita a senha</label>
                        <input  type="password"
                                class="form-control"
                                name="senha_2"
                                id="senha_2"
                                placeholder="senha"
                                required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Nível do usuário</label>
                       <?php 
                        $options = array(
                            'usu'         => 'Usuário',
                            'adm'           => 'admin',
                        );
                        echo form_dropdown('nivel', $options, 'form-control');
                    ?>
                    
                   </div>
                    

                    <div class="text-center">
                        <a href="<?php echo site_url('geral/home') ?>" class="btn btn-primary">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Criar conta</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
