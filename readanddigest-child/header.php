<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see readanddigest_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('readanddigest_header_meta'); ?>

  <!-- Google Analytics Code -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-6634319-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php readanddigest_get_side_area(); ?>
<div class="eltdf-wrapper">
    <div class="eltdf-wrapper-inner">
        <?php readanddigest_get_header(); ?>

        <?php if(readanddigest_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltdf-back-to-top'  href='#'>
                <span class="eltdf-icon-stack">
                     <?php
                        readanddigest_icon_collections()->getBackToTopIcon('linea-icons');
                    ?>
                </span>
            </a>
        <?php } ?>

<!-- Start of retrieving single value from Engage DB -->
		<?php
		//recently added
		global $wpdb;
		$results = $wpdb->get_var( 'SELECT background FROM ' . $wpdb->prefix . 'shadowless_background WHERE id = 1' );
		if ($results == 1 && is_front_page()){
		?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery(".eltdf-psc-slide").addClass('no-background');
				});
			</script>
		<?php
		}
		?>
<!-- End of retrieval -->

        <div class="eltdf-content" <?php readanddigest_content_elem_style_attr(); ?>>
            <div class="eltdf-content-inner">
