@extends('layouts.app')
@section('content')
@foreach($products as $product)
  {{ $product->name }}
  <a href="{{route('admin.product.attribute.add', $product->id)}}">add attribute</a>

@endforeach
@endsection