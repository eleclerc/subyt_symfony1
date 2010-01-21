<!--
<h2><?php echo $video['youtube_title'] ?></h2>
<p><?php echo $video['youtube_description'] ?></p>
-->
<div class="span-12 first">
  <object width="445" height="364">
    <param name="movie" value="http://www.youtube.com/v/<?php echo $video['youtube_id'] ?>&hl=en_US&fs=1&rel=0&border=1"></param>
    <param name="allowFullScreen" value="true"></param>
    <param name="allowscriptaccess" value="always"></param>
    <embed src="http://www.youtube.com/v/<?php echo $video['youtube_id'] ?>&hl=en_US&fs=1&rel=0&border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></embed>
  </object>
  <p><small><a href="http://www.youtube.com/watch?v=<?php echo $video['youtube_id'] ?>">original source</a></small></p>
</div>

<div class="span-12 last">
    <ul>
        <li>Dancers</li>
        <ul>
          <?php foreach ($video->Dancers as $dancer): ?>
            <li><a href="<?php echo url_for('dancer/show?id='.$dancer['id']) ?>"><?php echo $dancer['name'] ?></a></li>
          <?php endforeach; ?>
        </ul>
        <li>Song(s)</li>
        <ul>
          <?php foreach ($video->Songs as $song): ?>
            <li><a href="<?php echo url_for('song/show?id='.$song['id']) ?>"><?php echo $song ?></a></li>
          <?php endforeach; ?>
        </ul>
        <li>Event</li>
        <ul>
            <li><?php echo $video->Event['name'] ?> - <?php echo $video->Event['state'] ?></li>
        </ul>
        <li>Year</li>
        <ul>
            <li><a href="<?php echo url_for('video/list?year='.$video['year']) ?>"><?php echo $video['year'] ?></a></li>
        </ul>
    </ul>
</div>
<div class="clear"></div>


