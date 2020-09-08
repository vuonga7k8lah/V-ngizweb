<!DOCTYPE html>
<html>

<head>
    <base href="<?= \baitap\core\URL::uri()?>">
    <meta charset='UTF-8' />
    <title><?php echo isset($title)?$title:"Vương_Simple"?></title>
    <link rel='stylesheet' href='./assets/css/style.css' />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/check_ajax.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>

<body>
<div id="container">
    <div id="header">
        <h1><a href="">izCMS</a></h1>
        <p class="slogan">The iz Content Management System</p>
    </div>