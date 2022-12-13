@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">{{ $viewData['takeover'] }}</p>
                    <p class="card-text">{{ $viewData['period'] }}</p>
                    <p class="card-text">{{ $viewData['sum'] }}</p>
                    <p class="card-text">{{ $viewData['bank'] }}</p>
                    <p class="card-text">{{ $viewData['user'] }}</p>
                    <a href="/contracts"><button>Назад</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
