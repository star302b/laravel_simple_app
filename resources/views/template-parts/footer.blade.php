<footer id="footer">
    <div class="top-panel">
        <div class="container">
            <a href="{{URL::to('/')}}" class="logo">
                <img src="/images/logo-green.svg" alt="logo">
            </a>
            <div class="nav-box">
                <nav class="nav-top">
                    <ul>
                        <li><a href="">Publish Now</a></li>
                        <li><a href="{{URL::to('/order-status')}}">Order Status</a></li>
                        <li><a href="{{ route('free-lookup.index') }}">Publishing Lookup</a></li>
                        <li><a href="{{URL::to('/doc-retrieval')}}">Publishing Document Retrieval</a></li>
                        <li><a href="">120 Day Calculator</a></li>
                    </ul>
                </nav>
                <form action="">
                    <div class="subscribe-row">
                        <input type="text" placeholder="Enter your email for exciting publishing news and updtes">
                        <input type="submit" value="Enter">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bottom-panel">
        <div class="container">
            <p class="copy">Copyright 2019 All Rights Reserved LegalBoxPublishing.com</p>
            <nav class="nav-bottom">
                <ul>
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="{{URL::to('/order-status')}}">Order Status</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
</div>

<script src="//unpkg.com/jquery@3.2.1/dist/jquery.min.js"></script>
<script src="{{ asset('js/jcf.js') }}"></script>
<script src="{{ asset('js/jcf.checkbox.js') }}"></script>
<script src="{{ asset('js/jcf.radio.js') }}"></script>
<script src="{{ asset('js/jcf.select.js') }}"></script>
<script src="{{ asset('js/jcf.file.js') }}"></script>
<!-- build:js -->
<script src="{{ asset('js/main.min.js') }}"></script>
<!-- endbuild -->
<script>
    jQuery(document).ready(function($){
        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function add_price(selector){
            var name = '';
            var price = null;

            if($(selector).data('price_label')){
                name = $(selector).data('price_label');
            }
            console.log($(selector).data('price'))
            if($(selector).data('price') || $(selector).data('price') === 0){
                price = $(selector).data('price');
            }

            $('.card-box .card-price-list').append('<li data-name="'+name+'" data-price="'+price+'"><span class="name">'+name+'</span><span class="price">$'+price+'</span></li>');


            update_total_price();
        }

        function remove_price(selector){
            var name = '';
            if($(selector).data('price_label')){
                name = $(selector).data('price_label');
                $('.card-box .card-price-list li[data-name="'+name+'"]').remove();
            }
            update_total_price();
        }

        function update_total_price(){
            var total_price = 0;

            var all_item_in_list = $('.card-box .card-price-list').eq(0).find('li');

            for(var i = 0 ; i < all_item_in_list.length; i++){
                var price_item = $($('.card-box .card-price-list').eq(0).find('li')[i]).attr('data-price');
                total_price += price_item * 1;
            }

            $('.total-box-price').text(total_price);
            $('input[name="total_price"]').val(total_price)
        }

        $('input[name="entity-name-hide"]').on('change',function () {
            if($(this).val() == 'no') {
                $('.entity-name-show-hide').show();
            }else{
                $('.entity-name-show-hide').hide();
            }
        })

        $('input[name="documents[]"]').on('change',function () {
            if($(this).prop('checked')){
                add_price(this);
            }else{
                remove_price(this);
            }
        })
        $('.service-steps-form').on('submit',function (event) {
            event.stopPropagation();
            if($('.tab .tab-head').find('li a.active').attr('href') != 'tab-3'){
                if($('.tab .tab-head').find('li a.active').attr('href') == 'tab-1'){
                    $('.tab .tab-head').find('li a[href="tab-2"]').click();
                }else if($('.tab .tab-head').find('li a.active').attr('href') == 'tab-2'){
                    $('.tab .tab-head').find('li a[href="tab-3"]').click();
                }
                event.preventDefault();
            }else{
                console.log('send form');
                return false;
            }
        });
        $('.document-section input[name="approximage_month"],.document-section input[name="approximage_day"],.document-section input[name="approximage_year"]').on('change',function(){
            if($('.document-section input[name="approximage_month"]').val() && $('.document-section input[name="approximage_day"]').val() && $('.document-section input[name="approximage_year"]').val())
            {
                $('.document-section input[name="approximage_date"]').val($('.document-section input[name="approximage_year"]').val() + '/' + $('.document-section input[name="approximage_month"]').val()+ '/' +$('.document-section input[name="approximage_day"]').val());
                var d = new Date($('.document-section input[name="approximage_date"]').val());
                var current_time = new Date();

                current_time.setMonth(current_time.getMonth() - 3);

                if(d < current_time){
                    $('.less-thithy-month').hide();
                    $('.more-thithy-month').show();
                }else{
                    $('.less-thithy-month').show();
                    $('.more-thithy-month').hide();
                }
            }
        });

        $('.order-status-main').on('submit', function (event) {
            event.stopPropagation();
            var datastring = $(".order-status-main").serialize();
            if ($(this).find('[name="entity-name"]').val() &&
                $(this).find('[name="name"]').val() &&
                validateEmail($(this).find('[name="order-email"]').val())) {
                $.ajax({
                    type: "POST",
                    url: "/order-status",
                    data: {
                        "form_data": datastring,
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    success: function (data) {
                        $('.call-form-request label.error').remove();
                        if (data['error'].indexOf('captcha') >= 0) {
                            $('.captcha-holder .g-recaptcha').after('<label class="error">This field is required.</label>');
                        }
                        if (data['error'].length == 0) {
                            $('.order-status-form').find('.user-name-main').text($('input[name="first-name"]').val());
                            $('.order-status-form').addClass('thankyou');
                            $("html, body").animate({scrollTop: 0}, "slow");
                            // setTimeout(function () {
                            //     $('.order-status-form input,.order-status-form select,.order-status-form textarea').val('');
                            //     document.querySelector('.order-status-form').classList.remove('thankyou');
                            //     location.reload();
                            // },10000)
                        }
                        //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                        // do what ever you want with the server response
                    },
                    error: function () {
                        // alert('error handling here');
                    }
                });
            }
            event.preventDefault()
        });

    });
    @php $routeName = \Illuminate\Support\Facades\Route::currentRouteName() @endphp

    @if( $routeName == 'order-status.get')

    function recaptchaCallback() {
        var btnSubmit = document.getElementById("btnSubmit");

        if ( btnSubmit.classList.contains("hidden") ) {
            btnSubmit.classList.remove("hidden");
            btnSubmit.classList.add("show");
        }
    }

    @endif
</script>
</body>

</html>