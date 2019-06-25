@include('template-parts.header')

<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image04.jpg);"></div>
            @if(0)
                {{--TODO DocRetrival service--}}
                <div class="container">
                    <div class="title-holder line-decor">
                        <h2>We will retrieve your publishing documents for you</h2>
                        <p>Speedy Turnaround. Hassle Free</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="tab-section">
        <div class="container">
            <div class="tab">
                <ul class="tab-head">
                    <li data-step="1"><a href="tab-1" class="active">1. Entity Info<span class="arrow"></span></a></li>
                    <li data-step="2"><a href="tab-2">2. Your Info<span class="arrow"></a></li>
                    <li data-step="3"><a href="tab-3">3. Checkout<span class="arrow"></a></li>
                </ul>
                <form method="post" enctype="multipart/form-data" class="service-steps-form" action="{{ $save_action }}">
                    @csrf
                    <ul class="tab-body">
                        <li class="tab-item active" id="tab-1">
                            @yield('content')
                        </li>
                        <li class="tab-item" id="tab-2">
                            <div class="payment-section">
                                <div class="started-holder" style="background-image: url(/images/image19.jpg);">
                                    <div class="info-block">
                                        <div class="title-box">
                                            <h2>Payment</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-form">
                                    @if(!$is_not_sure)
                                    <div class="card-box">
                                        <span class="title text-green">Your total is:</span>
                                        <ul class="card-price-list">
                                            @if(isset($base_price_name))
                                                <li data-name="{{ $base_price_name }}" data-price="{{ $price }}"><span class="name">{{ $base_price_name }}</span><span class="price">${{ $price }}</span></li>
                                            @endif
                                        </ul>
                                        <span class="total text-green">Total: $<span class="total-box-price">{{ $price }}</span></span>
                                    </div>
                                    @else
                                    <div class="card-box">
                                        <span class="title text-green">Total to be charged:</span>
                                        <div class="info">
                                            <p>We will look up the county you listed at  formation and notify you of your fee.</p>
                                        </div>
                                        <span class="total text-green">Total: Pending</span>
                                    </div>
                                    @endif
                                    <div class="title-holder">
                                        <h3 class="border-title">Your Information </h3>
                                        <p>For internal use only, will not be used for public records</p>
                                    </div>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-row">
                                                <div class="column-2">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select name="title">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="Mr.">Mr.
                                                            </option>
                                                            <option value="Mrs.">Mrs.
                                                            </option>
                                                            <option value="Ms.">Ms.
                                                            </option>
                                                            <option value="Dr.">Dr.
                                                            </option>
                                                            <option value="Hon.">Hon.
                                                            </option>
                                                            <option value="Rev">Rev
                                                            </option>
                                                            <option value="Prof.">
                                                                Prof.
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="column-8">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Name <span class="extra">(optional)</span><small>When applying on behalf of a company, other than the LLC (i.e. law firm, or accounting firm, etc.)</small></label>
                                                <input type="text" name="company_name">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-row">
                                                <div class="column-8">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name">
                                                    </div>
                                                </div>
                                                <div class="column-2">
                                                    <div class="form-group">
                                                        <label>Suffix</label>
                                                        <select name="suffix">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="MD">MD
                                                            </option>
                                                            <option value="CPA">CPA
                                                            </option>
                                                            <option value="ESQ">ESQ
                                                            </option>
                                                            <option value="Jr.">Jr.
                                                            </option>
                                                            <option value="Sr.">Sr.
                                                            </option>
                                                            <option value="III">III
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="add-row">
                                                <div class="form-row repeat">
                                                    <div class="column-8">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="tel" name="contact_phone[]">
                                                        </div>
                                                    </div>
                                                    <div class="column-2">
                                                        <div class="form-group">
                                                            <label>Ext.</label>
                                                            <input type="text" name="contact_phone_Ext[]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="add">Add a phone number <span class="plus"></span></a>
                                            </div>
                                            <div class="form-group">
                                                <label>Fax <span class="extra">(optional)</span></label>
                                                <input type="text" name="contact_fax">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="add-row">
                                                <div class="repeat">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="contact_email[]">
                                                    </div>
                                                </div>
                                                <a href="#" class="add">Add an email<span class="plus"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-holder offset">
                                        <button type="submit" class="btn btn-light border">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="tab-item" id="tab-3">
                            <div class="payment-section">
                                <div class="started-holder" style="background-image: url(/images/image19.jpg);">
                                    <div class="info-block">
                                        <div class="title-box">
                                            <h2>Payment</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-form">
                                    <div class="title-holder">
                                        <h3 class="border-title">Payment info</h3>
                                    </div>
                                    @if(!$is_not_sure)
                                        <div class="card-box">
                                            <span class="title text-green">Your total is:</span>
                                            <ul class="card-price-list">
                                                @if(isset($base_price_name))
                                                    <li data-name="{{ $base_price_name }}" data-price="{{ $price }}"><span class="name">{{ $base_price_name }}</span><span class="price">${{ $price }}</span></li>
                                                @endif
                                            </ul>
                                            <span class="total text-green">Total: $<span class="total-box-price">{{ $price }}</span></span>
                                        </div>
                                    @else
                                        <div class="card-box">
                                            <span class="title text-green">Total to be charged:</span>
                                            <div class="info">
                                                <p>We will look up the county you listed at  formation and notify you of your fee.  Please enter your card below. We will <span class="text-green">not</span> charge it until we have your approval.</p>
                                            </div>
                                            <span class="total text-green">Total: Pending</span>
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Cardholder’s Name</label>
                                                <input type="text" name="cardholder_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Expiration Date</label>
                                                <input type="text" name="expiration_date">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Card Number</label>
                                                <input type="text" name="curd_number">
                                            </div>
                                            <div class="form-row">
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>CVV</label>
                                                        <input type="text" name="cvv_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-group-title">Billing Address</h4>
                                    @if(!$is_not_sure && 0)
                                    <ul class="radio-list italic under-billing">
                                        <li>
                                            <input type="checkbox" id="comp-adddress" name="comp-adddress">
                                            <label for="comp-adddress">Please use company address provided earlier </label>
                                        </li>
                                    </ul>
                                    @endif
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="billing_address">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Address2</label>
                                                <input type="text" name="billing_address_second">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="billing_city">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-row">
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select name="billing_state">
                                                            <option value="" selected disabled>Please Select</option>
                                                            @foreach($countyList as $state)
                                                                <option value="{{ $state['name'] }}">{{ $state['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>Zip</label>
                                                        <input type="text" name="billing_zip">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$is_not_sure)
                                    <div class="promocode-holder">
                                        <h3>Promo Code</h3>
                                        <div class="promocode-form">
                                            <label>Do you have a promo code? Please enter</label>
                                            <div class="form-row">
                                                <div class="column-7">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Enter promo code" name="promo_code">
                                                    </div>
                                                </div>
                                                <div class="column-3">
                                                    <div class="form-group">
                                                        <input type="submit" value="Apply" class="apply_promo_code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--TODO Show promo code name and price minus how match--}}
                                        <span class="discount show-if-promo-used" style="display: none"><span class="promo-name"></span> <span class="text-red"></span></span>
                                        <p class="show-if-promo-used" style="display: none">Applied to order</p>
                                    </div>
                                    @endif
                                    <div class="total-block">
                                        <div class="total-price">
                                            {{--TODO Show price before promo used--}}
                                            <span class="h4 show-if-promo-used" style="display: none">Subtotal: $<span class="prev-total-box-price">0</span></span>
                                            {{--TODO Show how match promo minus--}}
                                            <span class="h4 text-red show-if-promo-used" style="display: none;"></span>

                                            {{--TODO Show price after promo used--}}
                                            <h4>Subtotal: $<span class="total-box-price">{{ $price }}</span></h4>
                                        </div>
                                        <div class="info-box">
                                            <h5>Summary of service process:</h5>
                                            <p>I understand that the process takes *about* 12-14 weeks to complete and I agree that there are no refunds once the process has started. (Your business is NOT affected during the process -- you do NOT need to wait for the process to finish to conduct business). I also understand and agree that I will receive an electronic copy of the "filing receipt" issued by the state, which is proof of completion of the process.</p>
                                        </div>

                                        <ul class="radio-list">
                                            <li>
                                                <input type="checkbox" id="authorize" name="authorize" value="authorize-confirm">
                                                <label for="authorize">I hereby authorize LegalBoxPublishing to charge my card in the amount of $<span class="total-box-price">{{ $price }}</span></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="total_price" value="{{ $price }}">
                                    <div class="captcha-box"></div>
                                    <div class="btn-holder">
                                        <button type="submit" class="btn btn-light border">Process order</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')
