@extends('layouts.layouts')

@section('title', '記事登録')

@section('content')
<div class="features">
  <div class="container">
    <div id="react-root"></div>
  </div>
</div>
@endsection

@push('scripts')
  @vite(['resources/js/roots/blogs/create.tsx'])
@endpush
