<div class="span-12 append-12">
<h2>Event</h2>

<ul>
    <?php foreach ($events as $event): ?>
    <li><a href="<?php echo url_for('event/show?id='.$event->id) ?>">
        <?php echo $event ?>
    </a></li>
    <?php endforeach; ?>
</ul>
</div>
