
    <form action="{{  Setting::get('admin_delete_control') == YES ? '#' : route('admin.curriculum.save') }}" method="POST" enctype="multipart/form-data" role="form">

<div class="box-body">

    <input type="hidden" name="channel_id" value="{{$curriculum_details->id}}">

    <div class="col-sm-6">

        <div class="form-group"> 

            <label for="name" class="control-label ">Country *</label>

            
            
                <select id="user_id" name="country" class="form-control select2" required data-placeholder="{{$curriculum_details->country?$curriculum_details->country:'Select Curriculum Country'}}">
                    <option value="{{$curriculum_details->country_name?$curriculum_details->country_name:''}}"></option>
                    @foreach($country_details as $user)
                        <option value="{{ $user->country_name }}">{{ $user->country_name }}</option>
                    @endforeach
                </select>   

        </div>

    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="name" class="control-label">Curriculum*</label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Curriculum Name" minlength="6" title="Min length must be an 6 character" value="">
        </div>
    </div>

   

    <div class="col-sm-12">
        <div class="form-group">                        
            <label for="description" class="control-label">{{ tr('description') }} *</label>
            <textarea required class="form-control" id="description" name="description" placeholder="{{ tr('description') }}" required>{{ $curriculum_details->description }}</textarea> 
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">                        
            <label for="picture" class="control-label">Curriculum Logo *</label>
            <input type="file" accept="image/png, image/jpeg" id="picture" name="picture" placeholder="{{ tr('picture') }}" @if(!$curriculum_details->id) required @endif>
            <p class="help-block">{{ tr('image_validate') }} {{ tr('image_square') }}</p>

            @if($curriculum_details->picture)
                <img style="height: 90px;margin-bottom: 15px; border-radius:2em;" src="{{ $curriculum_details->picture }}">
            @endif
        </div>
    </div>

</div>

<div class="box-footer">
    <a href="" class="btn btn-danger">{{ tr('reset') }}</a>
    <button type="submit" class="btn btn-success pull-right" @if(Setting::get('admin_delete_control') == YES) disabled @endif>{{ tr('submit') }}</button>
</div>

</form>