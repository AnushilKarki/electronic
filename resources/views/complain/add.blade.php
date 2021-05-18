@extends('layouts.app')

@section('content')

<h2>Submit your complain</h2>
<form action="{{route('complain.store') }}" method="post">
@csrf
<div class="form-group">
<label for="name">Title</label>
<input type="text" name="title" class="form-control" placeholder="">
</div>
<div class="form-group">
<label for="description">Complain</label>
<input type="text" name="complain" class="form-control" placeholder="">
</div>
<button type="submit" class="btm btn-primary">submit</button>
</form>
@endsection