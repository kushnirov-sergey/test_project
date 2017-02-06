<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog cs-blog-item cs-blog-item-style1 <?php if(is_sticky()){ echo "post-sticky"; } ?>">
		<header class="cs-blog-header">
			<div class="cs-blog-info">
				<div class="cs-date">
		            <span><?php echo get_the_time('d'); ?></span>
		            <span><?php echo get_the_time('M Y'); ?></span>
		        </div>
		        <div class="cs-info">
		            <?php echo cshero_title_render(); ?>
		            <?php echo cshero_blog_classic_detail(); ?>
		        </div>
			</div>
			<div class="cs-blog-media">
		        <?php
		        $date = time() . '_' . uniqid(true);
		        $gallery_ids = cshero_grab_ids_from_gallery()->ids;
		        if(!empty($gallery_ids)):
		        ?>
		            <div id="carousel-generic<?php echo ''.$date; ?>" class="carousel slide" data-ride="carousel">
		                <div class="carousel-inner">
		                    <?php $i = 0; ?>
		   	                <?php foreach ($gallery_ids as $image_id): ?>
		                        <?php
		                            $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
		                            if($attachment_image[0] != ''):
		                        ?>
		                            <div class="item <?php echo ''.$i==0?'active':''; ?>">
		                                <img style="width:100%;" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
		                            </div>
		                        <?php $i++; endif; ?>
		                    <?php endforeach; ?>
		                </div>
		                <a class="left carousel-control" href="#carousel-generic<?php echo ''.$date; ?>" role="button" data-slide="prev">
		                    <span class="glyphicon glyphicon-chevron-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-generic<?php echo ''.$date; ?>" role="button" data-slide="next">
		                    <span class="glyphicon glyphicon-chevron-right"></span>
		                </a>
		            </div>
		        <?php elseif (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
		            <div class="blog-image">
		                <?php the_post_thumbnail(); ?>
		            </div>
		        <?php endif; ?>
		    </div>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','wp_spectrum') . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="page-numbers">',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->