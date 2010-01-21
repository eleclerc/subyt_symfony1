<div class="span-12 append-12">
<h2>Year</h2>

<ul>
    <?php foreach ($years as $year): ?>
    <li><a href="<?php echo url_for('video/list?year=' . $year['year']) ?>">
        <?php echo $year['year'] ?>
    </a></li>
    <?php endforeach; ?>
</ul>
</div>
