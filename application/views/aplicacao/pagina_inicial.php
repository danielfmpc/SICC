<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container-fluid pt-5 pb-5">
    <h4 class="text-center pt-2 pb-3">Informativos Ativos</h4>

    <?php if(count($fotos) === 0): ?>
        <p class="text-center">Nenhum informativo encontrado.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach($fotos as $foto):?>
                <div class="col-sm-3 col-12 text-center ml-6" >
                    <!-- condiciona a apresentação das fotografias públicas/privadas -->
                    <!-- FOTO PÚBLICA -->
                      <div class="foto-info-publica">
                          <div class="row">
                              <div class="col-8 text-left">
                                  <div class="p-2">
                                      <?php echo $foto['usuario'] ?><br>
                                      <small><?php echo $foto['data_hora'] ?></small>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <div class="foto-size p-2">
                      <img src="<?php echo base_url('assets/fotos/'.$foto['foto']) ?>" class="img-fluid">
                  </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
