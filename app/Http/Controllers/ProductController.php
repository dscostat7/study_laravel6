<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    private $repository;
    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        // $this->middleware('auth')->only([
        //     'create',
        //     'store,',
        // ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        //$products = ['Geladeira', 'Fogão', 'TV', 'Sofá'];
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'requited|min:3|max:10000',
        //     'photo' => 'required|image',
        // ]);
        // dd('OK');
        // dd($request->all());
        // dd($request->only(['name', 'description']));
        // dd($request->input('nome', 'guest'));
        // dd($request->except('_token'));
        // if ($request->file('photo')->isValid())
        // {
        //     // $request->file('photo')->store('products');
        //     $nameFile = $request->name . '.' . $request->photo->extension();
        //     $request->file('photo')->storeAs('products', $nameFile);
        // };
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        // $product = Product::create($data);
        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $products = Product::where('id', $id)->first();
        // $products = Product::find($id);
        if (!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));

            // return view('admin.pages.products.edit', [
            //     'product' => $product
            // ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$product = $this->repository->find($id))
            return redirect()->back();

            $data = $request->all();

            if ($request->hasFile('image') && $request->image->isValid()) {
                
                if ($product->image && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }

                $imagePath = $request->image->store('products');
    
                $data['image'] = $imagePath;
            }

            $product->update($data);
            return redirect()->route('products.index'); 
        // dd("Editando o Produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("deletando o produto $id");
        $product  = $this->repository->find($id);
        if (!$product)
            return redirect()->back();

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $product->delete();

            return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
        // dd($request->all());
    }

}
