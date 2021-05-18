


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Project</title>

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/styleHome.css">

</head>
<body>

<!-- header section starts  -->


<header>

<div class="header-1">

    <a href="#" class="logo"> <i class="fas fa-shopping-bag"></i>  cyberlife </a>

    <div class="form-container">
    
        <form action="{{route('products.search')}}" method="GET">
                            <input name="query" placeholder="search products" type="search" id="search">
                          
                            <button type="submit" for="search" class="fas fa-search"> </button>
                        </form>
    </div>

</div>

<div class="header-2">

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="/">home</a></li>
            <li><a href="#arrival">arrival</a></li>
            <li><a href="#featured">featured</a></li>
            <li><a href="#gallery">gallery</a></li>
            <li><a href="#deal">deal</a></li>
        </ul>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="{{ route('cart.index') }}" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
    </div>

</div>

</header>

<section class="feature" id="featured">

<h1 class="heading"> <span> confirm order  </span> </h1>

<div class="row">

<form class="form" method="post" action="{{ route('orders.store') }}">
                            @csrf
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
						
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Full Name<span>*</span></label>
											<input type="text" name="shipping_fullname" placeholder="" required="required">
										</div>
									</div>
								
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="shipping_phone" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Country<span>*</span></label>
											<select name="country_name" id="country">
												
										
												<option value="NP">Nepal</option>
											
											
										
									
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
											<select name="shipping_state" id="state-province">
												<option value="divition" selected="selected">1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>city<span>*</span></label>
											<input type="text" name="shipping_city" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address <span>*</span></label>
											<input type="text" name="shipping_address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>zip Code<span>*</span></label>
											<input type="text" name="shipping_zipcode" placeholder="" required="required">
										</div>
									</div>
								
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
								</div>
						
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>{{ \Cart::session(auth()->id())->getTotal() }}</span></li>
										<li>(+) Shipping<span>$10.00</span></li>
										<li class="last">Total<span>{{\Cart::session(auth()->id())->getTotal()}}</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
								
										<label class="checkbox-inline" for="2"><input name="payment_method" id="2" type="checkbox" value="cash_on_delivery"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="payment_method" id="3" type="checkbox" value="paypal"> PayPal</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
                                    <button type="submit">place order</button>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
        </form>
			</div>

</section>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <a href="#" class="logo"> <i class="fas fa-shopping-bag"></i> cyberlife </a>
            <p>welcome to global cyberlife where your shopping is made easier and more secure</p>
        </div>

        <div class="box">
            <h3>links</h3>
            <a href="#">home</a>
            <a href="#">arrival</a>
            <a href="#">featured</a>
            <a href="#">gallery</a>
            <a href="#">deal</a>
        </div>

        <div class="box">
            <h3>contact us</h3>
            <p> <i class="fas fa-home"></i>
               kaushaltar,bahktapur
            </p>
            <p> <i class="fas fa-phone"></i>
                9849594857
            </p>
            <p> <i class="fas fa-globe"></i>
              www.globalcyberlife.com
            </p>
        </div>

    </div>



</section>

<!-- footer section ends -->






<!-- footer section ends -->

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="/js/home.js"></script>
    
</body>
</html>