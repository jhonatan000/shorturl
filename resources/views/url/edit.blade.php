@extends('layouts.template')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="card">
    <div class="card-header">
        <form method="post" action=" {{ route('url.update', $linkid->id) }} ">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col">
                    <label for="url">Destination</label>
                    <input type="text" name="link" class="form-control" id="url" placeholder="Enter URL" value="{{ $linkid->link }}">
                @error('link')
                    <p class="m-0 p-0 text text-danger">{{ $message }}</p>
                @enderror

                </div>

                <div class="form-group col">
                    <label for="custom">Custom back-half </label>
                    <input type="text" name="custom" class="form-control" id="custom" placeholder="Enter Custom" value="{{ $linkid->code }}">
                @error('custom')
                    <p class="m-0 p-0 text text-danger">{{ $message }}</p>
                @enderror

                </div>
            </div>
            <div class="input-group-addon">
                    <button type="submit" class="btn btn-success">Ubah URL</button>
            </div>
        </form>

    </div>
</div>
@endsection
