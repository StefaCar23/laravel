<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContentsController extends Controller
{
    //
    public function home(Request $request)
    {
        $data = [];
        $data['version'] = '0.1.2';
        $data['name'] = 'Stefan';
        
        $last_updated = $request->session()->has('last_updated') ?
        $request->session()->pull('last_updated') : 'None';
        $data['last_updated'] = $last_updated;
        
        return view('contents/home', $data);
    }
    
    public function contact(){
        return view('contents/contact');    
        
    }
    
    public function upload(Request $request)
    {
        $data = [];
        
        if($request->isMethod('post'))
        {
            $this->validate(
                    $request,
                    [
                        'image_upload' => 'mimes:jpeg,bmp,png'
                    ]
                    );
            Input::file('image_upload')->move('images','attraction.jpg');
            return redirect('/');
        }
        return view('contents/upload', $data);
    }
    
}



