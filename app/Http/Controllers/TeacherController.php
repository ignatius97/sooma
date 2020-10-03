<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\VideoTapeRepository as VideoRepo;

use Illuminate\Support\Facades\Storage;

use App\Jobs\BellNotificationJob;

use App\Http\Requests;

use App\Helpers\Helper;

use App\Settings;

use App\User;
use App\Curriculum;
use App\Classes;
use App\Answer;

use App\Assignment;

use App\Wishlist;

use App\Page;

use App\Class_Discusion;

use App\Flag;

use App\Admin;

use Auth;

use DB;
use File;

use Validator;

use View;

use Setting;

use Exception;

use App\ChatMessage;

use Log;

use App\Country;

use App\PayPerView;

use App\Card;

use App\BannerAd;

use App\Subscription;

use App\Channel;

use App\VideoTape;

use App\VideoTapeImage;

use App\Repositories\CommonRepository as CommonRepo;

use App\ChannelSubscription;

use App\UserPayment;

use App\Category;

use App\VideoTapeTag;

use App\Tag;

use App\LiveVideo;

use App\Viewer;

use App\LiveVideoPayment;

use App\Playlist;

use App\PlaylistVideo;

use App\Referral;

use App\UserReferrer;

use App\Redeem;

class TeacherController extends Controller {

    protected $UserAPI;

