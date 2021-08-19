<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use DataTables;
use Session;

class SongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function getSongs(){

        return view('songs');
    }

    public function getSongsData(Request $request){

        if ($request->ajax()) {

            $data = Song::select('*')->orderBy('song_id', 'DESC');

            return Datatables::of($data)
                    ->addColumn('title', function($row){

                        return $row->title;

                    })->addColumn('artist', function($row){
                        
                        return $row->artist;

                    })->addColumn('lyrics', function($row){
                        
                        return $row->lyrics;

                    })->addColumn('created', function($row){
                            
                        return date("Y-m-d", strtotime($row->created_at));

                    })
                    ->addColumn('action', function($row){
     
                        $btn = '<a href="/songs/update/'.$row->song_id.'" id="update" class="edit btn btn-primary btn-sm" data-id="'.$row->song_id.'">Update</a> 
                                <a href="/songs/delete/'.$row->song_id.'" id="update" class="edit btn btn-danger btn-sm" data-id="'.$row->song_id.'">Delete</a>';
       
                        return $btn;
                    })
                    ->rawColumns(['title', 'artist', 'lyrics', 'created', 'action'])
                    ->make(true);
        }
    }

    public function getAddSongs(){

        return view('addSong');
    }

    public function postAddSongs(Request $request){

        $song = new Song;
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->lyrics = $request->lyrics;
        $song->save();

        Session::flash('success', "new song title: ".$song->title." has been added");
        return redirect('/songs');
    }

    public function getUpdateSongs($song_id){

        $song = Song::where('song_id', $song_id)->first();
        return view('updateSong', compact('song'));
    }

    public function postUpdateSongs(Request $request){

        $song = Song::where('song_id', $request->song_id)->first();
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->lyrics = $request->lyrics;
        $song->save();

        Session::flash('success', "new song title: ".$song->title." has been updated");
        return redirect('/songs');
    }

    public function postDeleteSongs($song_id){

        Song::where('song_id', $song_id)->delete();

        Session::flash('success', "song has been successfully deleted");
        return redirect('/songs');
    }

    


}
