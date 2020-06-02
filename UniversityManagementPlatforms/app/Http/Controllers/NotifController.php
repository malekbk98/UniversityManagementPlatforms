<?php

namespace App\Http\Controllers;

use App\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->validate($this->validationRules());
        $data['status']='new';
        $notif = Notif::create($data);
        if(str_contains(redirect()->back()->content(),'student')){
            return redirect('/students_review')->with('alert', 'Notification Sent!');
        }else{
            return redirect('/teachers_review')->with('alert', 'Notification Sent!');
        }
    }


    public function notif_group(Request $request)
    { 
        $data = $request->validate($this->GrpvalidationRules());
        $ids=$data['checked'];
        $aux['message']=$data['message'];
        $aux['title']=$data['title'];
        $aux['status']='new';
        $aux['user_id']=null;
        foreach($ids as $id){
            $aux['user_id']=$id;
            Notif::create($aux);
        }
        if(str_contains(redirect()->back()->content(),'student')){
            return redirect('/students_lists')->with('alert', 'Notification Sent!');
        }else{
            return redirect('/teachers_lists')->with('alert', 'Notification Sent!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function show(Notif $notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function edit(Notif $notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notif $notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notif $notif)
    {
        //
    }
    private function validationRules()
    {
        return [
            'title' => 'required|string',
            'message' => 'required|string',
            'user_id' => 'required|string',            
        ];
    }
    private function GrpvalidationRules()
    {
        return [
            'title' => 'required|string',
            'message' => 'required|string',
            'checked' => 'required',
        ];
    }
}
