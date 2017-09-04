<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroup;
use App\Role;	
use App\GroupRoles;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UserGroupsController extends Controller
{
    
	public function index(){

		$userGroups = UserGroup::where('id','<>',$this->user->group_id)->where('id','<>',1)->paginate(15);

		return view('users.user-group.user-group-list' , compact('userGroups') );

	}

	public function create(){

		$roles = Role::all();

		return view('users.user-group.add-user-group-form',compact('roles'));

	}

	public function store(Request $request){

	$validator = validator::make(Input::all(), [
        'group_name' => 'required|unique:user_groups|string',
        'status' => 'required|boolean'
    ]);

    if ($validator->fails())
	    	return redirect('/admin/user-groups/create')->withInput()->withErrors($validator);

    $data = $request->all();

    $group = UserGroup::create($data);

    foreach($data['roles'] as $role)
    	$data['insert'][] = array('group_id' => $group->id, 'role_id' => $role);
    
    GroupRoles::insert($data['insert']);

    $request->session()->flash('alert-success', 'User Group was successfuly added!');
    return redirect('/admin/user-groups');


	}

	public function destroy(Request $request){
		$this->validate($request, [
	        'id' => 'required'
    	],[
    		'id.required' => 'You haven\'t selected any groups'
    	]);

    	$data = $request->all();

		User::whereIn('group_id',$data['id'])->delete();
		GroupRoles::whereIn('group_id',$data['id'])->delete();
		UserGroup::destroy($data['id']);

		$request->session()->flash('alert-success', 'User Groups successfuly deleted!');
    	return redirect('/admin/user-groups');

	}

	public function edit($group_id){

		$group = UserGroup::find($group_id);

		$roles = Role::all();

		$group_roles = GroupRoles::where('group_id',$group_id)->pluck('id','role_id')->toArray();

		return view('users.user-group.edit-user-group-form',compact('roles','group','group_roles'));
		
	}

	public function update(Request $request, $group_id){

	$validator = validator::make(Input::all(), [
        'group_name' => 'required|unique:user_groups,id|string',
        'status' => 'required|boolean'
    ]);

    if ($validator->fails())
	    	return redirect("/admin/user-groups/$group_id/edit")->withInput()->withErrors($validator);
	
	$data = $request->all();		

	$group = UserGroup::find($group_id);

	$group->group_name = $data['group_name'];
	$group->status = $data['status'];
	$group->updated_at = date("Y-m-d H:i:s");
	$group->save();

	$data['existing'] = json_decode($data['existing']);

	GroupRoles::whereNotIn('role_id',$data['existing'])->where('group_id',$group_id)->delete();


	if(isset($data['roles']))
	foreach($data['roles'] as $role){
			GroupRoles::create(['group_id' => $group->id, 'role_id' => $role]);
	}

	User::where('group_id',$group_id)->update(['status' => $data['status']]);

	$request->session()->flash('alert-success', 'User Groups successfuly modified!');
    return redirect('/admin/user-groups');

	}

	public function refreshRoles(){

		$routeCollection = Route::getRoutes();
		$new_roles = array();
		foreach ($routeCollection as $value) {
		    $name = $value->getName();

        	if(!empty($name) && !array_key_exists($name , $new_roles ) && substr($name,0,8) != 'debugbar'){
        		$new_roles[$name] = 1;
        	}
		}
		foreach($new_roles as $key => $new_role){
			$find[] = $key;
			Role::firstOrCreate(['access_path' => $key]);
		}
		Role::whereNotIn('access_path', $find)->delete();
		$roles = Role::all();

		return response()->json([
		    'data' => $roles,
		]);

	}

}
