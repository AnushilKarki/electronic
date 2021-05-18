<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
</head>
<body>
    <h2>forgot password</h2>
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
    <form action="/forgot-password" method="POST">
       @csrf 
    
       <div class="email">
          <label for="email">email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus>
       </div>
      
    
       <button>submit</button>
       </div>
    </form>
</body>
</html>