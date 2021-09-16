<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Models\Product;
use App\Models\Models\category;
use DB;

class ProductController extends Controller
{
    //

    public function getProduct()
    {
    	$data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','vp_categories.cate_id')->orderBy('prod_id')->get();
    	return view('backend.product',$data);
    	return back();
        
    }

    
    public function getAddProduct()
    {
        $data['catelist'] = Category::All();
        return view('backend.addproduct', $data);
        
    }
    public function postAddProduct(AddProductRequest $request)
    {
		$filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product ->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
		$product->prod_img = $filename;
	
        $product->prod_accessories= $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_condition = $request->condition;
    	$product->prod_promotion = $request->promotion;
    	$product->prod_warranty = $request->warranty;
    	$product->prod_status = $request->status;
    	
		$product->prod_descri = $request->description;
    	$product->prod_featured = $request->featured;
    	$product->prod_cate = $request->cate;
    	$product->save();
		$request->img->storeAs('public',$filename);
        
    	
		return redirect()->back()->with('success', 'File uploaded successfully.');

        
        
    }
    public function updateProduct(Request $request , $id)
    {
    	
    	$product = new Product;
    	$arr['prod_name'] = $request->name;
    	$arr['prod_slug'] = str_slug($request->name);
    	$ar['prod_price'] = $request->price;
    	$arr['prod_accessories'] = $request->accessories;
    	$arr['prod_condition'] =  $request->condition;
    	$arr['prod_promotion'] =  $request->promotion;
    	$arr['prod_warranty'] =  $request->warranty;
    	$arr['prod_status'] =  $request->status;
    	$arr['prod_descri'] =  $request->description;
    	$arr['prod_featured'] =  $request->featured;
    	$arr['prod_cate'] = $request->cate;

   		if ($request->hasFile('img')) {

   			$img = $request->img->getClientOriginalName();
   			$arr['prod_img'] = $img;
   			$request->img->storeAs('Avatar',$img);
   			
   		}
    	$product::where('prod_id',$id)->update($arr);
    	return redirect()->intended('admin/product');
    }

    public function EditProduct($id)
    {
		$data['product'] = Product::find($id);
    	$data['listcate'] = Category::all();
        return view('backend.editProduct',$data);
        
    }
	public function DeleteProduct($id)
    {
    	Product::destroy($id);
    	return back();
    	
    }
}


