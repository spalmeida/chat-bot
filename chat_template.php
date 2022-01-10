<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require 'dist/js/script.php' ?>
  <script>
    function setDate() {
      $('<div class="timestamp">' + "<?= date('H:i:s') ?>" + '</div>').appendTo($('.message:last'));
    }
  </script>

</head>
<body>
  <div class="chat">
    <div class="chat-title">
      <h1>Lilian</h1>
      <h2>Actio Software</h2>
      <figure class="avatar">
        <img src="http://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt="">
      </figure>
    </div>
    <div class="messages">
      <div class="messages-content"></div>
    </div>    
    <div class="progress-bar"><div class="progress"></div></div>
  </div>

</body>
</html>