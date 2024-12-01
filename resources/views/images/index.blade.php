@extends('layouts.layouts')

@section('title', 'トップ')

@section('content')
<div id="react-root"></div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('/resources/js/app.jsx') }}"></script>
@endpush
