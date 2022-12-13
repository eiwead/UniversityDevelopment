@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row">
        @foreach ($viewData['contracts'] as $contract)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('contract.show', ['id' => $contract->getId()]) }}"
                            class="btn bg-primary text-white">Presss
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
