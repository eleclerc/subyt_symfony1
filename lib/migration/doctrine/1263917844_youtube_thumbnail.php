<?php

class YoutubeThumbnail extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('Video', 'youtube_thumbnail', 'string', '255');
  }

  public function down()
  {
  }
}
