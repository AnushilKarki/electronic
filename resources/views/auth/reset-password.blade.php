<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>
    <h2>reset view</h2>
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
    <form action="/reset-password" method="POST">
       @csrf 
    
       <div class="email">
          <label for="email">email</label>
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
       @php
        $token=request()->route('token');
       @endphp
       <div class="hidden">
         <input type="hidden" name="token" value="{!! $token !!}">
       </div>
    
       <button>submit</button>
       </div>
    </form>
</body>
</html>