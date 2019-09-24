<?php
  defined('BASEPATH') OR exit('URL inválida.');
?>
  <?php if(count($fotos) === 0): ?>

      <img src="<?php echo base_url('assets/images/wallpaper.jpg') ?>" class="foto-slide" >

  <?php else: ?>
  <div id="slides">
    <div class="slides-container foto-slide">
      <?php foreach($fotos as $foto): ?>
           <img src="<?php echo base_url('assets/fotos/'.$foto['foto']) ?>" class="foto-slide" >
        <?php endforeach; ?>
      </div>
    </div>

  <?php endif; ?>
