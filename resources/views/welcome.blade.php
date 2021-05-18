<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Project</title>

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
            @foreach($categories as $category)
            <li>
                        <a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}<i
                                    class="pe-7s-angle-right"></i></a>

                                    @php
                                        $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                    @endphp

                               @if($children->isNotEmpty())
                                <div class="category-menu-dropdown">

                                    @foreach ($children as $child)
                                        <div class="category-dropdown-style category-common3">
                                            <h4 class="categories-subtitle">
                                                <a href="{{route('products.index', ['category_id' => $child->id])}}">
                                                {{$child->name}}
                                                </a>

                                              </h4>
                                            @php
                                                $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                            @endphp
                                            @if($grandChild->isNotEmpty())
                                                <ul>
                                                    @foreach ($grandChild as $c)
                                                        <li><a href="{{route('products.index', ['category_id' => $c->id])}}">{{$c->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endforeach


                                </div>

                              @endif
                        </li>
            @endforeach
        </ul>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="{{ route('cart.index') }}" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
    </div>

</div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">



</section>

<!-- home section ends -->

<!-- arrival section starts  -->

<section class="arrival" id="arrival">

<h1 class="heading"> <span>new arrivals</span> </h1>

<div class="box-container">
@foreach ($products as $product)

    <div class="box">
        <div class="image">
        <img src="{{asset('storage/'.$product->image)}}" class="img-responsive">
        </div>
        <div class="info">
            <h3>{{ $product->name }}</h3>
            <div class="subInfo">
                <strong class="price"> ₹1000/- <span>{{ $product->selling_price }}</span> </strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
        <div class="overlay">
            <a href="#" style="--i:1;" class="fas fa-heart"></a>
            <a href="{{route('cart.add', $product->id)}}" style="--i:2;" class="fas fa-shopping-cart"></a>
            <a href="{{route('products.show', $product)}}" style="--i:3;" class="fas fa-search"></a>
        </div>
    </div>

    @endforeach
 

</div>

</section>

<!-- arrival section ends -->

<!-- featured section starts  -->

<section class="feature" id="featured">

<h1 class="heading"> <span> featured product </span> </h1>

<div class="row">

    <div class="image-container">

        <div class="big-image">
        <img src="images/watch1.jpg" alt="">
        </div>

        <div class="small-image">
            <img class="image-active" src="images/watch1.jpg" alt="">
            <img src="images/g_img1.jpg" alt="">
            <img src="images/watch3.jpg" alt="">
            <img src="images/watch4.jpg" alt="">
        </div>

    </div>

    <div class="content">

        <h3>smart watches</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span>(500+) reviews</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, at!</p>
        <strong class="price">₹1000 <span>₹1500</span> </strong>
        <a href="#"><button class="btn">buy now</button></a>

    </div>

</div>

</section>

<!-- featured section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

<h1 class="heading"> <span> product gallery </span> </h1>

<ul class="controls">
    <li class="btn button-active" data-filter="all">all</li>
    <li class="btn" data-filter="phone">phone</li>
    <li class="btn" data-filter="laptop">laptop</li>
    <li class="btn" data-filter="headphone">headphone</li>
    <li class="btn" data-filter="shoes">shoes</li>
</ul>

<div class="image-container">

    <div class="box phone">
        <div class="image">
            <img src="images/g_img1.jpg" alt="">
        </div>
        <div class="info">
            <h3>smartphones</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box phone">
        <div class="image">
            <img src="images/g_img2.jpg" alt="">
        </div>
        <div class="info">
            <h3>smartphones</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box laptop">
        <div class="image">
            <img src="images/g_img3.jpg" alt="">
        </div>
        <div class="info">
            <h3>laptop</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box shoes">
        <div class="image">
            <img src="images/g_img4.jpg" alt="">
        </div>
        <div class="info">
            <h3>shoes</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box laptop">
        <div class="image">
            <img src="images/g_img5.jpg" alt="">
        </div>
        <div class="info">
            <h3>laptop</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box headphone">
        <div class="image">
            <img src="images/g_img6.jpg" alt="">
        </div>
        <div class="info">
            <h3>headphone</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div>  

    <div class="box shoes">
        <div class="image">
            <img src="images/g_img7.jpg" alt="">
        </div>
        <div class="info">
            <h3>shoes</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div> 

    <div class="box headphone">
        <div class="image">
            <img src="images/g_img8.jpg" alt="">
        </div>
        <div class="info">
            <h3>headphone</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div> 

    <div class="box headphone">
        <div class="image">
            <img src="images/g_img9.jpg" alt="">
        </div>
        <div class="info">
            <h3>headphone</h3>
            <div class="subInfo">
                <strong class="price">₹1000</strong>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </div>
            </div>
        </div>
    </div> 

</div>

</section>

<!-- gallery section ends -->

<!-- deal section starts  -->

<section class="deal" id="deal">

<h1 class="heading"> <span> best deals </span> </h1>

<div class="box-container">

    <div class="box">
        <img src="images/deal1.jpg" alt="">
        <div class="content">
            <h3>latest laptop</h3>
            <p>upto 25% off on first purchase</p>
            <a href="#"><button class="btn">explore</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/deal2.jpg" alt="">
        <div class="content">
            <h3>new headphone</h3>
            <p>upto 25% off on first purchase</p>
            <a href="#"><button class="btn">explore</button></a>
        </div>
    </div>

</div>

<div class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <h3>fast delivery</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-user-clock"></i>
        <h3>24 x 7 support</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-money-check-alt"></i>
        <h3>easy payments</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-box"></i>
        <h3>10 days replacements</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

</div>

</section>

<!-- deal section ends -->

<!-- newsletter section starts  -->

<section class="newsletter">

    <h1>newsletter</h1>
    <p>get in touch for latest discounts and updates</p>
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" class="btn">
    </form>

</section>

<!-- newsletter section ends -->

<!-- footer section starts  -->


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