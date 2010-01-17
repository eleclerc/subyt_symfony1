<ul>
  <?php foreach ($videos as $video): ?>
    <li>
        <?php if (!empty($watchLink)): ?>
          <a href="<?php echo url_for('video/show?id='.$video['id']) ?>">watch</a>
        <?php endif; ?>

        <?php foreach ($video->Dancers as $dancer): ?>
            <strong><?php echo $dancer['name'] ?></strong>,
        <?php endforeach; ?>
            dancing
        <?php foreach ($video->Songs as $song): ?>
            <?php if (!empty($song['title']) || !empty($song['artist'])): ?>
                on
            <?php endif; ?>
            <?php if (!empty($song['title']) && empty($song['artist'])): ?>
                the song
            <?php endif ?>
            <?php if (!empty($song['title'])): ?>
                <strong><?php echo $song['title'] ?></strong>
            <?php endif; ?>
            <?php if (!empty($song['title']) && !empty($song['artist'])): ?>
                by
            <?php endif; ?>
            <?php if (!empty($song['artist'])): ?>
                <strong><?php echo $song['artist'] ?></strong>
            <?php endif; ?>
            <?php endforeach; ?>
        <?php if (!empty($video['year'])): ?>
            in <strong><?php echo $video['year'] ?></strong>
        <?php endif; ?>

    </li>
  <?php endforeach; ?>
  </ul>