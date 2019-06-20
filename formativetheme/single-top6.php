<?php 
get_header();
?>

<?php 

$image_array = get_field('top6_thumbnail');
$top6_thumb_url = $image_array['sizes']['medium_large'];
$thumbnail_height = $image_array['sizes']['top6-thumbnail-height'];
$thumbnail_width = $image_array['sizes']['top6-thumbnail-width'];

//echo '<pre>' . var_export($image_array['sizes'], true) . '</pre>';

?>

<main id="primary" class="top6-main">

<div class="top6-wrapper m-4">

<div class="card col-6">

<div class="row">

<div class="col-12">
<h4 class="pt-4"><?php echo get_field('top6_name'); ?></h4>

<img class="single-img p-4" src="<?php echo $top6_thumb_url ?>" alt="top6 thumb">

</div>

<div class="col">
    <ul>
        
        <li>$<?php echo get_field('top6_price'); ?></li>
        <li class="description"><?php echo get_field('description'); ?></li>
    </ul>
</div>

</div> <!--  end row -->

</div> <!--  end card -->

</div> <!--  end wrapper -->

</main>
<?php 
get_footer();