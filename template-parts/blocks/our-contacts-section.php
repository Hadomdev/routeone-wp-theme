<div class="container mb-128">
  <div class="contacts-cards">
    <?php
      if(have_rows('left_column')){
        ?>
        <div class="contacts-card">
          <?php
            while(have_rows('left_column')){
              the_row();
              $label = get_sub_field('label');
              $content = get_sub_field('content');
              if(!empty($label) && !empty($content)){
                ?>
                <div class="contacts-card__row">
                  <div class="contacts-card__title"><?php echo $label; ?></div>
                  <div class="contacts-card__wrap"><div class="contacts-card__text"><?php echo $content; ?></div></div>
                </div>
              <?php }
            } ?>
        </div>
        <?php
      }
      if(have_rows('right_column')){
        ?>
        <div class="contacts-card">
          <?php
            while(have_rows('right_column')){
              the_row();
              $label = get_sub_field('label');
              $content = get_sub_field('content');
              if(!empty($label) && !empty($content)){
                ?>
                <div class="contacts-card__row">
                  <div class="contacts-card__title"><?php echo $label; ?></div>
                  <div class="contacts-card__wrap"><div class="contacts-card__text"><?php echo $content; ?></div></div>
                </div>
              <?php }
            } ?>
        </div>
        <?php
      }
    ?>
  </div>
</div>