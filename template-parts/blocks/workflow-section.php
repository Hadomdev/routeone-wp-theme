<?php 
  $title = get_field('title');
  $text_content = get_field('content');
?>
<section class="container mb-128">
  <?php 
    if(!empty($title)){
      ?>
      <h2 class="title title--02 no-padding"><?= $title ?></h2>
      <?php
    }
    if(!empty($text_content)){
      echo $text_content;
    }
  ?>
  <div class="mb-24"></div>
  <div class="info-list">
    <?php 
      if(have_rows('cards')){
        while(have_rows('cards')){
          the_row();
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          ?>
          <div class="info-list__card">
            <?php 
              if(!empty($title)){
                ?><p class="title-20 info-list__title"><?php echo $title; ?></p><?php
              }
              if(!empty($content)){
                $content = str_replace('<ul>', '<ul class="info-list__content">', $content);
                echo $content;
              }
            ?>
          </div>
          <?php
        }
      }
    ?>
    
  </div>
</section>