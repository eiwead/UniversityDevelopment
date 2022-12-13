@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Condition
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.condition.update', ['id' => $viewData['condition']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="period" value="{{ $viewData['condition']->getPeriod() }}" type="date"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="percent" value="{{ $viewData['condition']->getPercent() }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <textarea class="form-control" name="name" rows="3">{{ $viewData['condition']->getName() }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">requirement</label>
                    <textarea class="form-control" name="requirement" rows="3">{{ $viewData['condition']->getRequirement() }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
