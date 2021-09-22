<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;


class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
        }
        catch(\Exception $exception){
            DB::rollback();
            Log::error('Message :' . $exception->getMessage(). 'line:' .$exception->getline());
            
        }
        
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUSer = $user->roles;
        return view('admin.user.edit',compact('roles','user','rolesOfUSer')); 
    }
    public function update(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
        }
        catch(\Exception $exception){
            DB::rollback();
            Log::error('Message :' . $exception->getMessage(). 'line:' .$exception->getline());
            
        }
        
        return redirect()->route('users.index');
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->user);
        
    }
    
    
}
    