    protected $Paypal;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserApiController $API, NewUserApiController $NewAPI)
    { 
        $this->UserAPI = $API;
        
        $this->NewUserAPI = $NewAPI;

        $this->middleware(['auth'], ['except' => [
                'master_login',
                'index',
                'single_video',
                'contact',
                'uace',
                'uce',
                'pre_primary',
                'country_curriculum',
                'ple',
                'trending', 
                'channels', 
                'add_history', 
                'page_view', 
                'channel_list', 
                'watch_count', 
                'partialVideos', 
                'payment_mgmt_videos', 
                'forgot_password' ,
                'channel_videos',
                'categories_view',
                'categories_videos',
                'categories_channels',
                'custom_live_videos',
                'single_custom_live_video',
                'tags_videos',
                'all_categories',
                'category_videos',
                'sub_category_videos',
                'android_web_page',
                'live_videos',
                'broadcasting',
                'referrals_signup',
                'channel_view',
                'video_view',
                'playlists_view'

        ]]);

        $this->middleware(['verifyUser'], ['except' => [
            'forgot_password'
        ]]);

    }

    // channel save 


    public function save_channel(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'channel_id' =>$request->id,
            'device_type'=>DEVICE_WEB,
        ]);
       
        $response = CommonRepo::channel_save($request)->getData();

        if($response->success) {
            // $response->message = Helper::get_message(118);
            return redirect(route('user.channel', ['id'=>$response->data->id]))
                ->with('flash_success', $response->message);
        } else {
            
            return back()->with('flash_error', $response->error_messages);
        }

    }


        /**
     * Function Name : channels()
     *
     * @uses To list out channels which is created by all the users
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param object $request - User Details
     *
     * @return channel details details
     */
    public function channels(Request $request){

        if(Auth::check()) {

            $request->request->add([ 
                'id' => \Auth::user()->id,
                'token' => \Auth::user()->token,
                'device_token' => \Auth::user()->device_token,
                'age'=>\Auth::user()->age_limit,
            ]);

        }

        $response = $this->UserAPI->channel_list($request)->getData();
         $trendings = $this->UserAPI->trending_list($request)->getData();


        return view('teacher.channels.list')->with('page', 'channels')
                ->with('subPage', 'channel_list')
                ->with('trendings', $trendings)
                ->with('response', $response);

    }    

    public function channel_assignment(Request $request){

        
        $response = $this->UserAPI->channel_list($request)->getData();
        $trendings = $this->UserAPI->trending_list($request)->getData();
        $assignment=Assignment::where('id', $request->assignment_id)->get();

        $answers=Answer::join('users', 'answers.user_id', '=', 'users.id')->where('answers.assignment_id', $request->assignment_id)->get();


        return view('teacher.channels.assignment')->with('page', 'channels')
                ->with('subPage', 'channel_list')
                ->with('trendings', $trendings)
                ->with('answers', $answers)
                ->with('channel_id', $request->channel_id)
                ->with('assignment_id', $request->assignment_id)
                ->with('assignment', $assignment)
                ->with('response', $response);

    }

        /**
     * Function Name : playlists_index()
     *
     * @uses To list out playlists which is created by the users
     *
     * @created 
     *
     * @updated 
     *
     * @param object $request - User Details
     *
     * @return channel details details
     */
    public function playlists_index(Request $request){

        if(Auth::check()) {
            
            $request->request->add([ 
                'id' => \Auth::user()->id,
                'token' => \Auth::user()->token,
                'device_token' => \Auth::user()->device_token,
                'age'=>\Auth::user()->age_limit,
            ]);
        }

        $response = $this->UserAPI->playlists($request)->getData();
        // $response = $this->UserAPI->playlists_index($request)->getData();

        return view('teacher.playlist.list')->with('page', 'channels')
                ->with('subPage', 'channel_list')
                ->with('response', $response);

    }

        /**
     * Function Name : channel_view()
     *
     * @uses Based on the channel id , channel related videos will display
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param integer $id : Channel Id
     *
     * @return channel videos list
     */
    public function channel_view($id , Request $request) {

        $channel = Channel::where('id', $id)->first();

        if ($channel) {

            $request->request->add([ 
                'age' => \Auth::check() ? \Auth::user()->age_limit : "",
                'id'=> \Auth::check() ? \Auth::user()->id : "",
                'channel_id'=> $id,
                'view_type' => \Auth::check() ? \Auth::user()->id == $channel->user_id ? VIEW_TYPE_OWNER : VIEW_TYPE_VIEWER : VIEW_TYPE_VIEWER 
            ]);
            
            if ($request->id != $channel->user_id || !Auth::check()) {

                if ($channel->status == USER_CHANNEL_DECLINED || $channel->is_approved == ADMIN_CHANNEL_DECLINED) {

                    return redirect()->to('/')->with('flash_error', tr('channel_declined'));
                }
 
            }

            $videos = $this->UserAPI->channel_videos($id, 0 , $request)->getData();

            $channel_owner_id = Auth::check() ? ($channel->user_id == Auth::user()->id ? $channel->user_id : "") : "";

            $trending_videos = $this->UserAPI->channel_trending($id, 4 , $channel_owner_id , $request)->getData();
            
            $channel_playlists = $this->UserAPI->playlists($request)->getData();

            $channel_playlists = $channel_playlists->data;
            
            $payment_videos = $this->UserAPI->payment_videos($id, 0)->getData();

            $live_videos = VideoRepo::live_videos_list($id, WEB, null);
             $trendings = $this->UserAPI->trending_list($request)->getData();

            $subscribe_status = false;

            if ($request->id) {

                $subscribe_status = check_channel_status($request->id, $id);
            }

            $subscriberscnt = subscriberscnt($channel->id);

            $live_video_history = [];

            if (Auth::check()) {

                $request->request->add([
                    'skip'=>0,
                    'channel_id'=>$id,
                    'id'=>Auth::user()->id,

                ]);

                $live_video_history = $this->UserAPI->live_video_revenue($request)->getData();


            }
             $comment=Class_Discusion::join('users', 'class__discusions.user_id', '=', 'users.id')->where('class__discusions.channel_id', $id)->get();


              $assignment=Assignment::where('channel_id', $id)->get();

            return view('teacher.channels.index')
                        ->with('page' , 'channels_'.$id)
                        ->with('subPage' , 'channels')
                        ->with('comments', $comment)
                        ->with('channel' , $channel)
                        ->with('live_videos', $live_videos)
                        ->with('channel_id', $id)
                        ->with('videos' , $videos)
                        ->with('assignment', $assignment)
                        ->with('trending_videos', $trending_videos)
                        ->with('channel_playlists', $channel_playlists)
                        ->with('payment_videos', $payment_videos)
                        ->with('subscribe_status', $subscribe_status)
                        ->with('trendings', $trendings)
                        ->with('subscriberscnt', $subscriberscnt)
                        ->with('live_video_history', $live_video_history);
        } else {

            return back()->with('flash_error', tr('channel_not_found'));

        }
    }

        /**
     * Function Name : channel_create()
     *
     * @uses To create a channel based on logged in user id  (Form Rendering)
     *
     * @created Vithya R
     *
     * @updated w
     *
     * @return respnse with flash message
     */
    public function channel_create(Request $request) {
        
        $model = new Channel;

        $channels = getChannels(Auth::user()->id);
         $trendings = $this->UserAPI->trending_list($request)->getData();

        if((count($channels) == 0 || count($channels) > 0))  {

            if (Auth::user()->user_type) {

                return view('teacher.channels.create')->with('page', 'channels')
                    ->with('subPage', 'create_channel')->with('model', $model)->with('trendings', $trendings);

            } else {

                return view('teacher.channels.create')->with('page', 'channels')
                    ->with('subPage', 'create_channel')->with('model', $model)->with('trendings', $trendings);

            }

        } else {

            return redirect(route('user.dashboard'))->with('flash_error', tr('channel_create_error'));
        }

    }

        /**
     * Function Name : channel_edit()
     *
     * @uses To edit a channel based on logged in user id (Form Rendering)
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param integer $id - Channel Id
     *
     * @return respnse with Html Page
     */
    public function channel_edit(Request $request, $id) {

        $model = Channel::find($id);
        $trendings = $this->UserAPI->trending_list($request)->getData();

        if (Auth::check()) {

            if ($model) {

                if (Auth::user()->id != $model->user_id) {

                    return redirect(route('user.channel.mychannel'))->with('flash_error', tr('unauthroized_person'));

                }

            }

        }

        return view('teacher.channels.edit')->with('page', 'channels')
                    ->with('trendings', $trendings)
                    ->with('subPage', 'edit_channel')->with('model', $model);

    }

    public function channel_subscribers(Request $request) {

        $list = [];

        $channel_id = $request->channel_id ? $request->channel_id : '';

        $channel = null;

        if ($channel_id) {

            $list[] = $request->channel_id;

            $channel = Channel::find($channel_id);

        } else {

            $channels = getChannels(Auth::user()->id);

            foreach ($channels as $key => $value) {
                $list[] = $value->id;
            }
        }

        $subscribers = ChannelSubscription::whereIn('channel_subscriptions.channel_id', $list)
                        ->select('channel_subscriptions.channel_id as channel_id',
                                'channels.name as channel_name',
                                'users.id as user_id',
                                'users.name as user_name',
                                'users.picture as user_image',
                                'channel_subscriptions.id as subscriber_id',
                                'channel_subscriptions.created_at as created_at')
                        ->leftJoin('channels', 'channels.id', '=', 'channel_subscriptions.channel_id')
                        ->leftJoin('users', 'users.id', '=', 'channel_subscriptions.user_id')
                        ->orderBy('created_at', 'desc')
                        ->paginate();

        return view('teacher.channels.subscribers')->with('page', 'channels')->with('subPage', 'subscribers')->with('subscribers', $subscribers)->with('channel_id', $channel_id)->with('channel', $channel);

    }

        /**
     * Function Name : subscribed_channels()
     *
     * @uses To list otu  subscribed channels based on logged in users
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param object $request - user details
     *
     * @return json response details
     */
    public function subscribed_channels(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
        ]);     
        $trendings = $this->UserAPI->trending_list($request)->getData();   

        if ($request->id) {

            $channel_id = ChannelSubscription::where('user_id', $request->id)->pluck('channel_id')->toArray();

            $request->request->add([ 
                'channel_id' => $channel_id,
            ]);        
        }

        $response = $this->UserAPI->channel_list($request)->getData();

        // dd($response);

        return view('teacher.channels.list')->with('page', 'channels')
                ->with('subPage', 'channel_list')
                ->with('trendings', $trendings)
                ->with('response', $response);

    }

        /**
     * Function Name : my_channels()
     *
     * @uses To list out channels based on logged in users
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param Object $request - User Details
     *
     * @return json response details
     */
    public function my_channels(Request $request) {

        $request->request->add([
            'id'=>Auth::user()->id,
        ]);

        $response = $this->UserAPI->user_channel_list($request)->getData();
         $trendings = $this->UserAPI->trending_list($request)->getData();


         return view('teacher.channels.list')->with('page', 'my_channel')
                ->with('subPage', 'channel_list')
                ->with('trendings', $trendings)
                ->with('response', $response);
    }

        /**
     *
     * Function name: channel_playlists_save()
     *
     * @uses get the playlists
     *
     * @created Anjana H
     *
     * @updated Anjana H
     *
     * @param integer channel_id (Optional)
     *
     * @return JSON Response
     */
    public function channel_playlists_save(Request $request) {
        
        try {
            
            DB::beginTransaction();

            $request->request->add([
                'id'=> Auth::user()->id,
                'token'=> Auth::user()->token, 
            ]); 
            
            $request->request->add([
                'playlist_type'=> $request->playlist_type ?: PLAYLIST_TYPE_USER,
                'playlist_display_type'=> $request->playlist_display_type ?: PLAYLIST_DISPLAY_PRIVATE
            ]);

            $response = $this->NewUserAPI->playlists_save($request)->getData();

            if($response->success) {

                $response->playlist_id = $response->data->playlist_id;

                $playlist_details = $response->data;

                $response->title = $response->data->title;

                $new_playlist_content = '';

                if(!empty($request->video_tapes_id)) {
                    // Remove unselected videos from playlists

                    PlaylistVideo::where('playlist_id', $response->playlist_id)->whereNotIn('video_tape_id', $request->video_tapes_id)
                                    ->where('user_id', $request->id)
                                    ->delete();

                    foreach ($request->video_tapes_id as $key => $video_tape_id) {

                        // Check the video already added in playlist

                        $check_video = PlaylistVideo::where('video_tape_id', $video_tape_id)->where('playlist_id', $response->playlist_id)->count();

                        if(!$check_video) {

                            $playlist_video_details = new PlaylistVideo;

                            $playlist_video_details->playlist_id = $response->playlist_id;

                            $playlist_video_details->video_tape_id = $video_tape_id;
                            
                            $playlist_video_details->user_id = $request->id;

                            $playlist_video_details->status = DEFAULT_TRUE;
                            
                            $playlist_video_details->save();

                        }
                    }

                    $response->data->total_videos =PlaylistVideo::where('playlist_id',$playlist_details->playlist_id)->count();

                    $first_video_from_playlist= PlaylistVideo::where('playlist_videos.playlist_id', $playlist_details->playlist_id)
                                                ->leftJoin('video_tapes', 'video_tapes.id', '=', 'playlist_videos.video_tape_id')
                                                ->select('video_tapes.id as video_tape_id', 'video_tapes.default_image as picture')
                                                ->first();

                    $response->data->picture = $first_video_from_playlist ? $first_video_from_playlist->picture : asset('images/playlist.png');

                    $new_playlist_content = view('teacher.channels.playlist_append')->with('channel_playlist_details', $response->data)->render();

                    $response->new_playlist_content = $new_playlist_content;

                }

                DB::commit();

                return response()->json($response);   

            }

            throw new Exception($response->error, $response->error_code);

        } catch(Exception $e) {
            
            DB::rollback();

            $error = $e->getMessage();

            $error_code = $e->getCode();

            $response = ['success' => false, 'error' => $error, 'error_code' => $error_code];
       
            return response()->json($response);

        }
    
    }



 /**
     * Function Name : channel_delete()
     *
     * @uses To delete a channel based on logged in user id & channel id (Form Rendering)
     *
     * @created Vithya R
     *
     * @updated 
     *
     * @param integer $request - Channel Id
     *
     * @return response with flash message
     */
    public function channel_delete(Request $request) {

        $channel = Channel::where('id' , $request->id)->first();

        if($channel) {  

            if (Auth::check()) {

                if (Auth::user()->id != $channel->user_id) {

                    return redirect(route('user.channel.mychannel'))->with('flash_error', tr('unauthroized_person'));

                }
                
            }     

            $channel->delete();

            return redirect(route('user.channel.mychannel'))->with('flash_success',tr('channel_delete_success'));

        } else {

            return back()->with('flash_error',tr('something_error'));

        }

    }

    //Video upload form


     public function video_upload(Request $request) {

        $model = new VideoTape;

        $id = $request->id;

        $categories_list = $this->UserAPI->categories_list($request)->getData();
        $categories_class = Classes::all();
         $trendings = $this->UserAPI->trending_list($request)->getData();

        $tags = $this->UserAPI->tags_list($request)->getData()->data;
         $curriculum=Curriculum::all();
         $con=Country::all();

        $channel = '';

        if (Auth::check()) {

            $channel = Channel::where('user_id', Auth::user()->id)->where('id', $id)->first();

            if(!Auth::user()->user_type) {

                return view('teacher.videos.create')->with('model', $model)->with('page', 'videos')
            ->with('subPage', 'upload_video')->with('id', $id)
            ->with('trendings', $trendings)
            ->with('categories', $categories_list)
            ->with('classes', $categories_class)
            ->with('curriculum', $curriculum)
            ->with('con', $con)
            ->with('tags', $tags);
            }
            
        }

        if (!$channel) {

            return redirect(route('user.channel.mychannel'))->with('flash_error', tr('unauthroized_person'));
        }

        

        return view('teacher.videos.create')->with('model', $model)->with('page', 'videos')
            ->with('subPage', 'upload_video')->with('id', $id)
            ->with('trendings', $trendings)
            ->with('categories', $categories_list)
             ->with('curriculum', $curriculum)
            ->with('con', $con)
            ->with('classes', $categories_class)
            ->with('tags', $tags);
    
    }

    //video save 
    public function video_save(Request $request) {

        $response = CommonRepo::video_save($request)->getData();

        if ($response->success) {

            $view = '';

            if ($response->data->video_type == VIDEO_TYPE_UPLOAD) {

                $tape_images = VideoTapeImage::where('video_tape_id', $response->data->id)->get();

                $view = \View::make('user.videos.select_image')
                        ->with('model', $response)
                        ->with('tape_images', $tape_images)
                        ->render();

            }

            $message = tr('user_video_upload_success');

            // Check the video status 

            if($response->data->is_approved == DEFAULT_FALSE) {

                $message = tr('user_video_upload_waiting_for_admin_approval');

            }

            \Session::set('flash_message_ajax' , $message);

            return response()->json(['success'=>true, 'path'=>$view, 'data'=>$response->data , 'message' => 'Successfull uploaded'], 200);

        } else {

            return response()->json($response);

        }

    }  

    // save default image 

     public function save_default_img(Request $request) {

        $response = CommonRepo::set_default_image($request)->getData();

        return response()->json($response);

    }



    public function user_subscription_save($s_id, $u_id) {

        $response = CommonRepo::save_subscription($s_id, $u_id)->getData();

        if($response->success) {

            return redirect()->route('user.subscriptions')->with('flash_success', $response->message);

        } else {

            return back()->with('flash_error', $response->message);

        }

    } 



    public function upload_video_image(Request $request) {

        $response = CommonRepo::upload_video_image($request)->getData();

        return response()->json($response);
    }


 public function ad_request(Request $request) {

        if($data = VideoTape::find($request->id)) {

            $data->ad_status  = $data->ad_status ? 0 : 1;

            if($data->save()) {

                if($data->getVideoAds) {

                    $data->getVideoAds->status = $data->ad_status;

                    $data->getVideoAds->save();
                }
            }

            return response()->json(['status'=>$data->ad_status, 'success'=>true], 200);

        } else {

            return response()->json(['success'=>false], 200);
            
        }
    
    }


