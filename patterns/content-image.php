<?php

/**
 * Title: Content with image
 * Slug: smidgen/content-image
 * Categories: columns, text
 * Description: Two-column section with text on one side and an image on the other.
 * Keywords: image, columns, content, split
 */
?>
<!-- wp:smidgen/content-wrapper {"metadata":{"categories":["text","text"],"patternName":"smidgen/content-image","name":"Content with image"}} -->
<div class="wp-block-smidgen-content-wrapper content-wrapper"><!-- wp:smidgen/content-well -->
  <div class="wp-block-smidgen-content-well content-well"><!-- wp:smidgen/grid {"align":"middle"} -->
    <div class="wp-block-smidgen-grid flex-grid with-gutters align-middle"><!-- wp:smidgen/column {"widthMd":"6"} -->
      <div class="wp-block-smidgen-column flex-col md-6"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50","top":"0px"}}}} -->
        <h2 class="wp-block-heading" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--50)">A heading that describes the image</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>One or two paragraphs that explain what's being shown. Keep the focus on the reader's outcome rather than a feature list.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:smidgen/column -->

      <!-- wp:smidgen/column {"widthMd":"6"} -->
      <div class="wp-block-smidgen-column flex-col md-6"><!-- wp:image -->
        <figure class="wp-block-image"><img alt="" /></figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:smidgen/column -->
    </div>
    <!-- /wp:smidgen/grid -->
  </div>
  <!-- /wp:smidgen/content-well -->
</div>
<!-- /wp:smidgen/content-wrapper -->