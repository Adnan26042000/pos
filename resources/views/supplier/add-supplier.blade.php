@extends('layouts.app')
@section('title')
    {{empty(request('supplier_id'))?'Add':'Update'}}  Supplier
@endsection
@section('content')
    @livewire('supplier.add-supplier',['supplier_id' => request('supplier_id')])
@endsection
