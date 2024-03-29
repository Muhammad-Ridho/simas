@extends('lokasis.layout')

@section('lokasi.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','lokasis']) }}"> Lokasi</a></li>
                    <li class="breadcrumb-item">@lang('Lokasi') #{{$lokasi->id}}</li>
                </ol>

                <a href="{{ route('lokasis.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$lokasi->id}}</td>
    </tr>
            <tr>
            <th scope="row">Name:</th>
            <td>{{ $lokasi->name ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Department:</th>
            <td><a href="{{route('departments.show', $lokasi->department_id ?: 0)}}" class="text-dark">{{$lokasi?->department?->name ?: "(blank)"}}</a></td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($lokasi->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($lokasi->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('lokasis.edit', compact('lokasi')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('lokasis.destroy', compact('lokasi')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
