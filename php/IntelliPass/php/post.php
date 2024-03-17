<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IntelliPass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <h3>投稿</h3>
    <form action="post-result.php" method="post" enctype="multipart/form-data">
        <label for="exampleFormControlTextarea1" class="form-label">タイトル</label>
        <input class="form-control" type="text" placeholder="タイトル" aria-label="default input example" name="title">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">コンテンツ</label>
          <textarea name="content"placeholder="相談内容はこちらへ" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">必要であれば画像を</label>
          <input class="form-control" type="file" multiple name="image[]" accept="image/*">
        </div>
        <input type="hidden" name="class" value="<?php echo $_GET['class_id']; ?>"><br>
        <input type="submit" class="btn btn-primary" value="投稿">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<!-- https://kodocode.net/design-css-login/ -->