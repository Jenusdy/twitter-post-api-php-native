<!DOCTYPE html>
<html>
<head>
	<title>Twitter Post API</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<h5 class="my-0 mr-md-auto font-weight-normal">Twitter Post API</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" target="_blank" href="http://jenusdy.github.io">Visit my website</a>
    </nav>
	</div>
	<div class="container">
    <form method="POST" action="">
      <div class="form-group">
        <label for="tweet">Tulis tweet Anda pada kolom dibawah!</label>
        <textarea class="form-control" id="tweet" name="tweet" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Kirim</button>
    </form>
  </div>
</body>
</html>

<?php

  require_once "vendor/autoload.php";

  use Abraham\TwitterOAuth\TwitterOAuth;

  define('API_KEY','YOUR_API_KEY_HERE');
  define('API_SECRET_KEY','YOUR_SECRET_KEY_HERE');
  define('ACCESS_TOKEN','YOUR_ACCESS_TOKEN_HERE');
  define('ACCESS_TOKEN_SECRET','YOUR_ACCESS_TOKEN_SECRET_HERE');

  $connection = new TwitterOAuth(API_KEY, API_SECRET_KEY, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

  if(isset($_POST['tweet'])){
    try {
        $post_tweets = $connection->post("statuses/update", ["status" => $_POST['tweet']]);
        echo '<div class="alert alert-success" role="alert">Berhasil mengirim tweet!</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Terjadi kesalahan mengirim tweet!</div>';
    }
  }
?>
