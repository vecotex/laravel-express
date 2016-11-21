<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Post;
use App\Http\Requests\PostRequest;


// use Illuminate\Support\Facades\Auth;
//use App\Http\Requests\PostRequest;
//use App\Post;
//use App\Tag;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    private $post;

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)

    {
        $this->post = $post;
        $this->middleware('guest', ['except' => 'logout']);
        //$this->middleware('auth');
    }
    //public function getLogin()

    public function login()
    {


            if (\Auth::attempt(['email' => 'vicotex@gmail.com', 'password' => 123456]) ) {
                $posts = $this->post->paginate(10);

                return view('Admin.Posts.index', compact('posts'));

                //return view('Admin.Posts.index');
            } else {
                return \Redirect::back();
            }

    }

    public function postLogin()
    {
        return view ('posts.index');
    }
}
