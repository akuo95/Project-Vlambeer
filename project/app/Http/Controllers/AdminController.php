<?php

namespace App\Http\Controllers;

use App\Game;
use App\Product;
use App\User;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(Auth::check()){

            if(Auth::user()->role == 'admin'){

                //code if user is admin
                return view('layout.master_admin');
            }
        }
        else{

            return view('errors.unauthorized');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {

            if (Auth::user()->role == 'admin') {

                //code if user is admin

            }
        }
        else{
            return view('errors.unauthorized');
        }
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
        if(Auth::check()){

            if(Auth::user()->role == 'admin') {
                //code if user is admin
            }

        }

        else{
            return view('errors.unauthorized');
        }
    }

    public function showProduct() {
        $productArray = \App\Product::all();

        return view('shop.main', compact('productArray'));
    }


    public function editUser(Request $request)
    {
        if(Auth::check()) {

            if (Auth::user()->role == 'admin') {

                $request = json_decode($request->input, true);

                $user = \App\User::find($request['game_id']);

                $user->email = $request['email'];
                if(empty($request['password'])){
                }
                else{
                    $user->password = bcrypt($request['password']);
                }

                $user->first_name = $request['user_first_name'];
                $user->insertion = $request['user_insertion'];
                $user->last_name = $request['user_last_name'];
                $user->address = $request['user_address'];
                $user->housenumber = $request['user_housenumber'];
                $user->zipcode = $request['user_zipcode'];
                $user->city = $request['user_city'];
                $user->phonenumber = $request['phonenumber'];
                $user->date_of_birth = $request['date_of_birth'];
                $user->country = $request['country'];

                $user->save();

                echo true;
            }
        }
        else{
            return view('errors.unauthorized');
        }
    }

    public function editGame(Request $request)
    {

        if(Auth::check()) {

            if (Auth::user()->role == 'admin') {

                $request = json_decode($request->input, true);

                $game = \App\Game::find($request['game_id']);

                $game->game_background_img = $request['game_background_img'];
                $game->game_background_video = $request['game_background_video'];
                $game->custom_payment_link = $request['custom_payment_link'];
                $game->steam_payment_link = $request['steam_payment_link'];
                $game->ios_payment_link = $request['ios_payment_link'];
                $game->psn_payment_link = $request['psn_payment_link'];
                $game->android_payment_link = $request['android_payment_link'];

                $game->save();

                echo true;

            }
        }
        else{
            return view('errors.unauthorized');
        }
    }

    public function editProduct(Request $request) {
        if(Auth::check()) {

            if (Auth::user()->role == 'admin') {

                $request = json_decode($request->input, true);

//                $this->validate($request,[
//                    'name' => 'string',
//                    'description' => 'string',
//                    'price' => 'numeric',
//                    'category' => 'string',
//                    'color' => 'string',
//                    'size'  => 'string',
//                    'sale' => 'numeric',
//                    'sale_percentage' => 'numeric',
//                    'stock' => 'numeric',
//                    'img' => 'string'
//                ]);



                if($request['sale'] == 1){

                    $sale_price = ((100 - $request['sale_percentage']) / 100 * $request['price']);
                } else {
                    $sale_price = '';
                }


                $product = \App\Product::find($request['game_id']);

                $product->name = $request['name'];
                $product->description = $request['description'];
                $product->price = $request['price'];
                $product->category = $request['category'];
                if($request == 'clothes') {
                    $product->color = $request['color'];
                    $product->size = $request['size'];
                }
                $product->sale = $request['sale'];


                $product->sale_percentage = $request['sale_percentage'];
                $product->sale_price = $sale_price;
                $product->stock = $request['stock'];
                $product->img = $request['img'];

                $product->save();

                echo true;

            }
        }
        else{
            return view('errors.unauthorized');
        }
    }


    public function viewCreateProduct()
    {
            if (Auth::check()) {

                    if (Auth::user()->role == 'admin') {

                            $product = \App\Product::all();
                            return view('shop.create', compact('product'));
                    }
            }
    }

    public function createProduct(Request $request){

        $this->validate($request,[
            'name' => 'required|max:50|string',
            'description' => 'required|string',
            'price' => 'numeric',
            'category' => 'string',
            'sale' => 'boolean',
            'sale_percentage' => 'numeric',
            'stock' => 'numeric',
            'img' => 'string'
        ]);

        if($request['sale'] == 1){

                $sale_price = ((100 - $request['sale_percentage']) / 100 * $request['price']);
        } else {
                $sale_price = '';
        }

        $product = new Product;
        $product->name              = $request->input('name');
        $product->description       = $request->input('description');
        $product->price             = $request->input('price');
        $product->category          = $request->input('category');
        $product->color             = $request->input('color');
        $product->size              = $request->input('size');
        $product->sale              = $request->input('sale');
        $product->sale_percentage   = $request->input('sale_percentage');
        $product->sale_price        = $sale_price;
        $product->stock             = $request->input('stock');
        $product->img               = $request->input('img');

        $product->save();

        return redirect('admin/shop')->with('message', 'Product created succesfully');
    }

    public function remove(Request $request) {

        if(Auth::check()) {

            if (Auth::user()->role == 'admin') {
                $request = json_decode($request->input);

                if ($request->type == 'shop') {
                    Product::where('id', $request->id)->delete();
                }

                if ($request->type == 'game') {
                    Game::where('id', $request->id)->delete();
                }

                if ($request->type == 'user') {
                    User::where('id', $request->id)->delete();
                }
            }
        }
        else{
            return view('errors.unauthorized');
        }
    }


    public function update(Request $request, $id)
    {
        //
    }
    
    public function indexMailList(Newsletter $newsletter){
        $mailList = $newsletter->all();

        return view('mail.index', compact('mailList'));
    }

    public function deleteMailList(Newsletter $newsletter, $id){

        $newsletter->destroy($id);

        return back();
    }

    public function addMailList(GameCreateRequest $request, $id){



        return back();
    }


}
