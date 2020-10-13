<?php

namespace App\Http\Controllers;

use App\User;
use App\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['consult']);
    }



    public function index()
    {
       	$users = User::all();

		foreach ($users  as $key => $user) {
			if ($user->finish_date < Carbon::now()) {
				$user->status = 0;
				$user->save();
			}

			if ($user->finish_date >= Carbon::now()) {
				$user->status = 1;
				$user->save();
			}
		}


		$users = CollectionHelper::paginate($users, 10);

        return view('user.index',compact('users'));
    }



    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }



    public function create()
    {
        return view('user.create');
    }



    public function store(Request $request)
    {
	    $rules = [
	    	'name' => 'required',
		    'email' => 'required',
		    'price' => 'required',
		    'document' => 'required|unique:users,document',
		    'start_date' => 'required',
		];

		$customMessages = [
		    'required' => 'Cuidado!! el campo no se puede dejar vacío',
		    'unique' => 'Ya exite un usuario con este N° de documento',
		];

		$request->validate($rules, $customMessages);

		$date = date("Y-m-d",strtotime($request->start_date."+ 30 days"));

		$status = $date >= Carbon::now()->format('Y-m-d') ? 1 : 0;

		if($request->file('img')){
    		$path = Storage::disk('public')->put('images',$request->file('img'));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->document),
            'start_date' => $request->start_date,
            'finish_date' => $date,
            'price' => $request->price,
            'img' => $path ?? null,
            'is_admin' => 0,
            'status' => $status 
        ]);

        return redirect()->route('users.show',compact('user'));
    }



    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }



    public function update(Request $request, User $user)
    {
    	$rules = [
	    	'name' => 'required',
		    'email' => 'required',
		    'document' => 'required|unique:users,document,'.$user->id
		];

		$customMessages = [
		    'required' => 'Cuidado!! el campo no se puede dejar vacío',
		  	'unique' => 'Ya exite un usuario con este N° de documento'
		];

		$request->validate($rules, $customMessages);

    	if($request->file('img')){
            $path = Storage::disk('public')->put('images',$request->file('img'));
        }else{
            $path = $user->img;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->document),
            'img' => $path,
        ]);

        return redirect()->route('users.show',compact('user'));
    }



    public function renovate(User $user)
    {
        return view('user.renovate',compact('user'));
    }



    public function renovated(Request $request, User $user)
    {
		$rules = [
	    	'start_date' => 'required',
		    'price' => 'required',
		];

		$customMessages = [
		    'required' => 'Cuidado!! el campo no se puede dejar vacío',
		];

		$request->validate($rules, $customMessages);

		$history = History::create([
            'users_id' => $user->id,
            'start_date' => $user->start_date,
            'finish_date' => $user->finish_date,
            'price' => $user->price,
        ]);

        $date = date("Y-m-d",strtotime($request->start_date."+ 30 days"));

		$status = $date >= Carbon::now()->format('Y-m-d') ? 1 : 0;

        $user->update([
            'start_date' => $request->start_date,
            'finish_date' => $date,
            'price' => $request->price,
            'status' => $status,
        ]);

        return view('user.show',compact('user'));
    }



	public function history(User $user)
    {
    	$histories = History::where('users_id',$user->id)->paginate(10);

        return view('user.history',compact('histories','user'));
    }


    public function destroy(User $user)
    {
    	$user->delete();

        return redirect()->route('users.index');
    }


    public function destroyHistory(User $user)
    {
    	History::where('users_id',$user->id)->delete();

        return redirect()->route('users.index');
    }



    public function amount()
    {
    	$date = Carbon::now()->format('m');

    	$months = User::where('start_date', 'like', '%'.$date.'%')->get(); 

    	$amountMonth = 0;
    	foreach ($months as $month) {
    		$amountMonth+= $month->price;
    	}

    	$allUser = User::all();

    	$amountUser = 0;
    	foreach ($allUser as $user) {
    		$amountUser+= $user->price;
    	}

    	$allhistory = History::all();

		$amountHistory = 0;
    	foreach ($allhistory as $history) {
    		$amountHistory+= $history->price;
    	}

    	$amountGeneral = $amountUser + $amountHistory;


        return view('user.amount',compact('amountMonth','amountGeneral'));
    }



    public function find(Request $request)
    {
    	if ($request->findMonth == 'all' || $request->findStatus == 'all') {
    		return redirect()->route('users.index');
    	}

		if ($request->findName != null) {
			$users = User::where('name', 'like', '%'.$request->findName.'%')->paginate(10); 
		}

		if ($request->findMonth != null) {
			$users = User::whereMonth('start_date', '=', $request->findMonth)
			->orWhereMonth('finish_date', '=', $request->findMonth)->paginate(10); 
		}

		if ($request->findStatus != null) {
			$users = User::where('status',$request->findStatus)->paginate(10); 
		}


        return view('user.index',compact('users'));
    }



    public function consult(Request $request)
    {
    	$rules = [
	    	'consult' => 'required',
		];

		$customMessages = [
		    'required' => 'Campo vacío!!',
		];

		$request->validate($rules, $customMessages);

    	$user = User::where('document',$request->consult)->first();

		if (!$user) {
			return redirect()->route('home')->with('errorConsult','no existe ningun usuario con este N° de acceso');
		}

        return view('home',compact('user'));
    }




}
