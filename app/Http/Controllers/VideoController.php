<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;
use App\Models\Doctors;
use App\Models\User;
use DB;
use Auth;
// use FFMpeg\Filters\Video\VideoFilters;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (Auth::user()->hasRole('admin') ) {
            $doctor_details =DB::select('SELECT doctors.firstname,videos.doctor_instruction,doctors.city,doctors.lastname,doctors.soid,videos.video_path FROM videos INNER JOIN doctors ON videos.drid = doctors.id where videos.dr_video_status="Approved";'); 
            $so_details=DB::select('select firstname,lastname,id from users');
            //dd($doctor_details);/* VideoModel::select('video.*',"video_user.firstname as videouserfirstname","video_user.lastname as videouserlastname","approvebyuser.firstname as approvebyuserfirstname","approvebyuser.lastname as approvebyuserlastname")->join('mapping_user', 'video.created_by', '=', 'mapping_user.user_id')->join('users as video_user', 'video.created_by', '=','video_user.id')->join('users as approvebyuser', 'video.created_by', '=','approvebyuser.id')->latest()->paginate(10);*/
           
        } elseif (Auth::user()->hasRole('so')) {
            $id=Auth::user()->hasRole('so');
            $id=Auth::user()->id;
            // $videos = VideoModel::latest()->paginate(10);
            $videos=DB::select('select * from doctors inner join videos on doctors.id = videos.drid where videos.so_id=?',[$id]);
            //dd($videos);// $vid=DB::select('select * from users inner join doctors On users.id = doctors.soid where doctors.soid=?',[$id]);// $videos = DB::table('doctors')// ->selectRaw()// ->where('id','=',1)// ->get();/*VideoModel::select('video.*')/*->join('mapping_user', 'video.created_by', '=', 'mapping_user.user_id')->where('mapping_user.mapping_user_id', \Auth::user()->id)->latest()  ->paginate(10);*/
            
        }
       
        if (Auth::user()->hasRole('admin') ) {
            return view('video.index', compact('doctor_details','so_details'));
        } elseif (Auth::user()->hasRole('so')) {
            return view('video.index', compact('videos'));
        }
    }
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    
        $video = $request->file('video');
        // Generate a custom name for the video
        $customName = 'video_' . time() . '.' . $video->getClientOriginalExtension();
        // Store the video in the public folder with the custom name
        // $video->storeAs('public/videos', $customName);    
        $destinationPath = 'uploads/videos';
        $video->move($destinationPath, $customName);
    
        $video_insert = VideoModel::create([
            "video_path" => $customName,
            "created_by" => auth()->id(),
            "created_at" => date("Y-m-d H:i:s")
        ]);
    
        $request->session()->flash('success', 'Data inserted successfully.');
        return redirect()->route('videocreate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        
       
        $status = $request->input("status");
       
        $video = VideoModel::where("video_id",$id)->first();
        $video->status=$status;
        $video->save();
        // $video->update($input);
       
        return redirect()->route('videoList')
                        ->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updatevideo(request $id)
    {
        // echo $id->id;// dd($id);//DB::connection()->enableQueryLog();
        DB::table('videos')->where('id', $id->id)->update(array('dr_video_status' => 'Approved'));
        return redirect()->route('videoList');
        //$queries = \DB::getQueryLog();// dd($queries);
    }
    public function rject(request $id){
       // echo $id->id;// dd($id);//DB::connection()->enableQueryLog();
        DB::table('videos')->where('id', $id->id)->update(array('dr_video_status' => 'rject'));
        return redirect()->route('videoList');
        //$queries = \DB::getQueryLog();// dd($queries);
    }
}
