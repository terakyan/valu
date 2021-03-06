@extends('layouts.frontend')
@section('title')
    <title>Экспресс-тесты для домашних животных | Valu.am</title>
    <meta name="description" content="Качественные и недорогие экспресс-тесты для домашних животных. ☝️Правильное лечение может быть проведено при точной диагностике. ☝️">
@stop
@section('content')
    <div class="title-img-container">
        <div>
            <h3 class="subtitle-font">Изготовление и продажа</h2>
                <h1 class="title-font">Экспресс-Тестов</h1>
                <h4 class="subtitle_second-font">Правильное лечение начинается с точной диагностики</h3>
        </div>

        <div class="main-image">
            <img src="./img/Pets.png" alt="Dog And Cat">
        </div>
    </div>

    <div class="products-title-container">
        <h2 class="title_second-font">Наша Продукция</h2>

        <p class="normal-font">{!! @$settings['category_subtitle'] !!}</p>

        <ul class="products-nav">
            <li>
                <button class="category-button category-button_js normal-font red-button-font red-button active"
                        data-id="1">Собаки
                </button>
            </li>
            <li>
                <button class="category-button category-button_js normal-font red-button-font red-button" data-id="2">
                    Кошки
                </button>
            </li>
        </ul>
    </div>

    <div class="items-container items-container_js active" data-id="1">
        @foreach($dogs as $dog)
        <div class="item">
            <img src="{!! \App\Services\ImgService::renderImg('products',$dog->image) !!}" alt="Item" class="item-img">
            <span class="item-font">{!! $dog->name !!}</span>
        </div>
        @endforeach
    </div>

    <div class="items-container items-container_js" data-id="2">
        @foreach($cats as $cat)
            <div class="item">
                <img src="{!! \App\Services\ImgService::renderImg('products',$cat->image) !!}" alt="Item" class="item-img">
                <span class="item-font">{!! $cat->name !!}</span>
            </div>
        @endforeach
    </div>

    <div class="up up_js hide">
        <svg width="60" height="50" viewBox="0 0 60 50" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4_206)">
                <path
                    d="M14 38.2002C12.7 48.6002 20.2 50.0002 30 50.0002C39.8 50.0002 47.3 48.6002 46 38.2002C44.9 29.1002 37.6 19.2002 30 19.2002C22.4 19.1002 15.1 29.1002 14 38.2002Z"
                    fill="#125E7E"/>
                <path
                    d="M18.2 0.200121C13.8 1.20012 11.2 6.00012 12.3 11.0001C13.4 15.9001 17.9 19.1001 22.2 18.1001C26.6 17.1001 29.2 12.3001 28.1 7.30012C27 2.40012 22.6 -0.799879 18.2 0.200121Z"
                    fill="#125E7E"/>
                <path
                    d="M0.999997 27.1001C3 31.1001 7.5 32.8001 11.1 30.9001C14.6 29.0001 15.8 24.3001 13.8 20.4001C11.8 16.4001 7.3 14.7001 3.7 16.6001C0.0999973 18.4001 -1 23.1001 0.999997 27.1001Z"
                    fill="#125E7E"/>
                <path
                    d="M47.632 10.8106C48.6604 5.83474 45.9427 1.06702 41.5618 0.161578C37.1809 -0.74386 32.7958 2.55586 31.7674 7.5317C30.739 12.5075 33.4567 17.2753 37.8376 18.1807C42.2185 19.0861 46.6036 15.7864 47.632 10.8106Z"
                    fill="#125E7E"/>
                <path
                    d="M59 27.1C61 23.1 59.9 18.4 56.3 16.6C52.8 14.7 48.3 16.5 46.2 20.4C44.2 24.4 45.3 29.1 48.9 30.9C52.5 32.8 57 31.1 59 27.1Z"
                    fill="#125E7E"/>
                <path d="M23.6 40.1L30 33.8L36.4 40.1L38.7 37.7L32.4 31.4L30 29L27.6 31.4L21.3 37.7L23.6 40.1Z"
                      fill="white"/>
            </g>
            <defs>
                <clipPath id="clip0_4_206">
                    <rect width="60" height="50" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </div>
@stop
