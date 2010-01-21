<div class="span-12 append-12">
<h2>Music</h2>

<ul>
    <?php foreach ($songs as $song): ?>
    <li><a href="<?php echo url_for('music/show?id='.$song->id) ?>">
        <?php echo $song ?>
    </a></li>
    <?php endforeach; ?>
</ul>
</div>
