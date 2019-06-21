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
</head>

<body>
<div id="wrapper">
    <header id="header">
        <div class="container-sm">
            @php
            $active_class = array();
            if(isset($active_menu_item) && !empty($active_menu_item)){

            }
            @endphp
            <ul class="header-menu">
                <li>
                    <a href="#">
                        <div class="img-box">
                            <i class="icon-note"></i>
                        </div>
                        <span class="text">Publish Now</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/order-status')}}">
                        <div class="img-box">
                            <i class="icon-status"></i>
                        </div>
                        <span class="text">Order Status</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-box">
                            <i class="icon-search"></i>
                        </div>
                        <span class="text">Free Lookup</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <div class="img-box">
                            <i class="icon-download"></i>
                        </div>
                        <span class="text">Document Retrieval</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img-box">
                            <i class="icon-calculate-2"></i>
                        </div>
                        <span class="text">120 Days Calcutlator</span>
                    </a>
                </li>
            </ul>
            <a href="#" class="chat-holder">
                <span class="text"><i class="icon-messenger"></i>Live Chat</span>
            </a>
            <a href="#" class="menu-opener">
                <span>Menu</span>
            </a>
        </div>
    </header>