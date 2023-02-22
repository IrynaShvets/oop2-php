<?php
session_start();

require_once('../vendor/autoload.php');

use \App\Title;
use \App\Annotation;
use \App\Content;
use \App\Email;
use \App\Views;
use \App\Date;
use \App\PublishInIndex;
use \App\Category;

    $errorsTitle = [];
    $errorsAnnotation = [];
    $errorsContent = [];
    $errorsEmail = [];
    $errorsViews = [];
    $errorsDate = [];
    $errorsPublishInIndex = [];
    $errorsCategory = [];

    $validEmail = false;
    $validTitle = false;
    $validAnnotation = false;
    $validContent = false;
    $validViews = false;
    $validDate = false;
    $validPublishInIndex = false;
    $validCategory = false;

  if(isset($_POST['submit'])){
      $validationTitle = new Title($_POST);
      $_SESSION['title'] = $validationTitle;
      $errorsTitle = $validationTitle->validate();
      $validTitle = $validationTitle->validTitle;

      $validationAnnotation = new Annotation($_POST);
      $_SESSION['annotation'] = $validationAnnotation;
      $errorsAnnotation = $validationAnnotation->validate();
      $validAnnotation = $validationAnnotation->validAnnotation;

      $validationContent = new Content($_POST);
      $_SESSION['content'] = $validationContent;
      $errorsContent = $validationContent->validate();
      $validContent = $validationContent->validContent;

      $validationEmail = new Email($_POST);
      $_SESSION['email'] = $validationEmail;
      $errorsEmail = $validationEmail->validate();
      $validEmail = $validationEmail->validEmail;

      $validationViews = new Views($_POST);
      $_SESSION['views'] = $validationViews;
      $errorsViews = $validationViews->validate();
      $validViews = $validationViews->validViews;

      $validationDate = new Date($_POST);
      $_SESSION['date'] = $validationDate;
      $errorsDate = $validationDate->validate();
      $validDate = $validationDate->validDate;

      $validationPublishInIndex = new PublishInIndex($_POST);
      $_SESSION['publishInIndex'] = $validationPublishInIndex;
      $errorsPublishInIndex = $validationPublishInIndex->validate();
      $validPublishInIndex = $validationPublishInIndex->validPublishInIndex;

      $validationCategory = new Category($_POST);
      $_SESSION['category'] = $validationCategory;
      $errorsCategory = $validationCategory->validate();
      $validCategory = $validationCategory->validCategory;
  }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palmo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<br>
<div class="container">

    <div class="row">
        <p><span class="error">* required field</span></p>
        <form style="width: 100%" action="index.php" method="post">
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="<?php echo ($_POST['title']) ?? '' ?>"
                    >
                    <div class="invalid-feedback"></div>
                    <span class="error">*<?php echo $errorsTitle['title'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннотация</label>
                <div class="col-md-10">
                    <textarea
                            name="annotation"
                            id="annotation"
                            class="form-control"
                            cols="30"
                            rows="10"
                            value="<?php echo ($_POST['annotation']) ?? '' ?>">
                    </textarea>
                    <div class="invalid-feedback"></div>
                    <span class="error"><?php echo $errorsAnnotation['annotation'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                            name="content"
                            id="content"
                            class="form-control"
                            cols="30"
                            rows="10"
                            value="<?php echo ($_POST['content']) ?? '' ?>"
                    ></textarea>
                    <div class="invalid-feedback"></div>
                    <span class="error"><?php echo $errorsContent['content'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                <div class="col-md-10">
                    <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?php echo ($_POST['email']) ?? '' ?>"
                    >
                    <div class="invalid-feedback">
                    </div>
                    <span class="error">*<?php echo $errorsEmail['email'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="views"
                            name="views"
                            value="<?php echo ($_POST['views']) ?? '' ?>"
                    >
                    <div class="invalid-feedback"></div>
                    <span class="error"><?php echo $errorsViews['views'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            value="<?php echo ($_POST['date']) ?? '' ?>"
                    >
                    <div class="invalid-feedback"></div>
                    <span class="error"><?php echo $errorsDate['date'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <input
                            type="checkbox"
                            class="form-control"
                            id="is_publish"
                            name="is_publish"
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Публиковать на главной</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                        <label class="form-check-label" for="publish_in_index_yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                        <label class="form-check-label" for="publish_in_index_no">
                            Нет
                        </label>
                    </div>
                    <div class="invalid-feedback"></div>
                    <span class="error">*<?php echo $errorsPublishInIndex['publish_in_index'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <select id="category" class="form-control" name="category">
                        <option disabled selected>Выберете категорию из списка..</option>
                        <option value="1">Спорт</option>
                        <option value="2>">Культура</option>
                        <option value="3">Политика</option>
                    </select>
                    <div class="invalid-feedback"></div>
                    <span class="error"><?php echo $errorsCategory['category'] ?? '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <?php if ($validTitle === true && $validAnnotation === true && $validContent === true && $validPublishInIndex === true && $validCategory === true && $validDate === true && $validViews === true && $validEmail === true && isset($_POST['submit'])) { ?>
                        <div class="alert alert-success">
                            Форма валидна
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>



