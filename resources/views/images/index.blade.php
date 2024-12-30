@extends('layouts.layouts')

@section('title', 'トップ')

@section('styles')
  @vite('resources/scss/images/index.scss')
@endsection

@section('content')
<div class="features">
  <div class="container">
    <div id="react-root"></div>
  </div>
</div>
@endsection

@push('scripts')
  @vite(['resources/js/images/ImageGallery.tsx'])
@endpush
