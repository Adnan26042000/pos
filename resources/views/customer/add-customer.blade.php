@extends('layouts.app')
@section('title')
    Add Customer
@endsection
@section('content')
    @livewire('customer.add-customer',['customer_id' => request('customer_id')])
@endsection
