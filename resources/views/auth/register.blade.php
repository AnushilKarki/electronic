<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Register</h2>
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
    <form action="/register" method="POST">
       @csrf 
       <div class="name">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" value="{{ old('username') }}" autofocus>
       </div>
       <div class="email">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus>
       </div>
     
       <div class="password">
          <label for="password">password</label>
          <input type="password" id="password" name="password">
       </div>
       <div class="password_confirmation">
          <label for="password_confirmation">password_confirmation</label>
          <input type="password" id="password_confirmation" name="password_confirmation">
       </div>
       <div>
       <button>Register</button>
       </div>
    </form>
</body>
</html>