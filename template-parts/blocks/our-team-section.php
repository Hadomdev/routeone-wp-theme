<?php 
  $title = get_field('title');
  $content = get_field('content');

?>
<div class="container mb-128">
  <div class="services-slider our-team">
    <div class="our-team__header">
      <?php 
        if(!empty($title)){
          ?>
          <div class="our-team__header-content">
            <h2 class="title title--02 no-padding">
              <?php echo $title; ?>
            </h2>
          </div>
          <?php
        }
      ?>
      
      <div class="our-team__header-action swiper-actions">
        <div class="our-team__prev swiper-actions__button"></div>
        <div class="our-team__next swiper-actions__button swiper-actions__next"></div>
      </div>
    </div>
    <div class="our-team__title-text">
      <?php 
        if(!empty($content)){
            echo $content;
        }
      ?>
    </div>
    <div class="our-team__slider">
      <div class="swiper-wrapper">
        <?php if(have_rows('team_members')){
          while(have_rows('team_members')){
            the_row();
            $photo = get_sub_field('photo');
            $name = get_sub_field('name');
            $position = get_sub_field('position');
            ?>
              <div class="swiper-slide">
                <div class="our-team__card">
                  <?php 
                    if(!empty($photo)){
                      ?>
                      <div class="our-team__img-box">
                        <img class="our-team__img" src="<?php echo $photo['url']; ?>" alt="<?php echo !empty($photo['alt']) ? $photo['alt'] : $name; ?>" />
                      </div>
                      <?php
                    }
                  ?>
                  
                  <div class="our-team__content">
                    <?php 
                      if(!empty($name)){
                        ?>
                          <div class="our-team__title"><?php echo $name; ?></div>
                        <?php
                      }

                      if(!empty($position)){
                        ?>
                          <div class="our-team__text"><?php echo $position; ?></div>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            <?php
          }
        }?>
      </div>
    </div>
  </div>
</div>