<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AccountManagerController extends Controller
{
    
    public function index(){    

    	$users = User::where('id','!=',$this->user->id)->where('group_id','!=',1)->paginate(15);
    	
    	return view('users.accounts.user-list',compact('users'));

    }

    public function create(){

    	$groups = UserGroup::where('status',1)->where('id','<>',1)->get();

    	return view('users.accounts.add-user-form', compact('groups','action','edit'));

    }

    public function store(Request $request){

    $messages = [
        'required' => 'Acest camp este obligatoriu',
        'same' => 'Parolele nu se potrivesc',
        'email' => 'Adresa de email invalida',
        'username.unique' => 'Deja exista un utilizator cu acest nume',
        'mail.unique' => 'Deja exista un utilizator cu aceasta adresa de email',
        'phone.unique' => 'Deja exista un utilizator cu acest numar de telefon',
        'date' => 'Data specificata este invalida',
        'numeric' => 'Numar de telefon invalid',
        'phone.regex' => 'Numar de telefon invalid',
        'password.min' => 'Parola trebuie sa contina cel putin 6 caractere'
    ];

    $rules = [
        'username' => 'required|unique:users|string',
        'password' => 'required|min:6|string',
        'password_check' => 'same:password',
        'mail' => 'required|email|unique:users',
        'phone' => 'required|numeric|regex:/^[0-9]{10}$/|unique:users',
        'address' => 'required|string',
        'birth_date' => 'required|date',
        'group_id' => 'required|integer|min:2',
        'status' => 'required|boolean'
    ];

    $validator = validator::make(Input::all(), $rules,$messages);

    if ($validator->fails())
            return redirect('/admin/accounts/create')->withInput()->withErrors($validator);

    $data = $request->all();
    $data['password'] = Hash::make($data['password']);

    User::create($data);

	$request->session()->flash('alert-success', 'User was successfuly added!');
    return redirect('/admin/accounts');

    }

    public function destroy(Request $request){
        $this->validate($request, [
            'id' => 'required'
        ],[
            'id.required' => 'Nu ai ales niciun utilizator'
        ]);

        $data = $request->all();

        User::destroy($data['id']);

        $request->session()->flash('alert-success', 'Users successfuly deleted!');
        return redirect('/admin/accounts');
    }

    public function edit($user_id){

        $user = User::find($user_id);

        if($user->group_id == 1)
            dd('Nice try fucker...');

        $groups = UserGroup::where('status',1)->where('id','<>',1)->get();

        return view('users.accounts.edit-user-form',compact('user','groups'));
    }

    public function update(Request $request,$user_id){

        $messages = [
        'required' => 'Acest camp este obligatoriu',
        'same' => 'Parolele nu se potrivesc',
        'email' => 'Adresa de email invalida',
        'username.unique' => 'Deja exista un utilizator cu acest nume',
        'mail.unique' => 'Deja exista un utilizator cu aceasta adresa de email',
        'phone.unique' => 'Deja exista un utilizator cu acest numar de telefon',
        'date' => 'Data specificata este invalida',
        'numeric' => 'Numar de telefon invalid',
        'phone.regex' => 'Numar de telefon invalid',
        'password.min' => 'Parola trebuie sa contina cel putin 6 caractere'
        ];

        $rules = [
            'username' => 'required|unique:users,id|string',
            'password' => 'required_with:password_check|min:6|string',
            'password_check' => 'required_with:password|same:password',
            'mail' => 'required|email|unique:users,id',
            'phone' => 'required|numeric|regex:/^[0-9]{10}$/|unique:users,id',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'group_id' => 'required|integer|min:2',
            'status' => 'required|boolean'
        ];

        $validator = validator::make(Input::all(), $rules,$messages);

        if ($validator->fails())
            return redirect("/admin/accounts/$user_id/edit")->withInput()->withErrors($validator);

        $data = $request->all();
        $user['username'] = $data['username'];
        if(isset($data['password']))
            $data['password'] = Hash::make($data['password']);
        $user['mail'] = $data['mail'];
        $user['phone'] = $data['phone'];
        $user['address'] = $data['address'];
        $user['birth_date'] = $data['birth_date'];
        $user['group_id'] = $data['group_id'];
        $user['status'] = $data['status'];

        $user = User::where('id',$user_id)->where('group_id','<>',1)->update($user);

        $request->session()->flash('alert-success', 'Utilizator modificat cu succes !');
        return redirect('/admin/accounts');

    }

}
