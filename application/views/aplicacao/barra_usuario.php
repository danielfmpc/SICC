<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container-fluid">
    <div class="d-flex">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
            </button>
            <div class="dropdown-menu" aria-labelldby="dropdownMenuButton">
                <a href="<?php echo site_url('aplicacao') ?>" class="dropdown-item"><i class="fa fa-home mr-2"></i>Página inicial</a>
                <a href="<?php echo site_url('upload/adicionar') ?>" class="dropdown-item"><i class="fa fa-plus-circle mr-2"></i>Adicionar Foto</a>
                <a href="<?php echo site_url('aplicacao/minhas') ?>" class="dropdown-item"><i class="fa fa-cog mr-2"></i>As minhas fotos</a>
                <?php if($this->session->nv === "adm"):?>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo site_url('admin') ?>" class="dropdown-item"><i class="far fa-user-circle mr-2"></i>Criar usuário</a>
               <?php else: ?>             
                    <div class="dropdown-divider"></div>
               <?php endif; ?>             
                <a href="#" class="dropdown-item"><i class="fa fa-cog mr-2"></i>Alterar senha</a>               
                <div class="dropdown-divider"></div>
                <a href="<?php echo site_url('usuarios/logout') ?>" class="dropdown-item"><i class="fa fa-sign-out mr-2"></i>Logout</a>
            </div>
        </div>
        <div class="align-self-center ml-3">
            <h4>
                <i class="fa fa-user mr-3"></i><span><?php echo $this->session->usuario ?></span>
            </h4>
        </div>
    </div>
    <hr>
</div>
