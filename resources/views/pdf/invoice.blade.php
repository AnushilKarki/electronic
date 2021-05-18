

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Project</title>



    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/styleHome.css">

</head>
<body>

<!-- header section starts  -->


<header>

<div class="header-1">

    <a href="#" class="logo"> <i class="fas fa-shopping-bag"></i>cyberlife </a>

    <div class="form-container">
    
	<div class="box">
           
            <p>welcome to global cyberlife where your shopping is made easier and more secure</p>
        </div>
    </div>

</div>

<div class="header-2">

    <div id="menu" class="fas fa-bars"></div>

  

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
								<td><h2> Rs {{ $carttotal  }}</h2></td>
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
									
									
								</div>
							</div>
							<div >
								<div class="right">
									<ul>
										<li><h3>Cart Subtotal Rs {{ $carttotal }}</h3></li>
										<li><h3>Shipping rs 60-rs 150</h3></li>
										<li><h3>You Save $20.00</h3></li>
										<li class="last"><h3>You Pay {{ $carttotal  }}</h3>></li>
									</ul>
									<br>

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


<!-- custom js file link  -->
<script src="/js/home.js"></script>
    
</body>
</html>