<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LLC publishing</title>
    <meta name="description" content="The lowest prices for your full LLC publishing compliance!">

    <!-- build:css -->
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- endbuild -->
    <style>
        .foreign-show,
        .show-when-date-done{
            display: none;
        }
    </style>
</head>
<body>
@php
$wrapper_class = '';
$routeName = \Illuminate\Support\Facades\Route::currentRouteName();
if($routeName == 'price-match.index'){
    $wrapper_class = 'priceMatch-page';
}
@endphp
<div id="wrapper"  class="{{$wrapper_class}}">
    <header id="header">
        <div class="container-sm">
            @php
            $active_class = array();
            $active_class['publish-now'] = '';
            $active_class['doc-retrieval'] = '';
            $active_class['order-status'] = '';
            $active_class['free-lookup'] = '';
            $active_class['120-days-calculator'] = '';

            if(isset($active_menu_item) && !empty($active_menu_item)){
                $active_class[$active_menu_item] = 'active';
            }
            @endphp
            <ul class="header-menu">
                <li class="{{$active_class['publish-now']}}">
                    <a href="{{ route('home-page') }}#publishing-start-form">
                        <div class="img-box">
                            <i class="icon-note"></i>
                        </div>
                        <span class="text">Publish Now</span>
                    </a>
                </li>
                <li class="{{$active_class['order-status']}}">
                    <a href="{{URL::to('/order-status')}}">
                        <div class="img-box">
                            <i class="icon-status"></i>
                        </div>
                        <span class="text">Order Status</span>
                    </a>
                </li>
                <li class="{{$active_class['free-lookup']}}">
                    <a href="{{ route('free-lookup.index') }}">
                        <div class="img-box">
                            <i class="icon-search"></i>
                        </div>
                        <span class="text">Free Lookup</span>
                    </a>
                </li>
                <li class="{{$active_class['doc-retrieval']}}">
                    <a href="{{URL::to('/doc-retrieval')}}">
                        <div class="img-box">
                            <i class="icon-download"></i>
                        </div>
                        <span class="text">Document Retrieval</span>
                    </a>
                </li>
                <li class="{{$active_class['120-days-calculator']}}">
                    <a href="{{ route('home-page') }}?open_calculator#popap-main-clculator">
                        <div class="img-box">
                            <i class="icon-calculate-2"></i>
                        </div>
                        <span class="text">120 Days Calcutlator</span>
                    </a>
                </li>
            </ul>
            <a  href="https://lc.chat/now/3724261/2" target="_top"
                target="popup"
                onclick="window.open('https://lc.chat/now/3724261/2','popup','width=600,height=600'); return false;" class="chat-holder">
                <span class="text"><i class="icon-messenger"></i>Live Chat</span>
            </a>
            <a href="#" class="menu-opener">
                <span>Menu</span>
            </a>
        </div>
    </header>