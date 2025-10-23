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
            <h3 class="section-heading">Услуги</h3>
            <div class="heading__buttons">
                <button class="heading__button heading__button--prev">
                    <svg width="36" height="36" viewBox="0 0 36 36">
                        <path d="M19 2L3 18L19 34" stroke="currentColor" stroke-width="4"/>
                    </svg>
                </button>
                <button class="heading__button heading__button--next">
                    <svg width="36" height="36" viewBox="0 0 36 36">
                        <path d="M17 2L33 18L17 34" stroke="currentColor" stroke-width="4"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="services-list-wrapper">
        <div class="services-list-wrapper__space services-list-wrapper__space--left"></div>
        <div class="container">
            <div class="services-list swiper">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                        <div class="swiper-slide">
                            <x-service-card :service="$service"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="services-list-wrapper__space services-list-wrapper__space--right"></div>
    </div>
    <div class="container">
        <a href="#register" class="btn">Записаться на мойку</a>
    </div>
</section>

<section id="results" class="slider-wrapper result-section">
    <div class="container">
        <div class="result-heading">
            <h3 class="section-heading">ДО И ПОСЛЕ</h3>
            <div class="result-heading__text">
                Тяните за «ползунок», чтобы&nbsp;увидеть результат
                <svg width="127" height="145" viewBox="0 0 127 145">
                    <path
                        d="M76.2946 68.8927L76.5542 68.4654L76.2946 68.8927ZM116.684 27.3319L117.014 26.9555L116.684 27.3319ZM45.9287 141.777C45.8055 142.024 45.906 142.324 46.1532 142.447L50.1806 144.455C50.4278 144.578 50.728 144.478 50.8512 144.23C50.9744 143.983 50.8739 143.683 50.6267 143.56L47.0467 141.776L48.8311 138.196C48.9543 137.948 48.8538 137.648 48.6066 137.525C48.3595 137.402 48.0593 137.502 47.9361 137.749L45.9287 141.777ZM1 23.8271L1.25902 24.2547C33.2557 4.876 56.3805 -0.407713 72.4318 2.06963C88.4394 4.54024 97.4972 14.7443 101.375 26.6108C105.262 38.5076 103.927 52.0425 99.1487 61.0535C96.7607 65.5564 93.5392 68.8824 89.7318 70.3508C85.9452 71.8112 81.4948 71.4667 76.5542 68.4654L76.2946 68.8927L76.035 69.32C81.1918 72.4527 85.9663 72.8748 90.0917 71.2838C94.1962 69.7009 97.5739 66.1575 100.032 61.522C104.946 52.2562 106.291 38.4386 102.325 26.3002C98.349 14.1316 89.0194 3.61792 72.5843 1.08133C56.1928 -1.44853 32.8195 3.97111 0.740978 23.3994L1 23.8271ZM76.2946 68.8927L76.5542 68.4654C69.0645 63.9155 66.187 57.6909 66.4283 51.274C66.671 44.8214 70.0723 38.1059 75.2867 32.6575C80.498 27.2124 87.4761 23.0805 94.7931 21.7606C102.096 20.4434 109.741 21.9233 116.355 27.7082L116.684 27.3319L117.014 26.9555C110.147 20.9503 102.186 19.4109 94.6156 20.7765C87.0596 22.1395 79.8983 26.3927 74.5643 31.9661C69.2335 37.5361 65.6834 44.4725 65.429 51.2364C65.1733 58.0361 68.253 64.5927 76.035 69.32L76.2946 68.8927ZM116.684 27.3319L116.355 27.7082C123.928 34.3313 126.458 43.6628 125.187 54.2728C123.914 64.8962 118.828 76.7616 111.218 88.3343C95.9933 111.486 70.7701 133.307 46.2175 141.526L46.3762 142L46.5349 142.474C71.3476 134.168 96.7364 112.176 112.053 88.8838C119.714 77.235 124.882 65.2218 126.18 54.3918C127.479 43.5486 124.899 33.8522 117.014 26.9555L116.684 27.3319Z"
                        fill="url(#paint0_linear_22_1603)"/>
                    <defs>
                        <linearGradient id="paint0_linear_22_1603" x1="1" y1="55.7686" x2="103.812" y2="124.791"
                                        gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8BEFD3" offset="0"/>
                            <stop offset="1" stop-color="#377F7E"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="swiper results">
            <div class="swiper-wrapper">
                @foreach($result as $item)
                    <div class="swiper-slide">
                        <div class="result-card">
                            <div class="result-card__image result-card__image--first">
                                <img src="{{ $item->getBeforeUrl() }}" alt="">
                            </div>
                            <div class="result-card__image result-card__image--second">
                                <img src="{{ $item->getAfterUrl() }}" alt="">
                            </div>
                            <div class="result-card__trigger">
                                <button type="button" class="result-card__trigger-btn">
                                    <svg width="78" height="92" viewBox="0 0 78 92"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M39.0002 0.404755L77.1219 23.062V68.3765L39.0002 91.0338L0.878418 68.3765V23.062L39.0002 0.404755Z"
                                            fill="black"/>
                                        <path d="M26.8939 34.6425L15.3855 46.151L26.8939 57.6594" stroke="currentColor"
                                              stroke-width="2.87711"/>
                                        <path d="M51.3495 34.6425L62.8579 46.151L51.3495 57.6594" stroke="currentColor"
                                              stroke-width="2.87711"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="map-blur">
    <div class="map-blur-inner">
        <img src="/assets/img/map-blur.png" alt="" class="map-blur-img">
    </div>
    <section class="advantages-section" id="advantages">
        <div class="container">
            <div class="advantages-list">
                <div class="advantages-col">
                    <div class="advantages-card">
                        <div class="advantages-card__count">
                            <span class="countup" data-to="5">5</span>+ ЛЕТ
                        </div>
                        <div class="advantages-card__description">
                            В сфере автомойки <br/>и детейлинга
                        </div>
                    </div>
                    <div class="advantages-card">
                        <div class="advantages-card__count">
                            <span class="countup" data-to="10000">10 000</span>
                        </div>
                        <div class="advantages-card__description">
                            Машин <br/>обслужено
                        </div>
                    </div>
                </div>
                <div class="advantages-col">
                    <div class="advantages-card">
                        <div class="advantages-card__count">
                            <span class="countup" data-to="1000">1000</span>
                        </div>
                        <div class="advantages-card__description">
                            Довольных клиентов <br/>в 3 точках Липецка
                        </div>
                    </div>
                    <div class="advantages-card">
                        <div class="advantages-card__count">
                            <span class="countup" data-from="99" data-to="30">30</span> МИН
                        </div>
                        <div class="advantages-card__description">
                            Среднее время на обслуживание <br/>одного автомобиля
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <h3 class="section-heading">3 точки в липецке</h3>
            <div class="map">
                <div class="map-layout">
                    <img src="/assets/img/map.svg" alt="" class="map-img">
                    <div class="map-dots">
                        @foreach($dots as $dot)
                            <a href="{{ $dot['link'] }}"
                               class="map-dot{{ ($dot['right'] ?? false)?' map-dot--right':'' }}"
                               style="{{ $dot['position'] }}">
                                {!! $dot['text'] !!}
                            </a>
                        @endforeach
                    </div>
                    <div class="map-dots-mobile">
                        @foreach($dots as $dot)
                            <a href="{{ $dot['link'] }}"
                               class="map-dot{{ ($dot['right'] ?? false)?' map-dot--right':'' }}"
                               style="{{ $dot['position'] }}"></a>
                        @endforeach
                    </div>
                </div>
                <div class="map-list">
                    @foreach($dots as $dot)
                        <a href="{{ $dot['link'] }}">
                            {{ $dot['text'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="gallery">
        <div class="container">
            <h3 class="section-heading">Галерея работ</h3>
            <div class="gallery">
                @foreach($gallery as $image)
                    <a href="{{ $image->getUrl() }}" data-fancybox="gallery">
                        <img src="{{ $image->getUrl() }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>

<section id="reviews" class="slider-wrapper">
    <div class="container">
        <div class="reviews-heading">
            <h3 class="section-heading">Отзывы</h3>
            <div class="reviews-heading__desktop">
                <a href="#">
                    <img src="/assets/img/2gis.png" alt="">
                    <span>Перейти к отзывам</span>
                </a>
            </div>
            <div class="reviews-heading__mobile">
                <div class="heading__buttons">
                    <button class="heading__button heading__button--prev">
                        <svg width="36" height="36" viewBox="0 0 36 36">
                            <path d="M19 2L3 18L19 34" stroke="currentColor" stroke-width="4"/>
                        </svg>
                    </button>
                    <button class="heading__button heading__button--next">
                        <svg width="36" height="36" viewBox="0 0 36 36">
                            <path d="M17 2L33 18L17 34" stroke="currentColor" stroke-width="4"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="reviews-slider-wrapper">
        <div class="reviews-space reviews-space--left"></div>
        <div class="container">
            <div class="reviews-slider swiper">
                <div class="swiper-wrapper">
                    @foreach($reviews as $review)
                        <div class="swiper-slide">
                            <x-review-card :review="$review"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="reviews-space reviews-space--right"></div>
    </div>
</section>

<section id="register" class="register-section">
    <div class="container">
        <div class="register-wrapper">
            <div class="register-image" id="register-parallax">
                <div class="register-image__main">
                    <div class="register-image-parallax">
                        <img src="/assets/img/register-image.png" alt="" data-depth="0.2">
                    </div>
                </div>
                <div class="register-image__big">
                    <div class="register-image-parallax">
                        <svg width="150" height="173" viewBox="0 0 150 173" data-depth="0.05">
                            <path d="M75 0L150 43.25V129.75L75 173L0 129.75V43.25L75 0Z"
                                  fill="url(#paint0_linear_22_2134)"/>
                            <defs>
                                <linearGradient id="paint0_linear_22_2134" x1="1.98567e-06" y1="67.1983" x2="125.062"
                                                y2="149.314" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#8BEFD3"/>
                                    <stop offset="1" stop-color="#377F7E"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>

                <div class="register-image__small">
                    <div class="register-image-parallax">
                        <svg width="54" height="62" viewBox="0 0 110 127" data-depth="0.1">
                            <path d="M55 0L110 31.75V95.25L55 127L0 95.25V31.75L55 0Z"
                                  fill="url(#paint0_linear_21_1425)"/>
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
            <form action="" class="register-form">
                <h3 class="section-heading"><span>Качественная мойка</span><br /> по доступной цене</h3>
                <label class="form-input">
                    <span>Имя</span>
                    <input type="text" name="name">
                </label>
                <label class="form-input">
                    <span>Номер</span>
                    <input type="tel" name="phone">
                </label>

                <button class="btn">Записаться на мойку</button>

                <label class="form-checkbox">
                    <input type="checkbox">
                    <span class="form-checkbox__check">
                        <svg width="1em" height="1em" x="0" y="0" viewBox="0 0 511.985 511.985"><path d="M500.088 83.681c-15.841-15.862-41.564-15.852-57.426 0L184.205 342.148 69.332 227.276c-15.862-15.862-41.574-15.862-57.436 0-15.862 15.862-15.862 41.574 0 57.436l143.585 143.585c7.926 7.926 18.319 11.899 28.713 11.899 10.394 0 20.797-3.963 28.723-11.899l287.171-287.181c15.862-15.851 15.862-41.574 0-57.435z" fill="currentColor"></path></svg>
                    </span>
                    <div class="form-checkbox__text">Согласен на <a href="#">обработку персональных данных</a> и
                        <a href="#">политику конфиденциальности</a>
                    </div>
                </label>
            </form>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-info">
                <a href="#top" class="footer-logo"><img src="/assets/img/logo.svg" alt=""></a>
                <ul class="footer-menu">
                    <li><a href="#service">Услуги</a></li>
                    <li><a href="#results">До/после</a></li>
                    <li><a href="#advantages">Преимущества</a></li>
                    <li><a href="#gallery">Галерея работ</a></li>
                    <li><a href="#reviews">Отзывы</a></li>
                </ul>
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
                </span>
                </div>
                <a href="#" class="footer-politics">Политика конфиденциальности</a>
                <div class="copyright">©AQUABOOM, {{ date('Y') }}</div>
            </div>
            <div class="footer-map">
                <div id="map" style="width: 100%"></div>
            </div>
        </div>
    </div>
</footer>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

@vite(['resources/js/app.ts'])
</body>
</html>
