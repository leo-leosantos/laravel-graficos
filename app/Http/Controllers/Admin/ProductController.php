<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    //Eloquent ORM

    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $products =  $this->repository->relationships('category')
            ->orderBy('id', 'DESC')
            ->paginate();

        //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::pluck('title', 'id');
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {

        $productUrl = $this->repository->urlSlug($request);

        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $description = $request->description;


        $data = [
            'name' => $name,
            'url' => $productUrl,
            'price' => $price,
            'category_id' => $category_id,
            'description' => $description
        ];

        $this->repository->store($data);
        return redirect()->route('products.index')->withSuccess('Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = $this->repository->where('id', $id)->first();
        $product = $this->repository->findWhereFirst('id', $id);

        //$categories = Category::pluck('title','id');
        if (!$product) {
            return redirect()->back();
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->findById($id);
        //$categories = Category::pluck('title', 'id');

        if (!$product) {
            return redirect()->back();
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {


        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $description = $request->description;
        $productUrl = $this->repository->urlSlug($request);


        $data = [
            'name' => $name,
            'url' => $productUrl,
            'price' => $price,
            'category_id' => $category_id,
            'description' => $description
        ];
        $this->repository->update($id, $data);
        return redirect()->route('products.index')->withSuccess('Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = $this->repository->find($id);

        // if (!$product) {
        //     return redirect()->back();
        // }

        // $product->delete();

        $this->repository->delete($id);

        return redirect()->route('products.index')->withSuccess('Produto Excluido com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');


        // $data = $request->all();

        $products = $this->repository->search($request);

        return view('admin.products.index', compact('products', 'filters'));
    }
}
