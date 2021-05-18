<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>two factor challenge</title>
</head>
<body>
    <h2>two factor challenge</h2>
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
    <form action="/two-factor-challenge" method="POST">
       @csrf 
    
       <div class="code">
          <label for="code">TOTP code</label>
          <input type="text" id="code" name="code" autofocus>
       </div>
      
   
      
    
       <button>submit</button>
       </div>
    </form>
    <form action="/two-factor-challenge" method="POST">
       @csrf 
      
       <div class="recovery_code">
          <label for="recovery_code">recovery code</label>
          <input type="text" id="recovery_code" name="recovery_code" autofocus>
       </div>
      
    
       <button>submit</button>
       </div>
    </form>
</body>
</html>