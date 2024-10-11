    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Billing address</h3>
                            </div>
                            <div class="billing-address">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name *</label>
                                        <input name="fname" type="text" class="form-control" placeholder="" value="" required wire:model="firstname">
                                        @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                        
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name *</label>
                                        <input name="lname" type="text" class="form-control"  placeholder="" value="" required wire:model="lastname">
                                        @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email Address *</label>
                                    <input name="email"  type="email" class="form-control"  placeholder="" required wire:model="email">                                    
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Phone *</label>
                                    <input name="phone"  type="email" class="form-control"  placeholder="" required wire:model="mobile">
                                    @error('moblie') <span class="text-danger">{{$message}}</span> @enderror                                
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label name="add" for="address">Address *</label>
                                    <input type="text" class="form-control" placeholder="" required wire:model="line1">
                                    @error('line1') <span class="text-danger">{{$message}}</span> @enderror                                
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label name="add" for="address2">Address 2 *</label>
                                    <input type="text" class="form-control" placeholder="" wire:model="line2"> </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="country">Country *</label>
                                        <input name="country" type="text" class="f0orm-control" placeholder="" wire:model="country"> </div>
                                        @error('country') <span class="text-danger">{{$message}}</span> @enderror                                
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">Province *</label>
                                        <input name="province" type="text" class="form-control" placeholder="" wire:model="province"> </div>
                                        @error('province') <span class="text-danger">{{$message}}</span> @enderror                                
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">Town / City *</label>
                                        <input name="city" type="text" class="form-control" placeholder="" wire:model="city"> </div>
                                        @error('city') <span class="text-danger">{{$message}}</span> @enderror                               
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="zip">Zip *</label>
                                        <input name="zip-code" type="text" class="form-control"  placeholder="" required wire:model="zipcode">
                                        @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror   
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="debit" value="cod" name="paymentMethod" type="radio" class="custom-control-input" wrire:model="paymentmode">
                                    <label class="custom-control-label" for="debit">Cash On Delivery</label>
                                    
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="credit" value="card" name="paymentMethod" type="radio" class="custom-control-input" wrire:model="paymentmode">
                                    <label class="custom-control-label" for="credit">Debit / Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" wrire:model="paymentmode">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                                @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback"> Name on card is required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback"> Credit card number is required </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback"> Security code required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1">
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Shipping Method</h3>
                                    </div>
                                    <div class="mb-4">
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                        <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                        <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Shopping cart</h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                                <div class="small text-muted">Price: $80.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $80.00</div>
                                            </div>
                                        </div>
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                                <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $60.00</div>
                                            </div>
                                        </div>
                                        <div class="media mb-2">
                                            <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                                <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $40.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Your order</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Product</div>
                                    </div>
                                    <hr>
                                    @if(Session::has('checkout'))
                                        <div class="d-flex gr-total">
                                            <h5>Grand Total</h5>
                                            <div class="ml-auto h5"> $ {{Session::get('checkout')['total']}} </div>
                                        </div>
                                    @endif
                                    <hr> 
                                </div>
                            </div>
                            <button type="submit" class="btn btn-medium">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Cart -->
