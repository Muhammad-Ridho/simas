@extends('lokasis.layout')

@section('lokasi.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','lokasis']) }}"> Lokasi</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('lokasis.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{@old('name')}}" required/>
        @if($errors->has('name'))
			<div class='error small text-danger'>{{$errors->first('name')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="department_id" class="form-label">Department:</label>
        <div class="d-flex flex-row align-items-center justify-content-between">
    <select name="department_id" id="department_id" class="form-control form-select flex-grow-1" required>
        <option value="">Select Department</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}" {{ @old('department_id') == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
        @endforeach
    </select>

    <a class="btn btn-light text-nowrap" href="{{route('departments.create', compact([]))}}"><i class="fa fa-plus-circle"></i> New</a>
</div>
        @if($errors->has('department_id'))
			<div class='error small text-danger'>{{$errors->first('department_id')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('lokasis.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Lokasi')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
