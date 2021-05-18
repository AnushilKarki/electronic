<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password verification</title>
</head>
<body>
    <h2>verify password</h2>
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
    <form action="/user/confirm-password" method="POST">
       @csrf 
    
       <div class="password">
          <label for="password">password</label>
          <input type="password" id="password" name="password" autofocus>
       </div>
      
    
       <button>submit</button>
       </div>
    </form>
</body>
</html>