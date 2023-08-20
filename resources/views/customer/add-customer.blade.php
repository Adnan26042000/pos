@extends('layouts.app')
@section('title')
    {{empty(request('customer_id'))?'Add':'Update'}} Customer
@endsection
@section('content')
    @livewire('customer.add-customer',['customer_id' => request('customer_id')])
@endsection
