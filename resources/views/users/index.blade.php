@extends('layouts.template')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
            <table id="users" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nomor</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="#" ><i class="fas fa-trash-alt" style="color:red" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}"></i></a>

                        <!-- Delete Modal-->

                        <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-primary" href="{{ route('users.destroy', $user->id) }}">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#users').DataTable({
                "pageLength": 10,
                "lengthChange": false
            })
        } );

    </script>
@endsection
