@extends('layouts.layouts')

@section('title', 'トップ')

@section('content')
<div id="react-root">aa</div>
@endsection

@push('scripts')
  @vite(['resources/js/images/index.jsx'])
@endpush
