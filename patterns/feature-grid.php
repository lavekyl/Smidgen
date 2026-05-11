<?php

/**
 * Title: Feature grid
 * Slug: smidgen/feature-grid
 * Categories: columns, services
 * Description: A three-column section with headings and short descriptions, on a muted background.
 * Keywords: features, grid, columns, services
 */
?>
<!-- wp:smidgen/content-wrapper {"metadata":{"categories":["text","services"],"patternName":"smidgen/feature-grid","name":"Feature grid"},"backgroundColor":"subtle-background"} -->
<div class="wp-block-smidgen-content-wrapper content-wrapper has-subtle-background-background-color has-background"><!-- wp:smidgen/content-well -->
  <div class="wp-block-smidgen-content-well content-well"><!-- wp:smidgen/grid -->
    <div class="wp-block-smidgen-grid flex-grid with-gutters"><!-- wp:smidgen/column {"widthMd":"4"} -->
      <div class="wp-block-smidgen-column flex-col md-4"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50","top":"0px"}}}} -->
        <h3 class="wp-block-heading" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--50)">Feature one</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>A short description of the first feature. Two or three sentences works well here.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:smidgen/column -->

      <!-- wp:smidgen/column {"widthMd":"4"} -->
      <div class="wp-block-smidgen-column flex-col md-4"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50","top":"0px"}}}} -->
        <h3 class="wp-block-heading" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--50)">Feature two</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>A short description of the second feature. Keep it scannable and direct.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:smidgen/column -->

      <!-- wp:smidgen/column {"widthMd":"4"} -->
      <div class="wp-block-smidgen-column flex-col md-4"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|50"}}}} -->
        <h3 class="wp-block-heading" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--50)">Feature three</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>A short description of the third feature. End with a clear benefit or outcome.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:smidgen/column -->
    </div>
    <!-- /wp:smidgen/grid -->
  </div>
  <!-- /wp:smidgen/content-well -->
</div>
<!-- /wp:smidgen/content-wrapper -->