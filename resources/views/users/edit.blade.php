@extends('layouts.template')
@section('content')
   <div class="row justify-content-center">
        <div class="card col-lg-8 col-md-12">
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nama Organisai Pemerintah Daerah</label>
                        <input type="text" class="form-control" name="name" id="examplename1" placeholder="Enter Nama OPD"
                        value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email"
                        value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
