<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
<div id="homepage-text">
<?php echo nls2p($homepageText); ?>
</div>
<?php endif; ?>

<div id="featured">
<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
<div id="featured-item">
<h2><?php echo __('Featured Item'); ?></h2>
    <?php echo random_featured_items(); ?>
</div>
<?php endif; ?>

<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
<div id="featured-collection">
<h2><?php echo __('Featured Collection'); ?></h2>
    <?php echo random_featured_collection(); ?>
</div>
<?php endif; ?>

<?php if ((get_theme_option('Display Featured Exhibit') !== '0')
        && plugin_is_active('ExhibitBuilder')
        && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
<!-- Featured Exhibit -->
<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
<?php endif; ?>
</div>
<div id="recent-items">
    <h2><?php echo __('Recently Added Items'); ?></h2>

    <?php
    $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
    set_loop_records('items', get_recent_items($homepageRecentItems));
    if (has_loop_records('items')):
    ?>

    <?php foreach (loop('items') as $item): ?>
    <div class="item">

        <h3 class="item-title"><?php echo link_to_item(); ?></h3>

        <?php if(metadata('item', 'has thumbnail')): ?>
        <?php echo link_to_item(item_image('square_thumbnail'), array('class' => 'image')); ?>
        <?php endif; ?>

        <?php if($desc = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>150))): ?>
        <p class="item-description"><?php echo $desc; ?><?php echo link_to_item('see more',(array('class'=>'show'))) ?></p>
        <?php endif; ?>

    </div>
    <?php endforeach; ?>

    <?php else: ?>

    <p><?php echo __('No recent items available.'); ?></p>

    <?php endif; ?>

    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>

</div><!--end recent-items -->

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
