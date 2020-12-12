<?php

namespace App\Repository\Eloquent;

use App\Product;
use App\Repository\ProductRepoInterface;

class ProductRepository implements ProductRepoInterface
{
  
    // Get all instances of model
    public function all()
    {
        return Product::all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        $request = request();

        /* image upload */
        $image = $request->file('photo');
        $productPicName = time() . "-photo." . $image->getClientOriginalExtension();

        $upload_path = 'storage/product_images/';
        $productImageUrl = $productPicName;
        $uploadSuccess = $image->move($upload_path, $productPicName);

        return Product::create([
            'name' => $data['name'],
            'photo' => $productImageUrl,
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id']
        ]);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $request = request();

        /* image upload */
        $image = $request->file('photo');
        $productPicName = time() . "-photo." . $image->getClientOriginalExtension();

        $upload_path = 'storage/product_images/';
        $productImageUrl = $upload_path . $productPicName;
        $uploadSuccess = $image->move($upload_path, $productPicName);

        $record = Product::find($id);

        return $record->update([
            'name' => $data['name'],
            'photo' => $productImageUrl,
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id']
        ]);
    }

    // soft deletes the record
    public function delete($id)
    {
        return Product::destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return Product::with($relations)->get();
    }
}
