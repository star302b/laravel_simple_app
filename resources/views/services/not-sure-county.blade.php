@extends('layouts.service')
@section('content')
    <div class="entity-section">
        <div class="decor-panel best-price"></div>
        <div class="tab-intro">
            <div class="dark-box">
                <div class="cont">
                    <h3 class="title">The All Inclusive Rate for:</h3>
                    <h3 class="subtitle">{{ $entity_name }} {{ $entity_ending }} <i>in</i> ____________</h3>
                    <span class="btn btn-light">
                        <span class="count">
                            $0.00
                            <span class="tooltip price-tooltip">
                                <span class="tool-opener js-tool-opener">i</span>
                                <div class="tool-popup">
                                    <a href="#" class="close"></a>
                                    <p>Since you are not sure in which county you registered your LLC, we will look up the county for you and notify you the publidhing fee for that county. We will then process  your payment upon your confirmation</p>
                                </div>
                            </span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="tab-cont">
            <div class="box">
                <h5 class="box-subtitle"><b>Is this the</b> <em>Entity Name</em> <b>that has been originally filed with NY state?</b></h5>
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

                <h5 class="box-subtitle bigger entity-name-show-hide">Please provide the original entity name <small>(the same exact way it has originally been filed with DOS):</small></h5>
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
                            <select class="jcf-hidden"  name="entity_ending">
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
                <h4 class="box-title">Domestic <small>or</small> Foreign Entity</h4>
                <h5 class="box-subtitle">Please indicate whether this entity has initially been filed in a different state and later qualified to do business in the State of NY: </h5>
                <ul class="radio-list state">
                    <li>
                        <input type="radio" id="yes-name2" name="is-domestic" value="yes">
                        <label for="yes-name2">This entity has been filed only in the state of NY</label>
                    </li>
                    <li>
                        <input type="radio" id="no-name2" name="is-domestic" value="no">
                        <label for="no-name2">
                            This entity has initially been filed in the state of:
                            <select class="jcf-hidden">
                                <option disabled selected>Select County</option>
                                @foreach($countyList as $county_item)
                                <option value="{{ $county_item['name'] }}" data-price="0" data-price_label="Publishing">{{ $county_item['name'] }}</option>
                                @endforeach
                            </select>
                            and later qualified to do business in the State of NY
                        </label>
                    </li>
                </ul>
                <div class="warning-box foreign-show">
                    <p><small>Your entity is considered a Foreign Entity, which is required by law to include in the legal ad the additional foreign filing details.</small></p>
                    <p><strong>Please note:</strong> There are no additional service fees from our company, however, there are increased newspaper fees due to the additional foreign information included in the legal notice.</p>
                </div>
                <div class="price-box foreign-show">
                    <p>
                        All Inclusive Publishing Rate for <em>‘Foreign Entity’</em>
                    </p>
                    <p>{{ $entity_name }} {{ $entity_ending }} in  ____________:</p>
                    <span class="price">$000</span>
                </div>
                <div class="copy-box foreign-show">
                    <h4>We will need a copy of the Application for Authority, which you filed with NY State upon qualification. </h4>
                    <ul class="radio-list">
                        <li>
                            <label>
                                <input type="radio" name="copy">
                                I will upload a copy of the application of authority
                            </label>
                            <input type="file" name="application_copy">
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="copy">
                                I will email a copy to expert@legalboxpublishing.com
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="copy">
                                Please retrieve this document from NY State for an additional $10 fee.
                            </label>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="base_main_price" value="{{ $price }}">
                <input type="hidden" name="service_main_type" value="0">
                <input type="hidden" name="selected_county" value="">
                <button type="submit" class="btn">Continue to Checkout</button>
            </div>
        </div>
    </div>
@endsection
