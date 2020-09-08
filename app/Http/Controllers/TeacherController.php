<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\VideoTapeRepository as VideoRepo;

use App\Jobs\BellNotificationJob;

use App\Http\Requests;

use App\Helpers\Helper;

use App\Settings;

use App\User;
use App\Curriculum;
use App\Classes;

use App\Wishlist;

use App\Page;

use App\Flag;

use App\Admin;

use Auth;

use DB;

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


        return view('teacher.channels.assignment')->with('page', 'channels')
                ->with('subPage', 'channel_list')
                ->with('trendings', $trendings)
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

            return view('teacher.channels.index')
                        ->with('page' , 'channels_'.$id)
                        ->with('subPage' , 'channels')
                        ->with('channel' , $channel)
                        ->with('live_videos', $live_videos)
                        ->with('videos' , $videos)
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

        if((count($channels) == 0 || Setting::get('multi_channel_status'))) {

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




}