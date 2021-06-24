
<div class="form-row">
    <div class="form-group col-6">
        {!! Form::label('name','Hotel name:') !!}
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group col-4">

        {!! Form::label('email','Manager Email:') !!}
        <small style="color: red">( First Create a Manager Account )</small>
        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
    </div>

    <div class="form-group col-2">
        {!! Form::label('star','Hotel Star:') !!}
        {!! Form::number('star',null,['class'=>'form-control','required']) !!}
    </div>
</div>



<div style="margin-top: 20px" >
            <strong>Hotel Location:</strong>
        <div class="form-row ">
            <div class="form-group col">
                <label for="id_hotel_address_division">Division:</label>
                <select name="division_id" class="form-control" required id="id_hotel_address_division">
                    <option value="#">---------</option>
                    @foreach($divisions as $division)
                        <option value="{{$division->id}}">{{$division->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col">
                <label for="id_hotel_address_district">District:</label>
                <select name="district_id" class="form-control" required id="id_hotel_address_district">
                    <option value="#">---------</option>
                    @foreach($districts as $district)
                        <option value="{{$district->id}}"> {{$district->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
                {!! Form::label('local_address','Local Address:') !!}
                {!! Form::text('local_address',null,['class'=>'form-control','required']) !!}
        </div>


</div>
<div style="margin-top: 20px">
       <strong>Contract Numbers</strong>
    <div class="form-row" >
        <div class="form-group col-4">
            {!! Form::label('telephone','Telephone No:') !!}
            {!! Form::text('telephone',null,['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group col-4">
            {!! Form::label('mobile1','Mobile No:') !!}
            {!! Form::text('mobile1',null,['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group col-4">
            {!! Form::label('mobile2','Another Mobile No:') !!}
            {!! Form::text('mobile2',null,['class'=>'form-control','required']) !!}
        </div>
    </div>
</div>



<div style="margin-top: 20px">
    <strong style="padding: 5px">Hotel Facilities</strong>
    <div class="form-row ">
            <div class="form-group col-2 text-center" >
                <h5>Free Breakfast</h5>
                {!! Form::label('free_breakfast','yes') !!}
                {!! Form::radio('free_breakfast', '1') !!}<br>
                {!! Form::label('free_breakfast','No') !!}
                {!! Form::radio('free_breakfast', '0') !!}
            </div>

        <div class="form-group col-2 text-center" >
            <h5>Private Parking Space</h5>
            {!! Form::label('private_parking','yes') !!}
            {!! Form::radio('private_parking', '1') !!}<br>
            {!! Form::label('private_parking','No') !!}
            {!! Form::radio('private_parking', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Car Rental Service</h5>
            {!! Form::label('car_rental','yes') !!}
            {!! Form::radio('car_rental', '1') !!}<br>
            {!! Form::label('car_rental','No') !!}
            {!! Form::radio('car_rental', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Swimming Pool</h5>
            {!! Form::label('swimming_pool','yes') !!}
            {!! Form::radio('swimming_pool', '1') !!}<br>
            {!! Form::label('swimming_pool','No') !!}
            {!! Form::radio('swimming_pool', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Call on Doctor</h5>
            {!! Form::label('call_on_doctor','yes') !!}
            {!! Form::radio('call_on_doctor', '1') !!}<br>
            {!! Form::label('call_on_doctor','No') !!}
            {!! Form::radio('call_on_doctor', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Fitness Gym</h5>
            {!! Form::label('gym','yes') !!}
            {!! Form::radio('gym', '1') !!}<br>
            {!! Form::label('gym','No') !!}
            {!! Form::radio('gym', '0') !!}
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-2 text-center" >
            <h5>Restaurant In the Hotel</h5>
            {!! Form::label('restaurant','yes') !!}
            {!! Form::radio('restaurant', '1') !!}<br>
            {!! Form::label('restaurant','No') !!}
            {!! Form::radio('restaurant', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Spas & Wellness Centers</h5>
            {!! Form::label('spa','yes') !!}
            {!! Form::radio('spa', '1') !!}<br>
            {!! Form::label('spa','No') !!}
            {!! Form::radio('spa', '0') !!}
        </div>

        <div class="form-group col-2 text-center" >
            <h5>Rooms for Meeting</h5>
            {!! Form::label('meeting_room','yes') !!}
            {!! Form::radio('meeting_room', '1') !!}<br>
            {!! Form::label('meeting_room','No') !!}
            {!! Form::radio('meeting_room', '0') !!}
        </div>

        <div class="form-group col-3 text-center" >
            {!! Form::label('about_breakfast','Details about Breakfast:') !!}
            {!! Form::textarea('about_breakfast',null,['class'=>'form-control','rows'=>5,'placeholder'=>'If you offer free breakfast,please tell the details about the breakfast']) !!}

        </div>

        <div class="form-group col-3 text-center" >
            {!! Form::label('other_facilities','Details of other Facilities:') !!}
            {!! Form::textarea('other_facilities',null,['class'=>'form-control','rows'=>5,'placeholder'=>'If your hotel have other facilities,you can list the here.']) !!}

        </div>

    </div>
</div>


