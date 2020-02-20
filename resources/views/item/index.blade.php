@extends('layouts.app')

@section('content')
    <items-component form-action="{{ route('items.store') }}" csrf="{{ csrf_token() }}"></items-component>
@endsection