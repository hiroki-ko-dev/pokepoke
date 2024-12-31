@extends('layouts.layouts')

@section('title', 'パック登録')

@section('styles')
  @vite('resources/scss/packs/save.scss')
@endsection

@section('content')
<div class="container">
  <h1 class="text-center my-4">パック登録</h1>

  <form action="{{ route('packs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">パック名</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="パック名を入力" required>
    </div>

    <div class="mb-3">
      <label for="symbol" class="form-label">記号名</label>
      <input type="text" name="symbol" id="symbol" class="form-control" placeholder="記号名を入力" required>
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">パック種別</label>
      <select name="type" id="type" class="form-control" required>
        @foreach (App\Enums\PackType::cases() as $packType)
          <option value="{{ $packType->value }}">{{ $packType->label() }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image_url" class="form-label">画像URL</label>
      <input type="text" name="imageUrl" id="imageUrl" class="form-control" placeholder="画像URLを入力" required>
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
  </form>
</div>
@endsection
