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
                <form method="post" enctype="multipart/form-data" class="service-steps-form">
                    @csrf
                    <ul class="tab-body">
                        <li class="tab-item active" id="tab-1">
                            {{--<div class="entity-section">--}}
                                @yield('content')
                            {{--</div>--}}
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
                                    <div class="card-box">
                                        <span class="title text-green">Your total is:</span>
                                        <ul class="card-price-list">
                                            <li>
                                                <span class="name">Publishing</span>
                                                <span class="price">$280</span>
                                            </li>
                                            <li>
                                                <span class="name">Application of Authority Retrieval:</span>
                                                <span class="price">$10</span>
                                            </li>
                                        </ul>
                                        <span class="total text-green">Total: $480.00</span>
                                    </div>
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
                                                        <select>
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="">Select2</option>
                                                            <option value="">Select3</option>
                                                            <option value="">Select4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="column-8">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Company Name <span class="extra">(optional)</span><small>When applying on behalf of a company, other than the LLC (i.e. law firm, or accounting firm, etc.)</small></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-row">
                                                <div class="column-8">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="column-2">
                                                    <div class="form-group">
                                                        <label>Suffix</label>
                                                        <select>
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="">Select2</option>
                                                            <option value="">Select3</option>
                                                            <option value="">Select4</option>
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
                                                            <input type="tel">
                                                        </div>
                                                    </div>
                                                    <div class="column-2">
                                                        <div class="form-group">
                                                            <label>Ext.</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="add">Add a phone number <span class="plus"></span></a>
                                            </div>
                                            <div class="form-group">
                                                <label>Fax <span class="extra">(optional)</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="add-row">
                                                <div class="repeat">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email">
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
                                    <div class="card-box">
                                        <span class="title text-green">Your total is:</span>
                                        <ul class="card-price-list">
                                            <li>
                                                <span class="name">Publishing</span>
                                                <span class="price">$280</span>
                                            </li>
                                            <li>
                                                <span class="name">Application of Authority Retrieval:</span>
                                                <span class="price">$10</span>
                                            </li>
                                        </ul>
                                        <span class="total text-green">Total: $480.00</span>
                                    </div>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Cardholder’s Name</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Expiration Date</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Card Number</label>
                                                <input type="text">
                                            </div>
                                            <div class="form-row">
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>CVV</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-group-title">Billing Address</h4>
                                    <ul class="radio-list italic under-billing">
                                        <li>
                                            <input type="checkbox" id="comp-adddress" name="comp-adddress">
                                            <label for="comp-adddress">Please use company address provided earlier </label>
                                        </li>
                                    </ul>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>Address2</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="column-5">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="column-5">
                                            <div class="form-row">
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select>
                                                            <option value="" selected disabled>Please Select</option>
                                                            <option value="">Select2</option>
                                                            <option value="">Select3</option>
                                                            <option value="">Select4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="column-5">
                                                    <div class="form-group">
                                                        <label>Zip</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promocode-holder">
                                        <h3>Promo Code</h3>
                                        <div class="promocode-form">
                                            <label>Do you have a promo code? Please enter</label>
                                            <div class="form-row">
                                                <div class="column-7">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Enter promo code">
                                                    </div>
                                                </div>
                                                <div class="column-3">
                                                    <div class="form-group">
                                                        <input type="submit" value="Apply">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="discount">Accountant  <span class="text-red">- 23.98</span></span>
                                        <p>Applied to order</p>
                                    </div>
                                    <div class="total-block">
                                        <div class="total-price">
                                            <span class="h4">Subtotal: $380</span>
                                            <span class="h4 text-red">-23.98</span>
                                            <h4>Subtotal: $380</h4>
                                        </div>
                                        <div class="info-box">
                                            <h5>Summary of service process:</h5>
                                            <p>I understand that the process takes *about* 12-14 weeks to complete and I agree that there are no refunds once the process has started. (Your business is NOT affected during the process -- you do NOT need to wait for the process to finish to conduct business). I also understand and agree that I will receive an electronic copy of the "filing receipt" issued by the state, which is proof of completion of the process.</p>
                                        </div>
                                        <ul class="radio-list">
                                            <li>
                                                <input type="checkbox" id="authorize" name="authorize">
                                                <label for="authorize">I hereby authorize LegalBoxPublishing to charge my card in the amount of $486.33</label>
                                            </li>
                                        </ul>
                                    </div>
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
