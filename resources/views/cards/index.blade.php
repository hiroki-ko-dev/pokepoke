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
  <script>
    // Laravel から渡された画像データをグローバル変数に設定
    window.images = @json($images);
  </script>
  @vite(['resources/js/images/create/ImageGallery.tsx'])
@endpush
