@extends('layouts.layouts')

@section('title', 'カード一覧')

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
    window.cards = @json($cards->pluck('image_url'));
  </script>
  @vite(['resources/js/roots/cards/index.tsx'])
@endpush
