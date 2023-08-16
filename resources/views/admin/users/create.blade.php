@extends('layouts.appSimas')

@section('titleApp')
<title>Simas | Users</title>
@endsection

@section('content')
<section class="content">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="m-0">{{ __('Tambah Data Users') }}</h3>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name')}}"
                                    data-mask>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3 form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-5">
                                <select class="form-control select2" name="level" required>
                                    <option selected disabled value="">Choose</option>
                                    <option value="admin">Admin</option>
                                    <option value="pimpinan">Pimpinan</option>
                                    <option value="kabag sarpras">Kabag Sarpras</option>
                                    <option value="pengelola cabang">Pengelola Cabang</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" name="email" type="email" class="form-control"
                                    value="{{ old('email')}}" data-mask>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password')}}" data-mask>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-2 col-form-label">Img</label>
                            <div class="col-sm-10">
                                <input type="file" class="uploads" name="image" id="image" aria-describedby="inputGroup" aria-label="Upload" required>

                                @if ($errors->has('img'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('img') }}</strong>
                                </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-success" id="submit">Tambah</button>
                                <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>

<script type="text/javascript">
function readURL() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).prev().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $(".uploads").change(readURL)
    $("#f").submit(function() {
        return false
    })
})
</script>
@stop