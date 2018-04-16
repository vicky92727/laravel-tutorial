<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
use ReflectionClass;
use ReflectionObject;
use Redirect;
use Socialite;
use App\SocialAccountService as accountService;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
         $email = $request->email;
         $password = $request->password;
    
            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                return redirect('/users');

            } else {
                
                return redirect('/');
            }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
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
        //
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
        //
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


  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
   /* public function callback()
    {
       $facebookData = Socialite::driver('facebook')->user();
       dd($facebookData);
        // check if already in DB
        try{
            $user = User::where('facebook_id', $data->id)->firstOrFail();
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // create a new user
            $user = new User();

            // set the properties you want
            // $user->facebook_id = $data->id;
            // ...

            // then save
            $user->save();
        }

        // login the user
        Auth::login($user);

        // perhaps return a redirect response
        return redirect()->action('MyController@myAction');
        }*/


     /*   public function callback($service) {

            
            $socialMediaUser = Socialite::driver($service)->stateless()->user();
            dd($socialMediaUser);
            $user = $this->findOrCreateUser($socialMediaUser);
            auth()->login($user);
            return redirect()->route('home');
        }*/

            /**
     * Obtain the user information
     *
     * @return Response
     */
    public function callback(accountService $accountService, $provider)
    {

        try {
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);

        return redirect()->to('/users');
    }


}
