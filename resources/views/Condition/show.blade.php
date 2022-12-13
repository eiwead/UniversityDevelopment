@extends('layouts.app')
{{-- Здесь стояло @section('layouts.app') 
из-за чего страница не отображалась --}}
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    {{-- @foreach ($viewData['requirements'] as $requirement) --}}
                        <h5 class="card-title">
                            {{ $viewData['condition']->getName() }} 
                        </h5>
                        <p class="card-text">{{ $viewData['condition']->getPercent() ." %"}}</p>
                        <p class="card-text">{{ $viewData['wage']}}</p>
                        <p class="card-text">{{ $viewData['age']}}</p>
                        <p class="card-text">{{ $viewData['payability']}}</p>
                        {{-- <p class="card-text">{{ $requirement->getWage() . " - требуемая зарплата"}}</p> --}}
                        {{-- <p class="card-text">{{ $requirement->getAge()." - необходимый возраст"  }}</p> --}}
                    {{-- @endforeach --}}
                    <a href="/conditions"><button>Назад</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