public function video_delete($id) {

        if($video = VideoTape::where('id' , $id)->first())  {

            if (Auth::check()) {

                if (Auth::user()->id != $video->user_id) {

                    return redirect(route('user.channel.mychannel'))->with('flash_error', tr('unauthroized_person'));

                }
                
            }    

            Helper::delete_picture($video->video, "/uploads/videos/");

            Helper::delete_picture($video->subtitle, "/uploads/subtitles/"); 

            if ($video->banner_image) {

                Helper::delete_picture($video->banner_image, "/uploads/images/");
            }

            Helper::delete_picture($video->default_image, "/uploads/images/");

            if ($video->video_path) {

                $explode = explode(',', $video->video_path);

                if (count($explode) > 0) {


                    foreach ($explode as $key => $exp) {


                        Helper::delete_picture($exp, "/uploads/videos/");

                    }

                }

                

            }

            $video->delete();
        }

        return back()->with('flash_success', tr('video_delete_success'));

    
    }


 public function video_edit(Request $request) {

        $model = VideoTape::find($request->id);

        if($model) {

            if (Auth::check()) {

                if (Auth::user()->id != $model->user_id) {

                    return redirect(route('user.channel.mychannel'))->with('flash_error', tr('unauthroized_person'));

                }
                
            }    

            $model->publish_time = $model->publish_time ? (($model->publish_time != '0000-00-00 00:00:00') ? date('d-m-Y H:i:s', strtotime($model->publish_time)) : null) : null;

            $categories_list = $this->UserAPI->categories_list($request)->getData();

            $tags = $this->UserAPI->tags_list($request)->getData()->data;

            $model->tag_id = VideoTapeTag::where('video_tape_id', $request->id)->where('status', TAG_APPROVE_STATUS)->get()->pluck('tag_id')->toArray();

            return view('user.videos.edit')->with('model', $model)->with('page', 'videos')
                ->with('subPage', 'upload_video')
                ->with('categories', $categories_list)
                ->with('tags', $tags);

        } else {

            return back()->with('flash_error', tr('video_not_found'));

        }
   
    }



 public function get_images($id) {

        $response = CommonRepo::get_video_tape_images($id)->getData();

        $tape_images = VideoTapeImage::where('video_tape_id', $id)->get();

        $view = \View::make('user.videos.select_image')->with('model', $response)
            ->with('tape_images', $tape_images)->render();

        return response()->json(['path'=>$view, 'data'=>$response->data]);

    }  


 public function likeVideo(Request $request)  {
        $request->request->add([
            'id' => Auth::user()->id,
            'token'=>Auth::user()->token
        ]);

        $response = $this->UserAPI->likevideo($request)->getData();

        // dd($response);
        return response()->json($response);

    }

    public function disLikeVideo(Request $request) {

        $request->request->add([ 
            'id' => Auth::user()->id,
            'token'=>Auth::user()->token
        ]);

        $response = $this->UserAPI->dislikevideo($request)->getData();

        return response()->json($response);

    }



