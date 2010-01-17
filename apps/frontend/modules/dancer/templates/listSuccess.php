<div class="span-12 append-12">
<h2>Dancers</h2>

<ul>
    <?php foreach ($dancers as $dancer): ?>
    <li><a href="<?php echo url_for('dancer/show?id='.$dancer['id']) ?>"><?php echo $dancer['name'] ?></a></li>
    <?php endforeach; ?>
</ul>
</div>


