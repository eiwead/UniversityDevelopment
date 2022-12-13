@extends('layouts.admin')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Добавить требование
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.requirement.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Зарплата:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="wage" value="{{ old('wage') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Возраст:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="age" value="{{ old('age') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Платёжеспособность</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="payability" value="{{ old('payability') }}" type="boolean" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Управление требованиями
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['requirements'] as $requirement)
                        <tr>
                            <td>{{ $requirement->getId() }}</td>
                            <td>{{ $requirement->getWage() }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admin.requirement.edit', ['id' => $requirement->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.requirement.delete', $requirement->getId()) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
