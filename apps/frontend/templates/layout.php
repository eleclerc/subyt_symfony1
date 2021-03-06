<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('blueprint/screen.css') ?>
    <?php use_stylesheet('blueprint/print.css', '', array('media' => 'print')) ?>
    <?php echo use_stylesheet('blueprint/ie.css', '', array('media' => 'screen, projection', 'condition' => 'lt IE 8')) ?>
    <?php use_stylesheet('main.css') ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class="container">
    <div class="span-10 first">
      <h1><a href="<?php echo url_for('@homepage') ?>"><img src="/images/lyd-video-inverted.png" alt="Live Your Dance Video"></a></h1>
    </div>
    <div class="span-14 last prepend-top">
        <p>All your favorites West Coast Swing dancing videos by<br />
            <a href="<?php echo url_for('dancer/index') ?>">Dancer</a>,
            <a href="<?php echo url_for('event/index') ?>">Event</a>,
            <a href="<?php echo url_for('music/index') ?>">Music</a>,
            <a href="<?php echo url_for('year/index') ?>">Year</a>,
            or <a href="<?php echo url_for('video/index') ?>">see all videos</a></p>
    </div>
        
    <div class="clear"></div>
      <div class="prepend-top">
        <?php echo $sf_content ?>
      </div>
    <div class="clear"></div>
    
    <div class="span-24 quiet prepend-top">
      <p id="footer">&copy; 2009 <a class="quiet" href="http://www.danceric.net">Danceric</a></p>
    </div>
  </div>
  </body>
</html>
