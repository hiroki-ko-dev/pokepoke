@extends('layouts.layouts')

@section('title', 'トップ')

@section('content')
<section class="hero">
    <!-- 画像のみ表示 -->
</section>

<section class="features">
    <div class="container">
        <h2>ゲームの特徴</h2>
        <div class="feature-list">
            <div class="feature-item">
                <img src="/images/feature1.png" alt="ポケモンバトル">
                <h3>リアルタイムバトル</h3>
                <p>友達とリアルタイムで対戦できます。</p>
            </div>
            <div class="feature-item">
                <img src="/images/feature2.png" alt="新しいポケモン">
                <h3>新しいポケモン</h3>
                <p>探検して新しいポケモンを発見しましょう。</p>
            </div>
            <div class="feature-item">
                <img src="/images/feature3.png" alt="ランキング">
                <h3>ランキングシステム</h3>
                <p>トッププレイヤーを目指しましょう！</p>
            </div>
        </div>
    </div>
</section>
@endsection