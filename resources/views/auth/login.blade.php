<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <link rel="stylesheet" href="/css/styleauth.css">
 <style>
 *{
    padding: 0;
    margin: 0;
}
.container{
    width: 100%;
    height: 100vh;
    font-family: sans-serif;
    background-color: rgb(187,187,245);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card{
    width: 350px;
    height: 500px;
    box-shadow: 0 0 40px 20px rgba(0,0,0,0.26);
    perspective: 1000px;
}
.inner-box{
    position: relative;
    width: 100%;
    height: 100%;
    /* transform: rotateY(-180deg); */
    transform-style: preserve-3d;
    transition: transform 1s;
}
.card-front, .card-back{
    position: absolute;
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: center;
    background-image: linear-gradient(rgba(0,0,100,0.8),rgba(0,0,0,0.8)), url(img/download.jfif);
    padding: 55px;
    box-sizing: border-box;
    backface-visibility: hidden;
}
.card-back{
    transform: rotateY(180deg);
}
.card h2{
    font-weight: normal;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}
.input-box{
    width: 100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 6px 0;
    height: 32px;
    border-radius: 20px;
    padding: 0 10px;
    box-sizing: border-box;
    outline: none;
    text-align: center;
    color: #fff;
}
::placeholder{
    color: #fff;
    font-size: 12px;
}
button{
    width: 100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 35px 0 10px;
    height: 32px;
    font-size: 12px;
    border-radius: 20px;
    padding: 0 10px;
    box-sizing: border-box;
    outline: none;
    color: #fff;
    cursor: pointer;

}
.submit-btn{
    position: relative;
}
.submit-btn::after{
    content: "\27a4";
    color: #333;
    line-height: 32px;
    font-size: 17px;
    height: 32px;
    width: 32px;
    border-radius: 50%;
    background: #fff;
    position: absolute;
    right: -1px;
    top: -1px;
}
span{
    font-size: 13px;
    margin-left: 10px;
}
.card .btn{
    margin-top: 70px;

}
.card a {
    color: #fff;
    text-decoration: none;
    display: block;
    text-align: center;
    font-size: 13px;
    margin-top: 8px;
}
 </style>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>Log In</h2>
                    @if ($errors->any())
     <div>
          <div>something went wrong</div>
          <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error}}</li>
              @endforeach
          </ul>
     </div>
    @endif
   
                    <form action="/login" method="POST">
                    @csrf
                        <input type="text" class="input-box" name="name" placeholder="Enter your username" required>
                        <input type="password" class="input-box" name="password" placeholder="Password" required>
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                   
                    <a href="/forgot-password">forgot password!!
       no worry click this link to reset
                                    
                                    </a>
                                    <a href="/sign-in/facebook">sign in with facebook</a>
       <a href="/sign-in/github">sign in with github</a>
                </div>
                <div class="card-back">
                    <h2>Sign Up</h2>
                    <form action="/register" method="POST">
                    @csrf
                        <input type="text" class="input-box" name="name" placeholder="Your UserName" required>
                        <input type="email" class="input-box" name="email" placeholder="Enter your email" required>
                        <div class="phone">
  
     
                        <input type="password" class="input-box" name="password" placeholder="Password" required>
                        <input type="password" class="input-box" name="password_confirmation" placeholder="Confirm Password" required>
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've Already a Account</button>
                    <a href="">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

  
    <script>
        var card= document.getElementById("card");
        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }
        window.fbAsyncInit = function() {
    FB.init({
      appId      : '728989097817870',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>