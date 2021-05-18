@extends('layouts.app')
@section('content')
@foreach($products as $product)
<form action="{{ route('product.attribute.store') }}" method="post">
@csrf
  <fieldset>
    <legend>Attribute :</legend>


    <input type="hidden" name="productid" value="{{ $product->id }}"><br><br>

    <label for="color">Color:</label>
    <input type="text" name="color1" value="0">
    <label for="size">Size:</label>
    <input type="text" name="size1"  value="0">
    <label for="quantity">quantity:</label>
    <input type="text" name="quantity1"  value="0"><br><br>

    <label for="color">Color:</label>
    <input type="text" name="color2"  value="0">
    <label for="size">Size:</label>
    <input type="text" name="size2"  value="0">
    <label for="quantity">quantity:</label>
    <input type="text" name="quantity2"  value="0"><br><br>

    <label for="color">Color:</label>
    <input type="text" name="color3" value="0">
    <label for="size">Size:</label>
    <input type="text" name="size3"  value="0">
    <label for="quantity">quantity:</label>
    <input type="text" name="quantity3"  value="0"><br><br>

    <label for="color">Color:</label>
    <input type="text" name="color4"  value="0">
    <label for="size">Size:</label>
    <input type="text" name="size4" value="0" >
    <label for="quantity">quantity:</label>
    <input type="text" name="quantity4"  value="0"><br><br>

    <label for="color">Color:</label>
    <input type="text" name="color5" value="0">
    <label for="size">Size:</label>
    <input type="text" name="size5"  value="0">
    <label for="quantity">quantity:</label>
    <input type="text" name="quantity5"  value="0"><br><br>
    <button type="submit" class="btm btn-primary">submit</button>
  </fieldset>
</form>
@endforeach
@endsection