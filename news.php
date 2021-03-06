<?php
/*подключение библиотек*/
session_start();
require_once "vendor/connect.php";
require_once "Lib_db.php";



$news = get_listStatus_news();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <title>ООО «Энергосоюз»</title>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <link rel='stylesheet' href='css/main.css'>

    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&family=Open+Sans:wght@400;700&display=swap' rel='stylesheet'>

    <script>
        window.onload = (function() {
            <?php if ($_SESSION['message']) { ?>

                $("#Modal").modal('show');

            <?php };
            //Это промежуточна сессия (матрешка в матрешке)
            $_SESSION['delSession'] = 'del'; ?>
        });
    </script>

</head>

<body>
    <?php
    Add_Header();
    ?>
    <hr class="separator px-0 py-0 my-0 mx-0">
    <nav class="sticky-top px-0 py-0 my-0 mx-0">
        <div class="navigation bg-white" role="navigation">
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light gb-light">
                            <!-- <a href="#" class="navbar-brand"><a href="/"><img alt="ЭНЕРГОСОЮЗ" height="45" width="70" src="img/logo 2.png"> -->
                            </a></a>

                            <div class="collapse navbar-collapse order-lg-0 order-1" id="navContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="index.php" class=" nav-link data-menu">Главная</a></li>
                                    <li class="nav-item"><a href="AboutUs.php" class="nav-link data-menu">О компании</a></li>
                                    <li class="nav-item"><a href="news.php" class="nav-link data-menu">Новости</a></li>
                                    <li class="nav-item"><a href="Services.php" class="nav-link data-menu">Услуги</a></li>
                                    <li class="nav-item"><a href="contacts.php" class="nav-link data-menu">Контакты</a></li>
                                </ul>
                            </div>

                            <form action="" class="ml-auto" style="margin-right: 10px;">

                                <?php if ($_SESSION['user']) { ?>
                                    <a class="btn orangeRed_btn btn-circle px-2" href="profile.php">
                                        Личный кабинет
                                    </a>
                                    <!-- type="button"  -->
                                <?php } else { ?>
                                    <button class="btn orangeRed_btn btn-circle px-2" type="button" data-toggle="modal" data-target="#Modal">
                                        Авторизоваться
                                    </button>
                                <?php }; ?>

                            </form>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

    </nav>

    <!-- модульное окно -->


    <div class="modal fade" id="Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="vendor/signin.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Авторизация</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-12 justify-conten-center">
                                <form action="Profile.php" method="get">
                                    <div class="form-group">
                                        <label for="login">Логин:</label>
                                        <input type="text" name="login" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Ваш логин">
                                        <small id="loginHelp"></small>
                                    </div>
                            </div>
                            <div class="col-12 justify-conten-center">
                                <div class="form-group">
                                    <label for="password">Пароль:</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль" aria-describedby="passwordHelp">
                                    <small id="passwordHelp"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between ">
                        <button type="submit" class="btn orangeRed_btn btn-circle px-2">Авторизоваться</button>
                        <p></p>
                        <a href="/Register.php" class="my_link_1 orangeRed">Регистрация аккаунта</a>
                    </div>

                    <?php
                    if ($_SESSION['delSession']) {
                        echo ' <P class="msg text-center orangeRed_text" style="padding:10px; font-size: 20px;">' .
                            $_SESSION['message'] . '</P>';

                        unset($_SESSION['message']);
                        unset($_SESSION['delSession']);
                    };
                    ?>

                </form>


            </div>
        </div>
    </div>

    <main>
        <div class="main" role="main">
            <section>
                <div style="background-color: #f1f3f7; border-color: #707070;">
                    <div class="container pt-5 pb-5">
                        <div class="row mb-4">
                            <div class="col-6  fonts-Montserrat text-start">
                                <b><strong>Новости</strong></b>
                            </div>
                            <div class="col-6 ">
                                <ul class="breadcrumb justify-content-end " style="background-color: #f1f3f7;">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Главная</a></li>
                                    <li class="breadcrumb-item actve"><a href="#" class="text-muted">Новости</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container pt-5 pb-5 table-responsive">
                    <div class="row justify-content-center">



                        <?php foreach ($news as $newss) : ?>
                            <div class="col-lg-4 col-md-6 col-12 my-3">
                                <div class="card">
                                    <img src="<?= $newss['img'] ?>" alt="фотография новости" class="  img-fluid responsive image img-thumbnail" style="overflow: hidden; width: 400px; height: 300px; object-fit: cover; ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fonts-RobotoHead"><b><?= $newss['header'] ?></b></h5>
                                        <p class="card-text fonts-Roboto"><?= $newss['text'] ?></p>
                                        <a class=" btn btn-link-info my_link_1 border-0" href="#Modal<?= $newss['id'] ?>" data-toggle="modal" id="link"><em><b>подробнее..</b></em><b></b></a>
                                    </div>
                                    <div class="cord-footer">
                                        <blockquote class="blockquote text-center">
                                            <footer class="blockquote-footer fonts-Roboto">|<?= $newss['period'] ?>| — </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>



                            <!-- МОДОЛЬНОЕ ОКНО НОВОСТИ -->
                            <div class="modal fade" id="Modal<?= $newss['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <form id="AddForm">
                                            <div class="modal-header orangeRed_btn">
                                                <h5 class="modal-title mx-auto fonts-RobotoHead"><?= $newss['header'] ?></h5>
                                                <button type="button" class="close mx-0 px-0" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">

                                                    <div class="row">
                                                        <div class=" col-6 mx-auto d-block my-2">
                                                            <div>
                                                                <img class="mx-auto d-block img_news" src="<?= $newss['img'] ?>" alt="Фото статьи">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <p class="scroll-box fonts-Roboto"><?= $newss['content'] ?></p>
                                                        </div>
                                                    </div>


                                                    <hr class="separator">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <blockquote class="blockquote text-center px-0 mx-0">
                                                                <footer class="blockquote-footer fonts-Roboto">Автор: <?= $newss['surname']?> </br> опубликованно в: <?= $newss['period'] ?></footer>
                                                                </footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                    <hr class="separator">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>




                    </div>
                </div>
            </section>
        </div>
    </main>


    <?php
    Add_Footer();

    ?>
    <script src='https://kit.fontawesome.com/09738bb7f2.js' crossorigin='anonymous'></script>
    <script src='http://code.jquery.com/jquery-latest.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>

    <script src='js/main.js'></script>
</body>

</html>