<div class="span-24 append-bottom">
  <h3>Recently added/tagged:</h3>
  <div class="box">
  <?php include_partial('video/list', array('videos' => $videos, 'watchLink' => true)) ?>
  </div>
</div>

<div class="span-24">
You may help us improve this website by submitting a new WCS video clip for tagging<br />
<form method="post" action="<?php echo url_for('video/submit') ?>">
  <input type="text" name="url" id="url" value="paste a youtube video url..." size="32" />
  <input type="submit" value="...and submit it!" />
</form>
</div>

<script type="text/javascript">
    submittext = 'paste a youtube video url...';
    var urlField = document.getElementById('url');

    urlField.onclick = function(event){
        if (event.target.value == submittext) {
            event.target.value = '';
        }
    };

    urlField.onblur = function(event){
        if (event.target.value == '') {
            event.target.value = submittext;
        }
    };
</script>
