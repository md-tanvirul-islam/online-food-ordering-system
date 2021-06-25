@extends('layouts.backend_master')

{{-- @section('title', 'Admin: Room List') --}}

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of All Foods</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('food.create') }}" title="Add Food" style="color:black;" class="btn btn-sm btn-success">
                Add <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
        @if(count($food) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="color: black" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount(%)</th>
                            <th>Is_active</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($food as $fd)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{ $fd->name }}</td>
                                    <td>{{ $fd->category->name }}</td>
                                    <td>${{ $fd->price }}</td>
                                    <td>{{ $fd->discount_in_percent }}</td>
                                    <td>{{ $fd->is_active ? 'Yes' : 'No'}}</td>
                                    <td >
                                        <a href="{{ route('food.show', [$fd->id]) }}" title="Details" style="color:black;" class="btn btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('food.edit', [$fd->id]) }}" title="Edit" style="color:black;" class="btn btn-warning">
                                            <i class="fas fa-edit    "></i>
                                        </a>

                                        <form action="{{ route('food.destroy', [$fd->id]) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $food->links() !!}
            </div>
        @endif
    </div>


@endsection
