<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \vendor\core\base\View::getMeta() ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
    <div class="col-md-12 text-center logo">
        <h1><a href="/">QATest</a></h1>
    </div>
    <?php if (isset($_SESSION['user'])){ ?>
    <div class="col-md-12 text-right user">
        Привет <b><?php echo $_SESSION['user'] ?></b> &nbsp;&nbsp; <a href="/ads"> Добавить обьявление</a> &nbsp;&nbsp; <a href="/auth/logout"> Выход</a>
    </div>
    <?php } ?>
</div>


<? echo $content ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/citys.js"></script>

<?php
foreach ($scripts as $script)
{
    echo $script;
}
?>
</body>
</html>