<?php get_header(); ?>
<main id="main">
  <?php $pricing_bg = get_field('pricing_section_background_image'); ?>
  <section id="pricing" style="background-image:url(<?php echo esc_url($pricing_bg['url']); ?>);">
    <div class="container">
      <div class="row">
		  <div class="col-md-12">
			  <h2 class="banner-title">
				  Pest Management Programs
			  </h2>
			  <div class="info-card">
				  <p class="content">
					  No matter the time or season, pests are always looking for ways to invade your home. This could be for a number of reasons, including seeking food or shelter. Though it may seem like a relatively small issue, in the process of occupying your home they can do a lot of damage. Termites are responsible for over $5 billion of damage to US property, which is typically not covered by homeowner's insurance. Mice and rats are known to chew through wiring, damage insulation, and contaminate everything in their tracks along the way. Wasps and bees will form nests in the crevices of your home, causing weight and pressure on walls, beams, or ceilings. Most pests go unnoticed, hiding in your walls or attic while doing damage you don’t recognize until it’s irreversibly been done.  </p>
  <p class="content content-2">               

Not only are pests a liability to your home’s structure, but pose a threat to your safety and health, almost always increase your stress levels. Cockroaches and rats can spread diseases like salmonella. Ticks can spread illnesses such as Lyme disease. Other pests, insects, and rodents can spread disease and allergies, causing respiratory issues such as asthma. Sometimes the ‘do-it-yourself' spirit just isn’t enough to get the job done. Often time, home remedies only take care of surface-level issues, while the root of the issue remains hidden. This is why we recommend calling one of our custom pest plans. Our professionals can fully assess any signs of damage on bi-monthly basis, enough time before these pests create a pricy problem that will go beyond simple solutions. Call the best pest control company in our region to learn more about these plans. 
				  </p>
			  </div>
		  </div>
		</div>
	  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div id="price-card-pro" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_1_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_1_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_1_description'); ?>

              <?php if(have_rows('package_1_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_1_logos')): the_row(); ?>
                    <?php 
                      $package_1_logo_img = get_sub_field('logo_image');
                      $package_1_logo_link = get_sub_field('logo_link');
                      if($package_1_logo_link): ?>
                        <a href="<?php echo esc_url($package_1_logo_link); ?>">
                          <img src="<?php echo esc_url($package_1_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_1_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_1_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_1_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div id="price-card-plus" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_2_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_2_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_2_description'); ?>

              <?php if(have_rows('package_2_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_2_logos')): the_row(); ?>
                    <?php
                      $package_2_logo_img = get_sub_field('logo_image');
                      $package_2_logo_link = get_sub_field('logo_link');
                      if($package_2_logo_link): ?>
                        <a href="<?php echo esc_url($package_2_logo_link); ?>">
                          <img src="<?php echo esc_url($package_2_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_2_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_2_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_2_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div id="price-card-premier" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_3_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_3_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_3_description'); ?>

              <?php if(have_rows('package_3_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_3_logos')): the_row(); ?>
                    <?php
                      $package_3_logo_img = get_sub_field('logo_image');
                      $package_3_logo_link = get_sub_field('logo_link');
                      if($package_3_logo_link): ?>
                        <a href="<?php echo esc_url($package_3_logo_link); ?>">
                          <img src="<?php echo esc_url($package_3_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_3_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_3_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_3_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();
