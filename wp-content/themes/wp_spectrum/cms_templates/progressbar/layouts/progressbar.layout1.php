<style type="text/css" scoped>
   .progressbar-layout1 .progress-bar span:before {
        border-color: <?php echo esc_attr($bg_color);?> transparent transparent !important;
   }
</style>
<?php if(!$vertical): ?>
    <?php if($show_title): ?>
        <div class="cshero-progress-title">
            <<?php echo ''.$title_size; ?> class="title" <?php echo ''.$title_style; ?>><i class="<?php echo ''.$icon; ?>"></i> <?php echo ''.$title; ?></<?php echo ''.$title_size; ?>>
        </div>
    <?php endif; ?>

    <div class="progress<?php if($vertical){ echo ' vertical bottom'; } ?><?php if($striped == true){ echo ' progress-striped'; if($animated){ echo ' active'; } } ?><?php if($right){ echo " pright"; } ?>" <?php echo ''.$style; ?>>
        <div id="cshero-progress-item-<?php echo ''.$progressbar_callback; ?>" class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo ''.$value; ?>" style="background-color: <?php echo ''.$color; ?>;">
	        <span style="color: <?php echo ''.$color_value; ?>; background: <?php echo ''.$bg_color; ?>; line-height: <?php echo ''.$valstyle.'px' ?>;display: block;"><?php
                if($show_value){
                    echo ''.$value;
                } ?>
            </span>
        </div>
    </div>

    <?php if($desc): ?>
        <div class="cshero-progress-desc">
            <span <?php echo ''.$desc_style; ?>><em><?php echo esc_attr($desc); ?></em></span>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if($vertical): ?>

    <?php if($show_title): ?>
        <div class="cshero-progress-title vertical">
            <i class="<?php echo ''.$icon; ?>"></i>
            <<?php echo ''.$title_size; ?> class="title" <?php echo ''.$title_style; ?>><?php echo ''.$title; ?></<?php echo ''.$title_size; ?>>
        </div>
    <?php endif; ?>

    <div class="progress<?php if($vertical){ echo ' vertical bottom'; } ?><?php if($striped == true){ echo ' progress-striped'; if($animated){ echo ' active'; } } ?><?php if($right){ echo " pright"; } ?>" <?php echo ''.$style; ?>>
        <div id="cshero-progress-item-<?php echo ''.$progressbar_callback; ?>" class="progress-bar" role="progressbar" aria-valuetransitiongoal="<?php echo ''.$value; ?>" style="background-color: <?php echo ''.$color; ?>;">
            <span>
                <?php
                if($show_value){
                    echo ''.$value;
                }?>
            </span>
        </div>
    </div>

    <?php if($desc): ?>
        <div class="cshero-progress-desc vertical">
            <span <?php echo ''.$desc_style; ?>><em><?php echo esc_attr($desc); ?></em></span>
        </div>
    <?php endif; ?>

<?php endif; ?>