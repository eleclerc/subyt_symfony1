<!--
<h2><?php echo $video['youtube_title'] ?></h2>
<p><?php echo $video['youtube_description'] ?></p>
-->
<div class="span-12 first">
  <object width="425" height="344">
    <param name="movie" value="http://www.youtube.com/v/<?php echo $video['youtube_id'] ?>&hl=en&fs=1"></param>
    <param name="allowFullScreen" value="true"></param>
    <param name="allowscriptaccess" value="always"></param>
    <embed src="http://www.youtube.com/v/<?php echo $video['youtube_id'] ?>&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed>
  </object>
  <p><small><a href="http://www.youtube.com/watch?v=<?php echo $video['youtube_id'] ?>">original source</a></small></p>
</div>

<div class="span-12 last">
    <ul>
        <li>Dancers</li>
        <ul>
          <?php foreach ($video->Dancers as $dancer): ?>
            <li><?php echo $dancer['name'] ?></li>
          <?php endforeach; ?>
        </ul>
        <li>Song(s)</li>
        <ul>
          <?php foreach ($video->Songs as $song): ?>
            <li><?php echo $song['title'] ?> - <?php echo $song['artist'] ?></li>
          <?php endforeach; ?>
        </ul>
        <li>Event</li>
        <ul>
            <li><?php echo $video->Event['name'] ?> - <?php echo $video->Event['state'] ?></li>
        </ul>
        <li>Year</li>
        <ul>
            <li><?php echo $video['year'] ?></li>
        </ul>
    </ul>
</div>
<div class="clear"></div>


