<div class="form-row">
    <div class="col-md-6 col-sm-6 mb-4">
        <label for="name"><b>Enter category Name:</b></label>
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder' => 'e.g. Burger or Fastfood']) !!}
    </div>
    <div class="col-md-6 col-sm-6 mb-4">
        <b>Status:</b> <br><br>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="1" name="is_active"  
                @if (\Route::currentRouteName()=== 'categories.edit')
                    {{ $category->is_active == 1 ?'checked':null }}                       
                @endif > Active
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="0" name="is_active"
                @if (\Route::currentRouteName()=== 'categories.edit')                
                    {{ $category->is_active== 0 ?'checked':null }}             
                @endif > Inactive
            </label>
        </div>
    </div>
    
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="description"><b>Write a short note :</b></label>
        {!! Form::textarea('description',null,['class'=>'form-control', 'rows'=>"7",'placeholder' => "Please describe the category in few words"]) !!}
    </div>
    <div class="col-md-6 mb-3">




