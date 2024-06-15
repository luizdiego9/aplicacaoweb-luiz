<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/now-ui-kit.css?v=1.3.0" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="/js/core/jquery.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <script src="/js/plugins/bootstrap-switch.js"></script>
    <script src="/js/plugins/nouislider.min.js"></script>
    <script src="/js/plugins/bootstrap-datepicker.js"></script>
    <script src="/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
    <title>Seminario Uniasselvi</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
            <div class="container">
                <div class="dropdown button-dropdown">
                    <a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                    </a>
                    <a class="logo" href="/"></a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">GitHub</a>
                        <a class="dropdown-item" target="_blank" href="https://github.com/MatheusSan99">Matheus
                            Oliveira</a>
                    </div>
                </div>
            </div>

            <?php if (!empty($_SESSION['logado'])): ?>
                <ul class="nav">
                    <li class="nav-item" id="newNoticeNavBar">
                        <a class="nav-link active" href="/nova-noticia">Nova Noticia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Lista de Noticias</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Sair</a>
                    </li>
                </ul>
            <?php endif; ?>
        </nav>

    </header>

    <?php if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])): ?>
        <div class="notification-container">
            <?php if (isset($_SESSION['error_message'])): ?>
                <div id="errorAlert" class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
                    <?= htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success_message'])): ?>
                <div id="successAlert" class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                    <?= htmlspecialchars($_SESSION['success_message'], ENT_QUOTES, 'UTF-8'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php unset($_SESSION['error_message'], $_SESSION['success_message']); ?>
        </div>
    <?php endif; ?>