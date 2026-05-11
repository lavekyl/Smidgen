<?php

/**
 * Title: Hero
 * Slug: smidgen/hero
 * Categories: featured, banners
 * Description: Centered headline, subhead, and a pair of call-to-action buttons.
 * Keywords: hero, banner, intro
 */
?>
<!-- wp:smidgen/content-wrapper {"metadata":{"categories":["featured","banners"],"patternName":"smidgen/hero","name":"Hero"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-smidgen-content-wrapper content-wrapper" style="padding-top:5rem;padding-bottom:5rem"><!-- wp:smidgen/content-well {"size":"narrow"} -->
  <div class="wp-block-smidgen-content-well content-well-narrow"><!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50","top":"0px"}}}} -->
    <h1 class="wp-block-heading has-text-align-center" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--50)">A clear headline goes here</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"contrast-3","fontSize":"large"} -->
    <p class="has-text-align-center has-contrast-3-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--60)">A short, descriptive subheading that explains what this page is about in one sentence.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get started</a></div>
      <!-- /wp:button -->

      <!-- wp:button {"className":"is-style-outline"} -->
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Learn more</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:smidgen/content-well -->
</div>
<!-- /wp:smidgen/content-wrapper -->