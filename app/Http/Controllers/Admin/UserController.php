<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', User::class);
        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', User::class);
        $user = new User();
        return view('dashboard.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
        ],[
            'password.same' => 'كلمة المرور غير متطابقة',
            'confirm_password.same' => 'كلمة المرور غير متطابقة',
        ]);
        DB::beginTransaction();
        try{
            $user = User::create($request->all());
            foreach ($request->abilities as $role) {
                RoleUser::create([
                    'role_name' => $role,
                    'user_id' => $user->id,
                    'ability' => 'allow',
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.users.index')->with('success', 'تم اضافة مستخدم جديد');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function profile(User $user)
    {
        if(auth()->user()->id != $user->id){
            $this->authorize('view', User::class);
        }
        return view('dashboard.users.profile', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('edit', User::class);
        $btn_label = __('Edit');
        return view('dashboard.users.edit', compact('user', 'btn_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('edit', User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|same:confirm_password',
            'confirm_password' => 'nullable|same:password',
        ]);
        DB::beginTransaction();
        try{
            if($request->password != null){
                $user->update($request->all());
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->abilities != null) {
                $role_old = RoleUser::where('user_id', $user->id)->pluck('role_name')->toArray();
                $role_new = $request->abilities;
                foreach ($role_old as $role) {
                    if (!in_array($role, $role_new)) {
                        RoleUser::where('user_id', $user->id)->where('role_name', $role)->delete();
                    }
                }
                foreach ($role_new as $role) {
                    $role_f = RoleUser::where('user_id', $user->id)->where('role_name', $role)->first();
                    if ($role_f == null) {
                        RoleUser::create([
                            'role_name' => $role,
                            'user_id' => $user->id,
                            'ability' => 'allow',
                        ]);
                    }else{
                        $role_f->update(['ability' => 'allow']);
                    }
                }
            }else{
                RoleUser::where('user_id', $user->id)->delete();
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
        return redirect()->back()->with('success', 'تم تعديل المستخدم');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', User::class);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم');
    }
}
