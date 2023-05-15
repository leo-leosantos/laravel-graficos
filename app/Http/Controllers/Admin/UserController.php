<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->paginate();

        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {

        //pode fazer assim
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),

        // ];

        //ou assim

        $data = $request->all();
        $data['password'] =  Hash::make($request->password);

        $this->repository->store($data);
        return redirect()->route('users.index')->withSuccess('Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->findById($id);
        // dd($user);
        //$categories = Category::pluck('title','id');
        if (!$user) {
            return redirect()->back();
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->findById($id);


        if (!$user) {
            return redirect()->back();
        }

        return view('admin.users.edit', compact('user'));
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


        //pode fazer assim
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),

        // ];

        //ou assim

        $data = $request->all();
        if ($request->password) {
            $data['password'] =  Hash::make($request->password);
        } else {
            unset($data['password']);
        }


        $this->repository->update($id, $data);
        return redirect()->route('users.index')->withSuccess('Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->repository->findById($id);

        $this->repository->delete($id);

        return redirect()->route('users.index')->withSuccess('Usuário Excluido com sucesso!');
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');


        // $data = $request->all();

        $users = $this->repository->search($request);

        return view('admin.users.index', compact('users', 'filters'));
    }
}
