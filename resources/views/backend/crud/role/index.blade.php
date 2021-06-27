@extends('backend.layouts.master_tem')

@section('title', 'Role List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Role</h1>
    @include('frontend.message')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6   class="m-0 font-weight-bold text-primary"><a href="{{ route('roles.create') }}" style="color:white;" class="btn btn-primary">Add Role</a></h6>
        </div>
        @if(count($roles) == 0)
            <h3>No Record Found. Add some records</h3>
        @else

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">name</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach($roles as $role)
                        <tr>
                            <td style="text-align: center"> {{++$i}}</td>
                            <td style="text-align: center">{{ $role->name }}</td>

                            <td style="text-align: center">

                                <a href="{{ route('roles.edit', [$role->id]) }}" style="color:black;" class="btn btn-warning">
                                   Edit
                                </a>


                                <form action="{{ route('roles.destroy', [$role->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
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
