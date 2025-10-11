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

<section id="service" class="services-section">
    <div class="container">
        <div class="services-heading">
            <h3>Услуги</h3>
            <div class="services-heading__buttons">
                <button class="services-heading__button services-heading__button--prev">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 2L3 18L19 34" stroke="currentColor" stroke-width="4"/>
                    </svg>
                </button>
                <button class="services-heading__button services-heading__button--next">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 2L33 18L17 34" stroke="currentColor" stroke-width="4"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="services-list swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <x-service-card title="Химчистка" price="7500"
                                    description="Если&nbsp;вы&nbsp;готовите автомобиль к&nbsp;продаже закажите услугу предпродажная химчистка."
                                    image="/assets/img/service.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера" price="2150"
                                    description="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера. Быстро, качественно."
                                    image="/assets/img/service2.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Чистка кузова от металлических вкраплений" price="3000"
                                    description="Профессиональная чистка по доступной цене. Высокое качество услуг в «Aquaboom»."
                                    image="/assets/img/service3.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Мойка мотора" price="1500"
                                    description="Бережная мойка мотора от&nbsp;всех видов загрязнений: пыль, масло, дорожные реагенты."
                                    image="/assets/img/service4.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Химчистка" price="7500"
                                    description="Если&nbsp;вы&nbsp;готовите автомобиль к&nbsp;продаже закажите услугу предпродажная химчистка."
                                    image="/assets/img/service.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера" price="2150"
                                    description="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера. Быстро, качественно."
                                    image="/assets/img/service2.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Чистка кузова от металлических вкраплений" price="3000"
                                    description="Профессиональная чистка по доступной цене. Высокое качество услуг в «Aquaboom»."
                                    image="/assets/img/service3.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Мойка мотора" price="1500"
                                    description="Бережная мойка мотора от&nbsp;всех видов загрязнений: пыль, масло, дорожные реагенты."
                                    image="/assets/img/service4.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Химчистка" price="7500"
                                    description="Если&nbsp;вы&nbsp;готовите автомобиль к&nbsp;продаже закажите услугу предпродажная химчистка."
                                    image="/assets/img/service.jpg"
                    />
                </div>
                <div class="swiper-slide">
                    <x-service-card title="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера" price="2150"
                                    description="Мойка кузова с&nbsp;нанесением воска и&nbsp;гидрофобного полимера. Быстро, качественно."
                                    image="/assets/img/service2.jpg"
                    />
                </div>
                {{-- TODO: добавить затенение по краям--}}
            </div>
        </div>
        <a href="#register" class="btn">Записаться на мойку</a>
    </div>
</section>

@vite(['resources/js/app.ts'])
</body>
</html>
