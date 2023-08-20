@extends('layouts.app')
@section('title')
    Edit Products
@endsection
@section('content')
    @livewire('master-data.products.edit-products',['id'=>request('id')])
@endsection
