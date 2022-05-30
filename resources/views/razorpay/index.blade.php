<!DOCTYPE html>
<html>
<head>
  <title>Razorpay Payment Gateway Integration In Laravel 9</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style type="text/css">
    .card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden; }
  .card-product .price-new, .card-product .price {
    margin-right: 5px; }
  .card-product .price-old {
    color: #999; }
  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center; }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover; }
      
      .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px; }
  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .title {
    margin-top: 0; }
  </style>

</head>
<body>

<div class="container mt-4">

<br>  <h3 class="text-center">RazorPay Payment Gateway Integration</h3><hr>

<div class="row">
<div class="col-md-3">
  <figure class="card card-product">
    <div class="img-wrap"> 
      <img src="https://images.unsplash.com/photo-1580910051074-3eb694886505?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=401&q=80">
      
    </div>
    <figcaption class="info-wrap">
      <h6 class="title text-dots"><a href="javascript:void(0)">Good item name</a></h6>
      <div class="action-wrap">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right buy" data-amount="1280" data-id="1"> Order </a>
        <div class="price-wrap h5">
          <span class="price">1280</span>
        </div> <!-- price-wrap.// -->
      </div> <!-- action-wrap -->
    </figcaption>
  </figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
  <figure class="card card-product">
    <div class="img-wrap"> <img src="https://images.unsplash.com/photo-1597075095308-0b47fc649175?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&q=80%20335w">
    </div>
    <figcaption class="info-wrap">
      <h6 class="title text-dots"><a href="javascript:void(0)">The name of product</a></h6>
      <div class="action-wrap">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right buy" data-amount="280" data-id="2"> Order </a>
        <div class="price-wrap h5">
          <span class="price">280</span>
        </div> <!-- price-wrap.// -->
      </div> <!-- action-wrap -->
    </figcaption>
  </figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
  <figure class="card card-product">
    <div class="img-wrap"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80%20750w"> 
    
    </div>
    <figcaption class="info-wrap">
      <h6 class="title text-dots"><a href="javascript:void(0)">Name of product</a></h6>
      <div class="action-wrap">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right buy" data-amount="300" data-id="3"> Order </a>
        <div class="price-wrap h5">
          <span class="price-new">300</span>
        </div> <!-- price-wrap.// -->
      </div> <!-- action-wrap -->
    </figcaption>
  </figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
  <figure class="card card-product">
    <div class="img-wrap"> <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=689&q=80 689w">
    </div>
    <figcaption class="info-wrap">
      <h6 class="title text-dots"><a href="javascript:void(0)">The name of product</a></h6>
      <div class="action-wrap">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm float-right buy" data-amount="550" data-id="4"> Order </a>
        <div class="price-wrap h5">
          <span class="price">550</span>
        </div> <!-- price-wrap.// -->
      </div> <!-- action-wrap -->
    </figcaption>
  </figure> <!-- card // -->
</div> <!-- col // -->
</div> <!-- row.// -->

</div> 

</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>  
<script>
  var SITEURL = '{{URL::to('')}}';
  $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  }); 
$('body').on('click', '.buy', function(e){
    var amount = $(this).attr("data-amount");
    var pId =  $(this).attr("data-id");
    var options = {
    "key": "rzp_test_qHnJ2cJbWYcXv8",
    "amount": (amount*100), // 2000 paise = INR 20
    "name": "Razorpay",
    "description": "Payment",
    //"image": "",
     "handler": function (response){
     
       window.location.href = SITEURL +'/'+ 'payment-process?payment_id='+response.razorpay_payment_id+'&product_id='+pId+'&amount='+amount;

    },
    "prefill": {
     "contact": '9471177127',
     "email":   'alisamrcok@gmail.com',
    },

    "theme": {
      "color": "#528FF0"
    }
};

var rzp1 = new Razorpay(options);
          rzp1.open();
          e.preventDefault();
});
/*document.getElementsClass('buy_plan1').onclick = function(e){
rzp1.open();
e.preventDefault();
}*/
</script>
</body>
</html>