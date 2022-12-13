@extends('layouts.admin')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Requirement
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.requirement.update', ['id' => $viewData['requirement']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Зарплата:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="wage" value="{{ $viewData['requirement']->getWage() }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Возраст:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="age" value="{{ $viewData['requirement']->getAge() }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Платёжеспособность:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="payability" value="{{ $viewData['requirement']->getPayability() }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        &nbsp;
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
