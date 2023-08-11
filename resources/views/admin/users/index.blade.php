@extends('layouts.appSimas')

@section('titleApp')
<title>Simas | Users</title>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Data Users') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row row-cols-2">
                        <div class="col-sm-8">
                            <a href="/add-users" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                {{ __(' Tambah Data') }}
                            </a>
                        </div>
                        <div class="col-sm-4 text-end">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class=" table table-bordered table-hover">
                    <thead>
                        <tr class="header table-success text-center">
                            <th scope="col ">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th class="text-center" scope="row" width="50px">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td class="text-center">role</td>
                            <td class="col-sm-2 text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined">
                                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                                    <button type="button" class="btn btn-outline-warning"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
@endsection