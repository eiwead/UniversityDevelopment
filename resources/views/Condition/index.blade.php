@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row">
        @foreach ($viewData['conditions'] as $condition)
                <div class="col-md-4 col-lg-3 mb-2">
                    <div class="card">
                        {{-- <img src="{{ asset('/img/' . $product->getImage()) }}" class="card-img-top img-card"> --}}
                        <div class="card-body text-center">
                            <a href="{{ route('condition.show', ['id' => $condition->getId()]) }}"
                                class="btn bg-primary text-white">{{ $condition->getName() }}</a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
