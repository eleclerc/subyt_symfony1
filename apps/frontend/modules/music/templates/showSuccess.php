<div class="span-24">
<h2>Music :: <?php echo $song ?></h2>

<?php include_partial('video/list', array('videos' => $song->Videos, 'thumbnail' => true)) ?>

</div>