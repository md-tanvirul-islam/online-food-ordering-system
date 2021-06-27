@role('admin')
    <div class="form-row">
        <div class="col-md-12 col-sm-6 mb-6">
            <label for="restaurant_id"><b>Select Restaurant:</b></label>
            {!! Form::select('restaurant_id',restaurants(),Null,['placeholder'=>'Select One','class'=>['form-control','select-2']] )!!}
        </div>
    </div><br>
@endrole

@role('manager')
    <div class="form-row d-none">
        <div class="col-md-12 col-sm mb-6">
            {!! Form::select('restaurant_id',restaurants(),Auth::user()->restaurant->id,['placeholder'=>'Select One','class'=>['form-control','select-2']] )!!}
        </div>
    </div><br>
@endrole

<div class="form-row">
    <div class="col-md-6 col-sm-6 mb-4">
        <label for="name"><b>Enter Food Name:</b></label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'e.g. Cheese Burger']) !!}
    </div>
    <div class="col-md-6 col-sm-6 mb-4">
        <label for="category_id"><b>Food Category:</b></label>
        {!! Form::select('category_id',categories(),Null,['placeholder'=>'Select One','class'=>['form-control','select-2']] )!!}
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="price"><b>Price($):</b></label>
        {!! Form::text('price',null,['class'=>'form-control','required','placeholder' => 'e.g. 20']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <label for="discount_in_percent"><b>Discount(%):</b></label>
        {!! Form::text('discount_in_percent',null,['class'=>'form-control','required','placeholder' => 'e.g. 5']) !!}
    </div>
    <div class="col-md-4 mb-3">
        <b>Status:</b> <br><br>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="1" name="is_active"  
                @if (\Route::currentRouteName()=== 'food.edit')  
                    {{ $food->is_active == 1 ?'checked':null }}                       
                @endif > Active
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="0" name="is_active"
                @if (\Route::currentRouteName()=== 'food.edit')                
                    {{ $food->is_active== 0 ?'checked':null }}             
                @endif > Inactive
            </label>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="description"><b>Write a short note :</b></label>
        {!! Form::textarea('description',null,['class'=>'form-control', 'rows'=>"7",'placeholder' => "Please describe the food in few words"]) !!}
    </div>
    <div class="col-md-6 mb-3">




