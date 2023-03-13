<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Khurshidbek Muminov's Portfolio</title>
    <link rel="shortcut icon" href="/front/assets/favicon.ico" type="image/x-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- SplideJs Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.2.1/dist/css/splide.min.css" />
    <!-- App Styles -->
    <link rel="stylesheet" href="/front/styles/app.css" />
</head>

<body>
    <header class="header">
        <div class="animate__animated animate__slideInDown">
            <div class="container">
                <nav class="navigation">
                    <ul>
                        <li><a href="/#portfolio">Portfolio</a></li>
                        <li><a href="/#about">About</a></li>
                        <li><a href="/#contact">Contact</a></li>
                    </ul>
                    <a class="btn btn--main" href="assets/resume.pdf" download><i class="bi bi-download"></i> Resume</a>
                </nav>

                <h1 class="header__logo">
                    <a href="/">
                        <span>Khurshidbek</span>
                        <span>Muminov</span>
                    </a>
                </h1>

                <div class="header__contact">
                    <a href="mailto:mominovxurshidbek66@gmail.com">Write My Email</a></a>
                    <a class="btn btn--light" href="/files/{{ $file->file }}" target="_blank">
                        <i class="bi bi-download"></i> Resume
                    </a>
                </div>

                <div class="header__mobile">
                    <button id="navigation-button">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer__copyright">
                <p>Made with &hearts; by <a href="/">devfolio</a></p>
            </div>
            <div class="footer__social">
                <ul class="social">
                    <li>
                        <a href="https://github.com/Xurshidbek96" target="_blank"><i class="bi bi-github"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/xurshidbekmuminov/" target="_blank"><i class="bi bi-instagram"></i></a>
                    </li>

                    <li>
                        <a href="https://t.me/backend_php_dev" target="_blank"><i class="bi bi-telegram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/xurshidbek.mominov.77/" target="_blank"><i class="bi bi-facebook"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- SplideJs v3 -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.2.1/dist/js/splide.min.js"></script>
    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- App Scripts -->
    <script src="/front/scripts/app.js"></script>
</body>

</html>
