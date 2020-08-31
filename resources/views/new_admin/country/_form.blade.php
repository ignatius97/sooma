
    <form action="{{  Setting::get('admin_delete_control') == YES ? '#' : route('admin.country.save') }}" method="POST" enctype="multipart/form-data" role="form">

        <div class="box-body">

           <input type="hidden" name="channel_id" value="{{ $channel_details->id }}">
            

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name" class="control-label">Country*</label>
                    <input type="text" required class="form-control" id="name" name="country_name" placeholder="Country Name" minlength="4" title="Min length must be an 4 characters" value="{{$channel_details->country_name}}">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">                        
                    <label for="description" class="control-label">{{ tr('description') }} *</label>
                    <textarea required class="form-control" id="description" name="description" placeholder="{{ tr('description') }}" required>{{ $channel_details->description }}</textarea> 
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">                        
                    <label for="picture" class="control-label">Upload Country Flag *</label>
                    <input type="file" accept="image/png, image/jpeg" id="picture" name="picture" placeholder="{{ tr('picture') }}" @if(!$channel_details->id) required @endif>
                    <p class="help-block">{{ tr('image_validate') }} {{ tr('image_square') }}</p>

                    @if($channel_details->picture)
                        <img style="height: 90px;margin-bottom: 15px; border-radius:2em;" src="{{ $channel_details->picture }}">
                    @endif
                </div>
            </div>

        </div>

        <div class="box-footer">
            <a href="" class="btn btn-danger">{{ tr('reset') }}</a>
            <button type="submit" class="btn btn-success pull-right" @if(Setting::get('admin_delete_control') == YES) disabled @endif>{{ tr('submit') }}</button>
        </div>

    </form>