@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row">
        @foreach ($viewData['requirements'] as $requirement)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    {{-- <img src="{{ asset('/img/' . $product->getImage()) }}" class="card-img-top img-card"> --}}
                    <div class="card-body text-center">
                        <a href="{{ route('product.show', ['id' => $requirement->getWage()]) }}"
                            class="btn bg-primary text-white">{{ $requirement->getAge()}} {{ $requirement->getPayability() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
