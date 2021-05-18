<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update password</title>
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
    <form action="{{ route('user-password.update') }}" method="POST">
       @csrf 
    @method('PUT')
    @if(session('status')=="password-updated")
      <div class="alert alert-success">
          password updated successfully
      </div>
    @endif
       <div class="current_password">
          <label for="current_password">current password</label>
          <input type="password" id="current_password" name="current_password" class="form-control @error('current_password','updatePassword') is-invalid @enderror" autofocus>
         @error('current_password','updatePassword')
              <span class="invalid-feedback" role="alert">
          {{$message}}
         @enderror
       </div>
       <div class="password">
          <label for="password">new password</label>
          <input type="password" id="password" name="password" class="form-control @error('password','updatePassword') is-invalid @enderror">
          @error('password','updatePassword')
              <span class="invalid-feedback" role="alert">
          {{$message}}
         @enderror
       </div>
       <div class="password_confirmation">
          <label for="password_confirmation">password_confirmation</label>
          <input type="password" id="password_confirmation" name="password_confirmation">
       </div>
    
       <button>submit</button>
       </div>
    </form>
</body>
</html>