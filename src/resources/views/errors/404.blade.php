@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-secondary mt-4">404 Not Found</h2>
            <p class="text-secondary">お探しのページは見つかりませんでした。</p>
            <a href="{{ url('/') }}">トップページへ戻る</a>
        </div>
    </div>
@endsection