@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
    <h1>404 Not Found</h1>
    <p>お探しのページは見つかりませんでした。</p>
    <a href="{{ url('/') }}">トップページへ戻る</a>
@endsection