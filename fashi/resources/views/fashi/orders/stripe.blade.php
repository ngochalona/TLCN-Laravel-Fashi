@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                            <a href="{{url('/cart')}}">Giỏ hàng</a>
                            <a href="{{url('/')}}">Checkout</a>
                            <span>stripe</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->

        <div class="container">
            @if (Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif

            @if (Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning" style="margin-bottom: -15px">
                        <div class="panel-heading"  style="background-color: #E7AB3C !important; color: #000000; text-align:center">
                            <h4 class="panel-title">
                            <a style="text-decoration: none;    font-size: 30px;" data-toggle="collapse" data-parent="#accordion" href="#toggle">
                                Cảm ơn bạn đã mua hàng</a>
                            </h4>
                        </div>
                        <div id="toggle" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                    <li  style="background-color: #FCF8E3 !important;text-align:center" class="list-group-item">
                                        <div href="" style="color: #000000; text-decoration:none;"><h4>YOUR ORDER HAS BEEN PLACED</h4>
                                            <p>Mã đơn hàng <b>{{Session::get('order_id')}}</b> và số tiền cần thanh toán là <b>${{Session::get('grand_total')}}</b></p></div>
                                            <b>Nhập số tài khoản credit card hoặc dedit card</b>
                                    </li>
                            </ul>
                        </div>
                        </div>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <script src="https://js.stripe.com/v3/"></script>

                    <form action="{{url('/stripe')}}" method="post" id="payment-form">{{csrf_field()}}
                      <div class="form-row">
                            <b>Tổng tiền</b>
                            <input type="text" name="total_amount" placeholder="Nhập tổng tiền" class="form-control" value="{{Session::get('grand_total')}}" readonly>
                            <b>Họ và Tên</b>
                            <input type="text" name="name" id="" placeholder="Nhập họ tên" class="form-control">
                            <b>Số tài khoản</b>
                            <input type="hidden" name="order_id" id="" value="{{Session::get('order_id')}}">
                            <div id="card-element" class="form-control">

                            </div>
                      </div>

                      <button type="submit" class="btn btn-success btn-mini" style="float: right; margin-top: 10px">Thanh toán</button>
                    </form>
                    <div id="card-error" role="alert"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_51GwoihIJzgT2zuf5gPH108z0N7D1AdYTiQhLSa7ibmoiZcSMcpxmzTv0ZmeMNvnmahUZuHE8jg5V0KzXgc214Lbd00OfNkPCgk');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection


<?php
    Session::forget('order_id');
    Session::forget('grand_total');

?>
