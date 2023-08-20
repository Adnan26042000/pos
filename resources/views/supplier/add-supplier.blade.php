@extends('layouts.app')
@section('title')
    Add Supplier
@endsection
@section('content')
    @livewire('supplier.add-supplier',['supplier_id' => request('supplier_id')])
@endsection
