@extends('backend.layouts.master_tem')

@section('title', 'Admin: User List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6   class="m-0 font-weight-bold text-primary"><a href="{{ route('users.create') }}" style="color:white;" class="btn btn-primary">Create User</a>
                @if(Request::path() == "admin/users/managers")
                    <a href="{{ route('users.index') }}" style="color:white;" class="btn btn-info">All User</a>
                    <a href="{{ route('users.customer') }}" style="color:white;" class="btn btn-success">Customer List</a>
                    <a href="{{ route('users.admin') }}" style="color:white;" class="btn btn-secondary">Admin List</a>
                @elseif(Request::path() == "admin/users/customers")
                    <a href="{{ route('users.index') }}" style="color:white;" class="btn btn-info">All User</a>
                    <a href="{{ route('users.manager') }}" style="color:white;" class="btn btn-primary">Manager List</a>
                    <a href="{{ route('users.admin') }}" style="color:white;" class="btn btn-secondary">Admin List</a>
                @elseif(Request::path() == "admin/users/admins")
                    <a href="{{ route('users.index') }}" style="color:white;" class="btn btn-info">All User</a>
                    <a href="{{ route('users.customer') }}" style="color:white;" class="btn btn-success">Customer List</a>
                    <a href="{{ route('users.manager') }}" style="color:white;" class="btn btn-dark">Manager List</a>
                @else
                    <a href="{{ route('users.manager') }}" style="color:white;" class="btn btn-info">Manager List</a>
                    <a href="{{ route('users.customer') }}" style="color:white;" class="btn btn-success">Customer List</a>
                    <a href="{{ route('users.admin') }}" style="color:white;" class="btn btn-secondary">Admin List</a>
                @endif


            </h6>
        </div>
        @if(count($users) == 0)
            <h3>No Record Found. Add some records</h3>
        @else

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">name</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Role</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td style="text-align: center"> {{++$i}}</td>
                            <td style="text-align: center">{{ $user->name }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                            @php
                                $user = \App\User::find($user->id);
                                $role_id= $user->role_id;
                                $role = \App\Role::find($role_id);
                            @endphp
                            <td style="text-align: center">{{ $role->name }}</td>

                            <td style="text-align: center">

                                <a href="{{ route('users.edit', [$user->id]) }}" style="color:black;" class="btn btn-warning">
                                   Edit
                                </a>

                                <a href="{{ route('users.show', [$user->id]) }}" style="color:black;" class="btn btn-info">
                                    Profile
                                </a>


                                <form action="{{ route('users.destroy', [$user->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" disabled class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>


@endsection
