<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Шрифты --}}
    <link href="/assets/fonts/Inter/stylesheet.css"/>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="/assets/favicon/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg"/>
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png"/>
    <meta name="apple-mobile-web-app-title" content="ESTET"/>
    <link rel="manifest" href="/assets/favicon/site.webmanifest"/>

    @vite(['resources/css/app.scss'])
</head>
<body>

<div id="top"></div>
<header class="header">
    <div class="container">
        <div class="header-nav">
            <a href="#top">
                <img src="/assets/img/logo.svg" alt="">
            </a>
            <div class="header-menu">
                <div class="header-menu-inner">
                    <ul class="header-menu-list">
                        <li><a href="#service">Услуги</a></li>
                        <li><a href="#results">До/после</a></li>
                        <li><a href="#advantages">Преимущества</a></li>
                        <li><a href="#gallery">Галерея работ</a></li>
                        <li><a href="#reviews">Отзывы</a></li>
                    </ul>
                    <a href="#register" class="btn">Записаться</a>
                </div>
                <div class="header-menu-background"></div>
            </div>
            <div class="header-socials">
                <a href="#">
                    <svg width="1em" height="1em">
                        <use xlink:href="/assets/img/socials.svg#tg"/>
                    </svg>
                </a>
                <a href="#">
                    <svg width="1em" height="1em">
                        <use xlink:href="/assets/img/socials.svg#wa"/>
                    </svg>
                </a>
                <span>
                    Написать в мессенджер
                </span>
            </div>
            <button class="header-burger menu-toggle">
                <span></span>
            </button>
        </div>
    </div>
</header>


<div class="top-background">
    <div class="container">
        <img src="/assets/img/top-background.png" alt="" class="top-background-image">
    </div>
</div>

<section class="first-section">
    <div class="container">
        <div class="first-section__text">
            <h1 class="first-heading">Идеально чистый авто <span>без разводов за 35 минут</span></h1>
            <a href="#register" class="btn">Записаться</a>
        </div>
        <div class="first-image" id="first-parallax">
            <div class="first-image__main" data-aos="fade-up">
                <div class="first-image-parallax">
                    <img src="/assets/img/first-image.png" alt="" data-depth="0.2">
                </div>
            </div>
            <div class="first-image__big">
                <div class="first-image-parallax">
                    <svg width="164" height="190" viewBox="0 0 164 190" data-depth="0.1">
                        <path d="M82 0L164 47.5V142.5L82 190L0 142.5V47.5L82 0Z" fill="url(#paint0_linear_21_1424)"/>
                        <defs>
                            <linearGradient id="paint0_linear_21_1424" x1="2.171e-06" y1="73.8017" x2="137.105"
                                            y2="163.42"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#8BEFD3"/>
                                <stop offset="1" stop-color="#377F7E"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>

            <div class="first-image__small">
                <div class="first-image-parallax">
                    <svg width="110" height="127" viewBox="0 0 110 127" data-depth="0.1">
                        <path d="M55 0L110 31.75V95.25L55 127L0 95.25V31.75L55 0Z" fill="url(#paint0_linear_21_1425)"/>
                        <defs>
                            <linearGradient id="paint0_linear_21_1425" x1="1.45616e-06" y1="49.3306" x2="91.7703"
                                            y2="109.524"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#8BEFD3"/>
                                <stop offset="1" stop-color="#377F7E"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

@vite(['resources/js/app.ts'])
</body>
</html>
