<div class="span-24">
<h2>Dancer :: <?php echo $dancer['name'] ?></h2>

<?php include_partial('video/list', array('videos' => $dancer->Videos, 'watchLink' => true)) ?>
</div>