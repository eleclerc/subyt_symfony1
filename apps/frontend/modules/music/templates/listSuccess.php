<div class="span-12 append-12">
<h2>Music</h2>

<ul>
    <?php foreach ($songs as $song): ?>
    <li><a href="<?php echo url_for('music/show?id='.$song['id']) ?>">
        <?php echo $song['artist'] ?> : <?php echo $song['title'] ?>
    </a></li>
    <?php endforeach; ?>
</ul>
</div>
