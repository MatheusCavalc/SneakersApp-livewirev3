@extends('layouts.admin')

@section('title', 'Admin App')

@section('content')

<livewire:admin.sneakers.edit-sneaker :sneaker="$id"/>

@endsection
