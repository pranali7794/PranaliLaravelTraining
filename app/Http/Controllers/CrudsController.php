<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use App\Models\Blogs;
use Illuminate\Support\Facades\View;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('index');
    }

    public function getData()
    {
        $data = DB::table('sample_data')->select('*');    
        return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "";
                           //$btn = '<a href="{{ route("'crud.show'" ,$row->id) }}" class="edit btn btn-info btn-sm">Show</a>';
                           $btn = '<a href="' . route('crud.show', $row->id) .'"  class="show btn btn-info btn-sm">Show</a>'; 

                           $btn = $btn.'<a href="' . route('crud.edit', $row->id) .'" class="edit btn btn-primary btn-sm">Edit</a>';

                           $btn = $btn.'<a href="' . route('crud.destroy', $row->id) .'" class="delete btn btn-danger btn-sm">Delete</a>';
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                   ->make(true);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'first_name'=>'required',  
            'last_name'=>'required',
            'image'=>'required|image|max:2048|mimes:jpeg,jpg,png',
            'mobile'=>'required',  
            'email'=>'required',
            'gender'=>'required',
            'cc'=>'required'
              
        ]);  
        
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'first_name'    =>  $request->first_name,            
            'last_name'     =>  $request->last_name,
            'image'         =>  $new_name,
            'mobile'        =>  $request->mobile,  
            'email'         =>  $request->email,
            'gender'        =>  $request->gender,
            'country_code'  =>  $request->cc,
            'address'       =>  $request->address
        );

        CRUD::create($form_data);
        return redirect('crud')->with('success','Data Added successfully.');
        
        // $crud = new Crud;  
        // $crud->first_name =  $request->get('first_name');  
        // $crud->last_name = $request->get('last_name');  
         
        // $crud->save();  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('sample_data')
        //     ->join('posts', 'sample_data.id', '=', 'posts.user_id')->get();

        //$data = CRUD::findOrFail($id);

        $user = Crud::find($id);
        $posts = $user->user; //user of the blog
        return view('view')->with(['user'=> $user,'blogs'=>$posts]); 

       // return view('view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $data = CRUD::findOrFail($id);
        return view('edit', compact('data'));
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
        if($image != ''){
            $request->validate([
                'first_name' => 'required',
                'last_name'  => 'required',
                'image'      => 'required|image|max:2048|mimes:jpeg,jpg,png',
                'mobile'=>'required',  
                'email'=>'required',
                'gender'=>'required',
                'cc'=>'required'
            ]);
            $image_name = rand() .  '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else{
            $request->validate([
                'first_name' => 'required',
                'last_name'  => 'required',
                'mobile'=>'required',  
                'email'=>'required',
                'gender'=>'required',
                'cc'=>'required'
            ]);
        }

        $form_data = array(
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'image'         =>  $image_name,
            'mobile'        =>  $request->mobile,
            'email'        =>   $request->email,
            'address'        => $request->address,
            'gender'        =>  $request->gender,
            'country_code'        =>  $request->cc
        );

        Crud::whereId($id)->update($form_data);
        return redirect('crud')->with('success','Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CRUD::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success','Data is deleted successfully');
    }
}
