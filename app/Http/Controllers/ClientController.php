<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;

class ClientController extends Controller
{
    //
    public function __construct( Title $titles )
    {
        $this->titles = $titles->all();
    }

    public function di()
    {
        dd($this->titles);
    }

    public function index()
    {
        $data = [];
        
        $obj = new \stdClass;
        $obj->id = 1;
        $obj->title = "Mr";
        $obj->name = "John";
        $obj->last_name = "Doe";
        $obj->email = "john.doe@gmail.com";
        $data['clients'][] = $obj;
        
        $obj = new \stdClass;
        $obj->id = 2;
        $obj->title = "Ms";
        $obj->name = "Jane";
        $obj->last_name = "Doe";
        $obj->email = "jane.doe@gmail.com";
        $data['clients'][] = $obj;
        
         
        
        return view('client/index', $data);
    }

    public function newClient(Request $request)
    {
        $data = [];
        $data['title'] = $request->input('title');
        $data['name'] = $request->input('name');
        $data['last_name'] = $request->input('last_name');
        $data['address'] = $request->input('address');
        $data['zip_code'] = $request->input('zip_code');
        $data['city'] = $request->input('city');
        $data['state'] = $request->input('state');
        $data['email'] = $request->input('email');
        
        
        $data['titles'] = $this->titles;
        $data['modify'] = 0;
        
        if($request->isMethod('post') ){
            //dd($data);
            $this->validate(
                    $request,
                    [
                        'name' => 'required|min:2',
                        'last_name' => 'required',
                        'address' => 'required',
                        'zip_code' => 'required|max:5|min:2',
                        'city' => 'required',
                        'state' => 'required',
                        'email' => 'required' 
                    ]   
                    
                    );
            
            return redirect('clients');
        }
        
        return view('client/form', $data);
    }

    public function create()
    {
            return view('client/create');
    }

    public function show($client_id)
    {
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        return view('client/form', $data);
    }
}
