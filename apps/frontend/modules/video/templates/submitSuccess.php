<h2>Thank you for helping the WCS Community</h2>

<div class="span-24">
<?php if (!isset($error)): ?>
    "<b><?php echo $video['youtube_title'] ?></b>"
    <p>The video have been added to our database and will be tagged and approved soon</p>
<?php else: ?>
    <p>We're sorry, <?php echo $error ?></p>
    <p><em><?php echo $video['url'] ?></em></p>
    <p>Please <a href="<?php echo url_for('home/index') ?>">try again</a>
<?php endif; ?>
</div>

