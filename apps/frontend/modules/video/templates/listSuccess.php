<div class="span-24">
<h2>All Videos
  <?php if (!empty($filter)): ?>
    :: <?php echo $filter ?>
  <?php endif; ?>
</h2>

<?php if (!empty($filter)): ?>
<p><small>(<a href="<?php echo url_for('video/index') ?>">remove filter</a>)</small></p>
<?php endif; ?>


<?php include_partial('video/list', array('videos' => $videos, 'thumbnail' => true)) ?>
</div>


