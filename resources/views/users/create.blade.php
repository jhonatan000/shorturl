@extends('layouts.template')
@section('content')
   <div class="row justify-content-center">
        <div class="card col-lg-8 col-md-12">
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Organisai Pemerintah Daerah</label>
                        <input type="text" class="form-control" name="name" id="examplename1" placeholder="Enter Nama OPD">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
