use App\Models\Product;

Route::middleware(['auth'])->group(function () {
    Route::get('/products', function () {
        $products = Product::all();
        return view('products.index', compact('products'));
    });

    Route::get('/products/create', function () {
        return view('products.create');
    });

    Route::post('/products', function () {
        $product = new Product;
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->save();
        return redirect('/products');
    });

    Route::get('/products/{product}/edit', function (Product $product) {
        return view('products.edit', compact('product'));
    });

    Route::put('/products/{product}', function (Product $product) {
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->save();
        return redirect('/products');
    });

    Route::delete('/products/{product}', function (Product $product) {
        $product->delete();
        return redirect('/products');
    });
});
