@extends('layouts.service')
@section('content')
    <div class="entity-section">
        <div class="decor-panel best-price"></div>
        <div class="tab-intro">
            <div class="dark-box">
                <div class="cont">
                    <h3 class="title">The All Inclusive Rate for:</h3>
                    <h3 class="subtitle">{{ $entity_name }} {{ $entity_ending }} <i>in</i> {{ $county }} County:</h3>
                    <a href="#" class="btn btn-light">${{ $price }}</a>
                </div>
            </div>
            <div class="green-box">
                <span class="item">
                    <strong class="light">$<span class="total-box-price">{{ $price }}</span></strong> is a super competitive rate. It also qualifies for our:
                </span>
                <br/>
                <span class="item item-large light">
                    <strong>10 Day</strong> <b>Lowest Price Guarantee</b>
                </span>
                <span class="tooltip price-tooltip">
                    <a href="#" class="tool-opener js-tool-opener">i</a>
                    <div class="tool-popup">
                        <a href="#" class="close"></a>
                        <h3>Our Meet or Beat Policy</h3>
                        <ul class="popup-list">
                            <li>LegalBox Publishing will <strong>‘Meet or Beat’</strong> any price you get from other service companies.</li>
                            <li>We will <strong>‘Meet or Beat’</strong> the price, regardless of the price gap.</li>
                            <li>We will also <strong>‘Meet or Beat’</strong> an exclusive promotional rate.</li>
                            <li>Please supply a written proposal with that price offer. It can be sent via E-mail, mail, or fax. You can also provide a link to that company’s online prage or published ad showcasing that price offer.</li>
                            <li>Once we matched a rate, the order is final, no further matching or discounts can be applied.</li>
                            <li>Prior to requesting a <strong>‘Meet or Beat’</strong> price match, please make sure that the rate includes the full NY LLC Publishing compliance service. Please note that our price is for the all inclusive process, from A to Z. Nevertheless, the extraordinary service and professionalism you will experience with LegalBox Publishing is certainly unbeatable</li>
                        </ul>
                        <h3>10 Day Guarantee</h3>
                        <ul class="popup-list">
                            <li>Should you receive a lower quote within 10 days after placing your order with LegalBox Publishing, rest assured, we will <strong>‘Meet or Beat’</strong> that price, while refunding you the difference.</li>
                            <li>If we are unable to <strong>‘Meet or Beat’</strong> that rate, we will refund you 100% of what you paid us, thus terminating the process.</li>
                        </ul>
                        <div class="btn-box">
                            <a href="{{ route('price-match.index') }}"
                               class="btn btn-large">Price match request</a>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        <div class="tab-cont">
            <div class="box">
                <h5 class="box-subtitle"><b>Is this the</b> <em>Entity Name</em> <b>that has been originally filed with
                        NY state?</b></h5>
                <ul class="radio-list radio-name">
                    <li>
                        <input type="radio" name="entity-name-hide" id="yes-name" value="yes">
                        <label for="yes-name">Yes</label>
                    </li>
                    <li>
                        <input type="radio" name="entity-name-hide" id="no-name" value="no">
                        <label for="no-name">No - The original name has been changed</label>
                    </li>
                </ul>
                <h5 class="box-subtitle bigger entity-name-show-hide">Please provide the original entity name
                    <small>(the same exact way it has originally been filed with DOS):</small>
                </h5>
                <div class="row-form entity-name-show-hide">
                    <div class="column-6">
                        <div class="form-group">
                            <label>Entity Name</label>
                            <input type="text" name="entity_name" value="{{ $entity_name }}">
                        </div>
                    </div>
                    <div class="column-6">
                        <div class="form-group">
                            <label>Entity Ending</label>
                            <select class="jcf-hidden" name="entity_ending">
                                <option value="" selected="" disabled="">Please select your entity ending</option>
                                @foreach($entityEndings as $entityEnding)
                                    <option value="{{ $entityEnding }}" @if($entity_ending == $entityEnding)selected @endif>{{ $entityEnding }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <h4 class="box-title">Domestic
                    <small>or</small>
                    Foreign Entity
                </h4>
                <h5 class="box-subtitle">Please indicate whether this entity has initially been filed in a different
                    state and later qualified to do business in the State of NY: </h5>
                <ul class="radio-list state">
                    <li>
                        <input type="radio" name="is-domestic" id="yes-name2" value="yes" data-price_label="Publishing" data-price="{{$price}}">
                        <label for="yes-name2">This entity has been filed only in the state of NY</label>
                    </li>
                    <li>
                        <input type="radio" id="no-name2" name="is-domestic" value="no">
                        <label for="no-name2">
                            This entity has initially been filed in the state of:
                            <select class="jcf-hidden" name="foreign_county">
                                <option disabled selected>Select County</option>
                                @foreach($countyList as $county_item)
                                    <option value="{{ $county_item['name'] }}" data-price="{{ $county_item['price'] }}"  data-price_label="Publishing">{{ $county_item['name'] }}</option>
                                @endforeach
                            </select>
                            and later qualified to do business in the State of NY
                        </label>
                    </li>
                </ul>
                <div class="warning-box foreign-show">
                    <p>
                        <small>Your entity is considered a Foreign Entity, which is required by law to include in the
                            legal ad the additional foreign filing details.
                        </small>
                    </p>
                    <p><strong>Please note:</strong> There are no additional service fees from our company, however,
                        there are increased newspaper fees due to the additional foreign information included in the
                        legal notice.</p>
                </div>
                <div class="price-box foreign-show">
                    <p>
                        All Inclusive Publishing Rate for <em>‘Foreign Entity’</em>
                    </p>
                    <p><span class="foreign_company_name">{{ $entity_name }} {{ $entity_ending }}</span> in <span class="foreign_county_name">{{ $county }}</span> County:</p>
                    <span class="price">$<span class="total-box-price">{{ $price }}</span></span>
                </div>
                <div class="copy-box foreign-show">
                    <h4>We will need a copy of the Application for Authority, which you filed with NY State upon
                        qualification. </h4>
                    <ul class="radio-list">
                        <li>
                            <label>
                                <input type="radio" name="copy" value="I will upload a copy of the application of authority"  data-price_label="Application of Authority Retrieval" data-price="0">
                                I will upload a copy of the application of authority
                            </label>
                            <input type="file" name="application_copy">
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="copy" value="I will email a copy to expert@legalboxpublishing.com"  data-price_label="Application of Authority Retrieval" data-price="0">
                                I will email a copy to expert@legalboxpublishing.com
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="copy" data-price_label="Application of Authority Retrieval" data-price="10" value="Application of Authority Retrieval">
                                Please retrieve this document from NY State for an additional $10 fee.
                            </label>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="base_main_price" value="{{ $price }}">
                <input type="hidden" name="service_main_type" value="0">
                <input type="hidden" name="selected_county" value="{{ $county }}">
                <button type="submit" class="btn">Continue to Checkout</button>
            </div>
        </div>
    </div>
@endsection
