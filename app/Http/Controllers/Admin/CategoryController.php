<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    //queryBuilder

    protected $repository;
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        // $categories = DB::table('categories')
        //     ->orderBy('id', 'desc')
        //     ->paginate();

        $categories  = $this->repository->orderBy('id', 'DESC')->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreUpdateCategoryFormRequest $request)
    {

        // DB::table('categories')->insert([
        //     'title' => $request->title,
        //     'url' => $request->url,
        //     'description' => $request->description
        // ]);


        $this->repository->store([
            'title' => $request->title,
            //'url' => $request->url,
            'description' => $request->description
        ]);
        return redirect()->route('categories.index')->withSuccess('Categoria Cadastrada com sucesso!');
    }


    public function show($id)
    {
        // $category = DB::table('categories')->where('id', $id)->first();

        $category = $this->repository->findById($id);
        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.show', compact('category'));
    }


    public function edit($id)
    {
        // $category = DB::table('categories')->where('id', $id)->first();
        $category = $this->repository->findById($id);

        if (!$category) {
            return redirect()->back();
        }


        return view('admin.categories.edit', compact('category'))->withSuccess('Categoria Editada com sucesso!');
    }


    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {

        // DB::table('categories')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'url' => $request->url,
        //     'description' => $request->description
        // ]);

        $this->repository->update(
            $id,
            [
                'title' => $request->title,
                // 'url' => $request->url,
                'description' => $request->description
            ]
        );

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        // $category = DB::table('categories')->where('id', $id)->delete();
        $category = $this->repository->findById($id);


         $products = $this->repository->productsByCategoryID($id);

        if ($products > 0) {
            return redirect()->route('categories.index')->with('message','Error ao excluir categoria!');
        }

        if (!$category) {
            return redirect()->back()->withErrors('Error ao excluir categoria!');
        }

        $category = $this->repository->delete($id);



        return redirect()->route('categories.index')->withSuccess('Categoria Excluida com sucesso!');
    }


    public function search(Request $request)
    {

        $data = $request->except('_token');
        $search = $request->get('search');
        //dd($search);
        //    $categories = DB::table('categories')
        //                            ->where('title',$search)
        //                            ->orWhere('url', $search)
        //                            ->orWhere('description', 'LIKE', "%{$search}%")
        //                            ->get();
        $categories = $this->repository->search($data);

        return view('admin.categories.index', compact('categories', 'search', 'data'));
    }
}
