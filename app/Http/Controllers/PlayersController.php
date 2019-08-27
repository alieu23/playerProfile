<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Player::latest()->paginate(3);
        return view('player.index',compact('data'))
        ->with('i',(request()->input('page',1)-1)*5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' =>'required',
            'lastname' =>'required',
            'image'=>'image|max:2048',
            'phone' =>'required',
            'position' =>'required'
        ]);
        $image=$request->file('image');
        $new_image=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_image);
        
        $player = array(
         'firstname'=>$request->firstname,
         'lastname'=>$request->lastname,
         'image'=>$new_image,
         'address'=>$request->address,
         'phone'=>$request->phone,
         'dob'=>$request->dob,
         'position'=>$request->position,
         'height'=>$request->height
        );
        Player::create($player);
        return redirect('player')->with('success','Registeration Successful!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Player::find($id);
        return view('player.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Player::findOrFail($id);
        return view('player.edit',compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != ""){
           $request->validate([
              'firstname'=> 'required',
              'lastname' => 'required',
              'image'=>'image|max:2048',
              'phone' =>'required',
              'position' =>'required'
              
           ]);
           $image_name = rand(). '.'. $image->getClientOriginalExtension();
           $image->move(public_path('image'),$image_name);
        }
        else{
            $request->validate([
                'firstname'=> 'required',
                'lastname' => 'required'
            ]);
        }

        $form_data = array(
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'image'=>$image_name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'position'=>$request->position,
            'height'=>$request->height
        );
        Player::whereId($id)->update($form_data);
        return redirect('player')->with('success','Record Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $data = Player::findOrFail($id);
        $data->delete();
        return redirect('player')->with('success','Data Deleted Successfully!');
    }
}
