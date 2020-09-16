
    <form action="{{  Setting::get('admin_delete_control') == YES ? '#' : route('admin.classes.save') }}" method="POST" enctype="multipart/form-data" role="form">

<div class="box-body">

    <input type="hidden" name="channel_id" value="{{$curriculum_details->id}}">


     <div class="col-sm-6">
        <div class="form-group">
            <label for="name" class="control-label">Class*</label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Class Name" minlength="6" title="Min length must be an 6 character" value="{{$curriculum_details->name }}">
        </div>
    </div>

    <div class="col-sm-6">

        <div class="form-group"> 

            <label for="name" class="control-label ">Country *</label>

            
                <select id="user_id" name="country" class="form-control" required data-placeholder="{{$curriculum_details->country?$curriculum_details->country:'Select Country'}}">
                    <option value="{{$curriculum_details->country_name?$curriculum_details->country_name:''}}"></option>
                    @foreach($country_details as $user)
                        <option value="{{ $user->id }}">{{ $user->country_name }}</option>
                    @endforeach
                </select>   

        </div>

    </div>

    <div class="col-sm-6" >

        <div class="form-group"> 

            <label for="name" class="control-label">Curriculum *</label>

            
            
                <select id="main_cur" name="curriculum" class="form-control curriculum" required data-placeholder="{{$curriculum_details->curriculum?$curriculum_details->curriculum:'Select Curriculum'}}">
                    <option value=""></option>
                    @foreach($curriculum as $user)
                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                    @endforeach
                </select>   

        </div>

    </div>





</div>

<div class="box-footer">
    <a href="" class="btn btn-danger">{{ tr('reset') }}</a>
    <button type="submit" class="btn btn-success pull-right" @if(Setting::get('admin_delete_control') == YES) disabled @endif>{{ tr('submit') }}</button>
</div>

</form>