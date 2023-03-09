@extends('layouts.template')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="card">
    <div class="card-header">
        <form method="post" action=" {{ route('url.store') }} ">
            @csrf

            <div class="form-row">

                <input type="text" name="user_id" class="form-control" id="user_id" value="{{ $user_id }}" hidden>

                <div class="form-group col">
                    <label for="url">Destination</label>
                    <input type="text" name="link" class="form-control" id="url" placeholder="Enter URL">
                @error('link')
                    <p class="m-0 p-0 text text-danger">{{ $message }}</p>
                @enderror

                </div>


                <div class="form-group col">
                    <label for="custom">Custom back-half </label>
                    <input type="text" name="custom"
                    class="form-control @error('custom')is-invalid @enderror"
                    id="custom"
                    placeholder="Enter Custom">
                @error('custom')
                    <p class="m-0 p-0 text text-danger">{{ $message }}</p>
                @enderror



                </div>
            </div>
            <div class="input-group-addon">
                    <button class="btn btn-success">Generate Shorten Link</button>
            </div>
        </form>

    </div>
    <div class="card-body">
        @csrf @method('delete')
        <table id="url" class="display" style="width: 100%">
        <thead>
            <tr>
                <th scope="col" class="text-center">Nomor</th>
                <th scope="col" class="text-center">Short Link</th>
                <th scope="col" class="text-center">Link</th>
                <th scope="col" class="text-center">Edit</th>
                <th scope="col" class="text-center">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @if (Auth::user()->id === 1)
                @foreach ($allurl as $row)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td><a href="{{ route('url.latestUrl', $row->code) }}" target="_blank">{{ route('url.latestUrl', $row->code) }}</a></td>
                    <td>{{ $row->link }}</td>
                    <td class="text-center">
                        <a href="{{ route('url.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="#"><i class="fas fa-trash-alt" style="color:red" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}"></i></a>
                        <div class="modal fade" id="deleteModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapus data ini?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('url.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-primary" href="{{ route('url.destroy', $row->id) }}">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
                @endforeach
            @else
                @foreach ($url as $row)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td><a href="{{ route('url.latestUrl', $row->code) }}" target="_blank">{{ route('url.latestUrl', $row->code) }}</a></td>
                    <td>{{ $row->link }}</td>
                    <td class="text-center">
                        <a href="{{ route('url.edit', $row->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="#"><i class="fas fa-trash-alt" style="color:red" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}"></i></a>
                        <div class="modal fade" id="deleteModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapus data ini?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('url.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-primary" href="{{ route('url.destroy', $row->id) }}">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('.display').DataTable({
                "pageLength": 5,
                "lengthChange": false
            })
        } );

    </script>
@endsection
