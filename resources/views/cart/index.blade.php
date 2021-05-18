

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

<h1 class="heading"> <span> Cart </span> </h1>

<div class="row">

 

    <div class="content">
	<table>
						<thead>
							<tr class="main-hading">
							
								<th class="text-center"><h3>NAME</h3></th>
						
								<th class="text-center"><h3>UNIT PRICE</h3></th>
								<th class="text-center"><h3>QUANTITY</h3></th>
								<th class="text-center"><h3>TOTAL</h3></th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                                    @foreach($cartitems as $item)
							<tr>
						
								<td >
									<h2>{{ $item->name }}</h2>
									
								</td>
							
								<td><h2> Rs {{ $item->price }}</h2></td>
								<td ><!-- Input Order -->
									<div class="input-group">
									<form action="{{route('cart.update',$item->id)}}">
<input name="quan" type="number" value="{{ $item->quantity }}">
<input type="submit" value="save">
</form>
									</div>
									<!--/ End Input Order -->
								</td>
								<td><h2> Rs {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</h2></td>
								<td ><a href="{{ route('cart.destroy',$item->id) }}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
					@endforeach
						</tbody>
					</table>
       
    </div>

</div>
<div class="row">
				<div>
					<!-- Total Amount -->
					<div>
						<div class="row">
							<div >
								<div class="left">
									<div class="coupon">
										<form action="{{ route('cart.coupon') }}" target="_blank">
											<input name="Coupon_code" placeholder="Enter Your Coupon">
											<button class="btn" type="submit">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div >
								<div class="right">
									<ul>
										<li><h3>Cart Subtotal Rs {{ \Cart::session(auth()->id())->getTotal()  }}</h3></li>
										<li><h3>Shipping rs 60-rs 150</h3></li>
										<li><h3>You Save $20.00</h3></li>
										<li class="last"><h3>You Pay {{ \Cart::session(auth()->id())->getTotal()  }}</h3>></li>
									</ul>
									<br>
									<div>
										<a href="{{ route('cart.checkout') }}" class="btn">Checkout</a>
										<a href="{{ route('home') }}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
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