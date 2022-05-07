<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\formUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = new User();
        $users = $user->Paginate($user::PAGINATE_SIZE);

        $keyWord = $request->input('keyword');
        $users = User::where('name', 'like', "%$keyWord%")
            ->orWhere('email', 'like', "%$keyWord%")
            ->orWhere('id', 'like', "%$keyWord%")
            ->orderBy('id', 'desc')
            ->paginate($user::PAGINATE_SIZE);

        return view('user.index',compact('users','keyWord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formUserRequest $request)
    {
        $users = new User();
        
        $users->fill($request->all());
        if($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $imagePath = $request->avatar->storeAs('public/uploads/users', $newFileName);
            $users->avatar = str_replace('public/', '', $imagePath);
        }
        $users->save();

        return redirect('/users')->with(['message' => 'Add Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('user.detail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('user.edit',compact('user'));
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
        $user = User::findOrFail($id);

        $user->fill($request->all());
        if($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $imagePath = $request->avatar->storeAs('public/uploads/users', $newFileName);
            $user->avatar = str_replace('public/', '', $imagePath);
        }
        $user->save();

        return redirect('/users')->with(['message' => 'Update Success']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        User::findOrFail($id)->delete();

        return redirect()->back()->with(['message' => 'Delete Success']);
    }

}
