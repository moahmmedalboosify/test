<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
use Notifiable;
use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invoices()
    {
         return $this->hasMany('App\invoice');
    }

    
public function index(Request $request)
{
$data = User::orderBy(‘id’,’DESC’)->paginate(5);
return view(‘users.index’,compact(‘data’));

}

public function create()
{
$roles = Role::pluck(‘name’,’name’)->all();
return view(‘users.create’,compact(‘roles’));
}

public function store(Request $request)
{
$this->validate($request, [
‘name’ => ‘required’,
‘email’ => ‘required|email|unique:users,email’,
‘password’ => ‘required|same:confirm-password’,
‘roles’ => ‘required’
]);
$input = $request->all();
$input[‘password’] = Hash::make($input[‘password’]);
$user = User::create($input);
$user->assignRole($request->input(‘roles’));
return redirect()->route(‘users.index’)
->with(‘success’,’User created successfully’);
}

public function show($id)
{
$user = User::find($id);
return view(‘users.show’,compact(‘user’));
}

public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck(‘name’,’name’)->all();
$userRole = $user->roles->pluck(‘name’,’name’)->all();
return view(‘users.edit’,compact(‘user’,’roles’,’userRole’));
}

public function update(Request $request, $id)
{
$this->validate($request, [
‘name’ => ‘required’,
‘email’ => ‘required|email|unique:users,email,’.$id,
‘password’ => ‘same:confirm-password’,
‘roles’ => ‘required’
]);
$input = $request->all();
if(!empty($input[‘password’])){
$input[‘password’] = Hash::make($input[‘password’]);
}else{
$input = array_except($input,array(‘password’));
}
$user = User::find($id);
$user->update($input);
DB::table(‘model_has_roles’)->where(‘model_id’,$id)->delete();
$user->assignRole($request->input(‘roles’));
return redirect()->route(‘users.index’)
->with(‘success’,’User updated successfully’);
}

public function destroy($id)
{
User::find($id)->delete();
return redirect()->route(‘users.index’)
->with(‘success’,’User deleted successfully’);
}

}
