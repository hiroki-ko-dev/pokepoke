@extends('layouts.layouts')

@section('title', 'パック一覧')

@section('styles')
  @vite('resources/scss/packs/index.scss')
@endsection

@section('content')
<div class="container">
  <h1 class="text-center my-4">パック一覧</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>パック名</th>
        <th>種別</th>
        <th>画像</th>
        <th>記号名</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($packs as $pack)
        <tr>
          <td>{{ $pack->id }}</td>
          <td>{{ $pack->name }}</td>
          <td>{{ App\Enums\PackType::from($pack->type)->label() }}</td>
          <td><img src="{{ $pack->image_url }}" alt="{{ $pack->name }}" style="max-width: 100px;"></td>
          <td>{{ $pack->symbol }}</td>
          <td>
            <form action="{{ route('packs.destroy', $pack->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">削除</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">登録されたパックはありません。</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
