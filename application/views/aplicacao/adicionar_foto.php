<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 card p-4">

            <?php echo $erros; ?>

            <h3>Adicionar foto</h3>
            <hr>
            <form enctype="multipart/form-data" action="<?php echo site_url('upload/adicionar') ?>" method="post">
                <div class="form-group">
                
                <label>Escolha os arquivos</label>
                    <input type="file" class="form-control" name="userFiles[]" multiple required />
                </div>            

                <div class="form-check">
                    <input  type="checkbox" 
                            name="check_publica"
                            id="check_publica"
                            class="form-check-input"
                            checked>
                    <label class="form-check-label" for="check_publica">Definir como foto pública.</label>
                </div>

                <div class="text-center mt-3">
                    <a href="<?php echo site_url('aplicacao') ?>" class="btn btn-primary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
              </form>
        </div>
    </div>
</div>