public function curriculum_class_select_data($id){

      $curriculum=Classes::join('curricula', 'classes.curricula_id', '=', 'curricula.id')->where('classes.id', $id)->get();

      return $curriculum;

    

}


public function curriculum_class_select_dataa($id){

  $class=Classes::where('country_id' , $id)->get();

    return $class;

}

//Discussion comments 




 public function class_add_comment(Request $request) {

     $response = $this->UserAPI->class_add_comment($request)->getData();
      if($response->success) {

            $response->message = Helper::get_message(118);

        } else {

            $response->success = false;

            $response->message = tr('something_error');
        }

        return response()->json($response);

    
    }



//Assignment Post 


    public function class_add_assignment(Request $request)
    {
        $response=$this->UserAPI->class_add_assignment($request);
        return 1;
    }

//Assignment Edit, save, delete


    public function assignment_edit(Request $request){



        $assignment=Assignment::find($request->assignment_id);


        return view('teacher.channels.assignment_edit')->with('assignment', $assignment);
    }



public function assignment_edit_save(Request $request){


          $assignment=Assignment::find($request->assignment_unique_id);
           if ($assignment) {

            $assignment->title= $request->has('assignment_name') ? $request->assignment_name: '';
            $assignment->text= $request->has('assignment_text') ? $request->assignment_text: '';
        }

        if($request->hasFile('picture')) {
                if($assignment->id)  {

                      if (file_exists(storage_path("app/".$assignment->file))){

                      File::delete(storage_path("app/".$assignment->file));
                    }
                }
                    
                   $file = $request->file('picture');

             $newFilename= $file->getClientOriginalName();

             Storage::disk('local')->put($newFilename, file_get_contents($file));

            $assignment->file=$newFilename;

           }
           else
           {
             $assignment->file= 'No';
           }



        $assignment->save();


        if ($assignment->save()) {
          return 1;
      }
        else
        {
           return 0;
        }

    }


public function assignment_delete(Request $request){


    try {
            
            DB::beginTransaction();

            $assignment = Assignment::find($request->assignment_id);
          

            if(!$assignment) {

                throw new Exception(tr('assignment not found'), 101);
            }

            File::delete(storage_path("app/".$assignment->file));
            
            if ($assignment->delete()) {  

                DB::commit();
              
                return redirect()->route('user.channel', $request->channel_id)->with('flash_success','Assignment deleted successfully');
            
            } 

            throw new Exception(tr('assignment not found'), 101);
            
        } catch (Exception $e) {
            
            DB::rollback();

            $error = $e->getMessage();

            return back()->with('flash_error',$error);
        }    
}







}