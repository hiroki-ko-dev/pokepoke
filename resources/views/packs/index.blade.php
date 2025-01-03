@extends('layouts.layouts')

@section('title', 'パック一覧')

@section('styles')
  @vite('resources/scss/packs/index.scss')
@endsection

@section('content')
<div class="container">
  <h1 class="text-left my-4">パック一覧</h1>
  
  @auth
    <div class="mb-3">
      <a href="{{ route('packs.create') }}" class="btn btn-primary">画像登録</a>
    </div> 
  @endauth

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>パック名</th>
        <th>種別</th>
        <th>画像</th>
        @auth
          <th>記号名</th>
          <th>操作</th>
        @endauth
      </tr>
    </thead>
    <tbody>
      @forelse ($packs as $pack)
        <tr>
          <td>{{ $pack->name }}</td>
          <td>{{ App\Enums\PackType::from($pack->type)->label() }}</td>
          <td><img src="{{ $pack->image_url }}" alt="{{ $pack->name }}" style="max-width: 100px;"></td>
          @auth
            <td>{{ $pack->symbol }}</td>
            <td>
              <form action="{{ route('packs.destroy', $pack->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">削除</button>
              </form>
            </td>
          @endauth
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
