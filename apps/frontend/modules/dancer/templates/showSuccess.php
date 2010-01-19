<div class="span-24">
<h2>Dancer :: <?php echo $dancer['name'] ?></h2>
<h4><?php echo $dancer['website'] ?> <a href="<?php echo $dancer['website'] ?>"><img border="0" src="/images/external.png" /></a></h4>

<?php include_partial('video/list', array('videos' => $dancer->Videos, 'watchLink' => true)) ?>
</div>
