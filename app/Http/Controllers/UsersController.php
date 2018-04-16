<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usersalary;
use App\Customer;
use App\Account;
use Hash;
use DateTime;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::with('salary')->get();
        $users = User::with('customers.accounts.branches.managers','salary')->get();
        //dd($users);
        return view('users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('userform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);//;

        $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'required|unique:users|email',
        'password' => 'required|confirmed|min:6',
        ]);
        $user->save();
        $request->session()->flash('flash_message', 'User successfully added!');
        return redirect('/users');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('salary')->find($id);
        return view('showuser',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ////////////////////////////
        //edit code will be here //
        ///////////////////////////
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

        $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'unique:users,email,'.$id
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        self::SalaryUpdate($request,$id);
        $request->session()->flash('flash_message', 'User successfully updated!');
        return redirect('/users');
        
    }

        
        /**
     * Update user salary.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function SalaryUpdate(Request $request,$id)
    {  
        $salary =  $request->salary;
        $salaryid = Usersalary::where('user_id',$id)->first();
        // $salaryid = Usersalary::select('id')->where('user_id', $id)->first();
        if (! $salaryid) {
           $salaryid = new Usersalary();
        } 
           
        $salaryid->user_id = $id;
        $salaryid->salary= $salary;
        $salaryid->save();
         return true;

    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSalary(Request $request)
    {  
        $id = request('userid');
        $salaryid = Usersalary::select('id')->where('user_id', $id)->first();
        $message ='SAlary Updated';
        if (! $salaryid) {
             $message ='SAlary added';
           $salaryid = new Usersalary;
        } 
           
           $salaryid->user_id = request('userid');
           $salaryid->salary= request('salary');
            $salaryid->save();
        
        $request->session()->flash('flash_message',$message);
        return redirect('/users');
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('flash_message', 'User successfully deleted!');
        return redirect('/users');
    }

    public function search(Request $request)
    {
        $search = $request->searchkey;
        $users = User::whereHas('salary', function ($query) use ($search) {
                $query->where('name','like', '%'.$search.'%')
                  ->orWhere('created_at','>=', new DateTime('today'))
                  ->orWhere('salary', '>=', '32323');
        })->get();


        return view('users',compact('users'));
    }

   
}
