<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container mt-5 mb-5">
    <?php if (count($teste) <= 1): ?>
        <div class="text-center alert alert-success">
            O informativo foi carregado com sucesso.
        </div>
    <?php  else: ?>
        <div class="text-center alert alert-success">
            Os informativos foram carregados com sucesso.
        </div>
    <?php endif; ?>

    <div class="text-center">
        <a href="<?php echo site_url('aplicacao') ?>" class="btn btn-primary">Voltar</a>
        <a href="<?php echo site_url('upload/adicionar') ?>" class="btn btn-primary">Adicionar outra foto</a>
    </div>
</div>