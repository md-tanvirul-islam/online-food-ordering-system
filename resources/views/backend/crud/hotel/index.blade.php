@extends('backend.layouts.master_tem')

@section('title', 'Admin: Hotels List')

@section('content')

    <h1 class="h3 mb-2 text-gray-800" style="text-align:center;">List of Hotels</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6   class="m-0 font-weight-bold text-primary"><a href="{{ route('hotel_lists.create') }}" style="color:white;" class="btn btn-primary">Add Hotel</a></h6>
        </div>
        @if(count($hotels) == 0)
            <h3>No Record Found. Add some records</h3>
        @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>name</th>
                            <th>Manager</th>
                            <th>Manager Mail</th>
                            <th>Phone</th>
                            <th>Division</th>
                            <th>Star</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $i = 0
                        @endphp
                        @foreach($hotels as $hotel)
                            <tr>
                                <td> {{++$i}}</td>
                                <td>{{$hotel->name}}</td>
                                @php
                                $manager = \App\User::where('id','=',"$hotel->user_id")->first();

                                @endphp
                                <td>{{$manager->name}}</td>
                                <td>{{$manager->email}}</td>
                                <td>{{$hotel->mobile1}}</td>
                                @php
                                    $division = \App\LocationDivision::where('id','=',"$hotel->division_id")->first();
                                @endphp
                                <td>{{$division->name}}</td>
                                <td>{{$hotel->star}}</td>

                                <td >


                                    <a href="{{ route('hotel_lists.show', [$hotel->id]) }}" style="color:black;" class="btn btn-info">
                                        Details
                                    </a>
                                    <a href="{{ route('hotel_lists.edit', [$hotel->id]) }}" style="color:black;" class="btn btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('hotel_lists.destroy', [$hotel->id]) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" disabled class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</button>
                                    </form>

                                    <a href="{{ route('Admin.hotel.rooms.index',[$hotel->id]) }}" style="color:white;" class="btn btn-info">Rooms</a>
                                    <a href="{{ route('Admin.hotel.booking.index',[$hotel->id]) }}" style="color:white;" class="btn btn-success">Bookings</a>

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
