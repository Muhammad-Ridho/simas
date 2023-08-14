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
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
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
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <table class=" table table-bordered table-hover">
                    <thead>
                        <tr class="header table-success text-center">
                            <th scope="col ">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($users as $user)
                        <?php $no++; ?>
                        <tr>
                            <th class="text-center" scope="row" width="50px">{{ $no }}</th>
                            <td>{{ $user->name }}</td>
                            <td class="text-center">{{ $user->level }}</td>
                            <td class="col-sm-2 text-center">
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group" role="group" aria-label="Basic outlined">
                                        <a href="#" type="button" class="btn btn-outline-primary"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" type="button" class="btn btn-outline-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
@endsection