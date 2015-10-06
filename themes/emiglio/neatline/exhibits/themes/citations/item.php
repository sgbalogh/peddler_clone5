<style>
#columned { 
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;
}
</style>

<div id="primary">
    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element">
        <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
    </div>
    <?php endif; ?>
<!--<h2>Title</h2>-->
<!--<?php echo metadata('item', array('Dublin Core', 'Title')); ?>-->

<?php if (metadata('item', array('Zotero', 'Author'))): ?>
<h2>Author</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Author'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Dublin Core', 'Spatial Coverage'))): ?>
<h2>Locations</h2>


<?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => '<br>')); ?>


<?php endif; ?>

<?php if (metadata('item', array('Dublin Core', 'Temporal Coverage'))): ?>
<h2>Time Period</h2>
<?php endif; ?>
<?php echo metadata('item', array('Dublin Core', 'Temporal Coverage')); ?>


<?php if (metadata('item', array('Zotero', 'Editor'))): ?>
<h2>Editor</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Editor'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Item Type'))): ?>
<h2>Type of Resource</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Item Type'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Publication Title'))): ?>
<h2>Publication Title</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Publication Title'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Volume'))): ?>
<h2>Volume</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Volume'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'URL'))): ?>
<h2>URL</h2>
<?php $url = metadata('item', array('Zotero', 'URL'), array('delimiter' => '; ')); ?>
<?php echo "<a href=\"".$url."\">" ?>
<?php echo metadata('item', array('Zotero', 'URL'), array('delimiter' => '; ')); ?>
<?php echo "</a>" ?>
<?php endif; ?>

<?php if (metadata('item', array('Zotero', 'Archive Location'))): ?>
<h2>Archive</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Archive Location'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Pages'))): ?>
<h2>Pages</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Pages'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Date'))): ?>
<h2>Date of Creation</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Date'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Language'))): ?>
<h2>Language of Resource</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Language'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Publisher'))): ?>
<h2>Publisher</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Publisher'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Place'))): ?>
<h2>Place of Publication</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Place'), array('delimiter' => '; ')); ?>

<?php if (metadata('item', array('Zotero', 'Abstract Note'))): ?>
<h2>Abstract</h2>
<?php endif; ?>
<?php echo metadata('item', array('Zotero', 'Abstract Note'), array('delimiter' => '<br><br>')); ?>



    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div><!-- end primary -->


    <!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata($item, 'has files')): ?>
    <div id="itemfiles" class="element">
        <h2>Files</h2>
        <div class="element-text"><?php echo item_image_gallery(); ?></div>
    </div>
    <?php endif; ?>
    


    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata($item, 'has tags')): ?>

        <h2>Topics</h2>
        <div class="element-text tags"><?php echo tag_string('item'); ?></div>

    <?php endif; ?>

<?php if (metadata('item', array('Dublin Core', 'Subject'))): ?>
<h2>Individuals</h2>
<div class="element-text tags"><?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => '; ')); ?></div>

<?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (get_collection_for_item()): ?>
        <div id="collection" class="element">
            <h2>Collection</h2>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>
</hr>
<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View the item in Omeka'
); ?>