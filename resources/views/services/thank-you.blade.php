@include('template-parts.header')

<main id="main">
    <section class="intro-section">
@include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image04.jpg);"></div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder" style="background-image: url(/images/image05.jpg);">
                    <div class="info-block">
                        <div class="title-box">
                            <h2>Thank You!</h2>
                        </div>
                    </div>
                </div>
                <div class="thanks-section form-section">
                    <div class="thanks-header">
                        <h4>Thank You! Your order has been received!</h4>
                        <i class="icon-arrow-down"></i>
                    </div>
                    <div class="form-body">
                        <div class="form-column">
                            <div class="message-box">
                                <p><span class="title">Dear {{ $title ? $title : '' }} {{ $first_name }} {{ $last_name }}</span></p>
                                <p>Thank your for ordering with us and giving us the opportunity to serve you. Your order  for <br><a href="#">{{ $entity_name }} {{$entity_ending}}</a> has been received<br>and will provide the documents expeditiously.</p>
                                <p>Your order reference is: <a href="#">{{ $entity_name }} {{$entity_ending}}.</a></p>
                                <p>A confirmation of your order has been sent<br>to your email.</p>
                            </div>
                            <p>Should you have any additional concerns<br>feel free to email <a href="mailto:service@llbpublishingofny.com">service@llbpublishingofny.com</a> or call <a href="tel:5163360900">516.336.0900</a>.</p>
                        </div>
                        <div class="additional-column">
                            <div class="img-holder">
                                <img src="/images/image18.jpg" alt="image description">
                            </div>
                            <div class="info-box">
                                <p>We implement our expertise into every LLC to get you the lowest  cost available anywhere!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')
