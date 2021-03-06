<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo url_for('@homepage') ?>">
            <img src="/images/lyd-video-b&w.png" alt="Admin" />
          </a>
        </h1>
      </div>
    <?php if ($sf_user->isAuthenticated()): ?> 
      <div id="menu">
        <ul>
          <li><?php echo link_to('Videos', '@video') ?></li>
          <li><?php echo link_to('Dancers', '@dancer') ?></li>
          <li><?php echo link_to('Songs', '@song') ?></li>
          <li><?php echo link_to('Events', '@event') ?></li>
          <li><?php echo link_to('Users', '@sf_guard_user') ?></li>
          <li><?php echo link_to('Logout', '@sf_guard_signout') ?></li>
        </ul>
      </div>
    <?php endif; ?>

      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
        powered by <a href="http://www.symfony-project.org/">
        <img src="/images/symfony_button.gif" alt="symfony framework" /></a>
      </div>
    </div>
  </body>
</html>
