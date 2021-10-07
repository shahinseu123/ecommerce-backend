<?php

namespace App\Http\Controllers\backend\products;

use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\brand\Brand;
use App\Models\category\Category;
use App\Models\product\Product;
use App\Models\product\ProductData;
use App\Models\product\ProductImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->with('Productdata', 'Brand', "Attribute")->get();
        // return $product;
        return view('backend.products.index')->with('product', $product);
    }

    public function add_product()
    {
        $brands = Brand::orderBy('brand_title', 'asc')->get()
            ->map(function ($brand) {
                return [
                    'id' => $brand->id,
                    'brand_title' => $brand->brand_title,
                ];
            });

        $categories = Category::orderBy('category_title', 'asc')->where('status', '=', 'active')->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'category_title' => $category->category_title,
                ];
            });
        $attributes = Attribute::orderBy('attr_name', 'asc')->get()
            ->map(function ($attributes) {
                return [
                    'id' => $attributes->id,
                    'attr_name' => $attributes->attr_name,
                ];
            });
        return view('backend.products.add_product')->with(['brands' => $brands, 'categories' => $categories, 'attributes' => $attributes]);
    }

    public function create_product(Request $request)
    {
        // return $request->all();
        $request->validate([
            'product_title' => 'required|max:255|string',
            'stock_alert_qnty' => 'required|integer',
            'stock_pre_alert_qnty' => 'required|integer',
            'product_category' => 'required',
            'product_brand' => 'required',
            'description' => 'required',
        ]);

        //create product into product table
        $product = new Product();
        if ($request->product_type === 'simple') {
            $product->title = $request->product_title;
            if ($request->short_description) {
                $product->short_description = $request->short_description;
            }
            if ($request->product_image) {
                $product->product_image = $request->product_image;
            }
            if ($request->meta_title) {
                $product->meta_title = $request->meta_title;
            }
            if ($request->meta_description) {
                $product->meta_description = $request->meta_description;
            }
            if ($request->meta_tags) {
                $product->meta_tags = $request->meta_tags;
            }
            $product->description = $request->description;
            $product->type = $request->product_type;
            $product->stock_alert_quantity = $request->stock_alert_qnty;
            $product->stock_pre_alert_quantity = $request->stock_pre_alert_qnty;
            //    $product->brand_id = $request->product_brand;
            $product->save();
            $product_id = Product::orderBy('id', 'desc')->first();
            //add images into product gallery table
            if ($request->product_gallery_image) {
                foreach ($request->product_gallery_image as $img) {
                    $g = new ProductImageGallery();
                    $g->product_id = $product_id->id;
                    $g->product_g_img = $img;
                    $g->save();
                }
            }

            // add catagory id into category_product table
            $cat = DB::table('category_products');
            foreach ($request->product_category as $category) {
                $cat->insert(['product_id' => $product_id->id, 'category_id' => $category]);
            }
            //add brand to brand_product
            $brand = DB::table('brand_products');
            foreach ($request->product_brand as $b) {
                $brand->insert(['product_id' => $product_id->id, 'brand_id' => $b]);
            }
            //add product info to product data table
            $product_data = new ProductData();
            $product_data->product_id = $product_id->id;
            if ($request->_regular_price) {
                $product_data->regular_price = $request->_regular_price;
            }
            if ($request->_sale_price) {
                $product_data->sale_price = $request->_sale_price;
            }
            if ($request->_sku) {
                $product_data->sku = $request->_sku;
            }
            if ($request->_shipping_weight) {
                $product_data->shipping_weight = $request->_shipping_weight;
            }
            if ($request->_shipping_height) {
                $product_data->shipping_height = $request->_shipping_height;
            }
            if ($request->_shipping_lenght) {
                $product_data->shipping_lenght = $request->_shipping_lenght;
            }
            if ($request->_rack_number) {
                $product_data->rack_number = $request->_rack_number;
            }
            if ($request->_unit) {
                $product_data->unit = $request->_unit;
            }
            if ($request->_unit_amount) {
                $product_data->unit_amount = $request->_unit_amount;
            }
            if ($request->_stock) {
                $product->stock = $request->_stock;
            }
            $product_data->save();
            //    return redirect()->route('backend.products')->with('success', 'Product created successfully');
        } else {
            //variable product 

            $product->title = $request->product_title;
            $product->description = $request->description;
            $product->type = $request->product_type;
            $product->stock_alert_quantity = $request->stock_alert_qnty;
            $product->stock_pre_alert_quantity = $request->stock_pre_alert_qnty;
            //    $product->brand_id = $request->product_brand;
            if ($request->short_description) {
                $product->short_description = $request->short_description;
            }
            if ($request->product_image) {
                $product->product_image = $request->product_image;
            }

            if ($request->meta_title) {
                $product->meta_title = $request->meta_title;
            }
            if ($request->meta_description) {
                $product->meta_description = $request->meta_description;
            }
            if ($request->meta_tags) {
                $product->meta_tags = $request->meta_tags;
            }

            $product->save();

            $product_id = Product::orderBy('created_at', 'desc')->first();
            //add category to category_product table
            $cat = DB::table('category_products');
            foreach ($request->product_category as $category) {
                $cat->insert(['product_id' => $product_id->id, 'category_id' => $category]);
            }
            //add brand to brand_product
            $brand = DB::table('brand_products');
            foreach ($request->product_brand as $b) {
                $brand->insert(['product_id' => $product_id->id, 'brand_id' => $b]);
            }
            // save atribute 
            if ($request->attr_name) {

                foreach ($request->attr_name as $attr) {
                    $attr = Attribute::where('attr_name', '=', $attr)->first();
                    DB::table('attribute_products')->insert(['product_id' => $product_id->id, 'attribute_id' => $attr->id, 'type' => 'Variable']);
                }
            }
            //add images into product gallery table
            if ($request->product_gallery_image) {
                foreach ($request->product_gallery_image as $img) {
                    $g = new ProductImageGallery();
                    $g->product_id = $product_id->id;
                    $g->product_g_img = $img;
                    $g->save();
                }
            }
            // add product data to the product
            if ($request->attr_item_id) {
                $i = 0;
                foreach ($request->attr_item_id as $attr) {
                    //add product info to product data table
                    $product_data = new ProductData();
                    $product_data->product_id = $product_id->id;
                    if ($request->regular_price) {
                        $product_data->regular_price = $request->_regular_price[$i];
                    }
                    if ($request->sale_price) {
                        $product_data->sale_price = $request->sale_price[$i];
                    }
                    if ($request->variable_img) {
                        $product_data->variation_img = $request->variable_img[$i];
                    }
                    if ($request->sku) {
                        $product_data->sku = $request->sku[$i];
                    }
                    if ($request->shipping_weight) {
                        $product_data->shipping_weight = $request->shipping_weight[$i];
                    }
                    if ($request->shipping_height) {
                        $product_data->shipping_height = $request->shipping_height[$i];
                    }
                    if ($request->shipping_lenght) {
                        $product_data->shipping_lenght = $request->shipping_lenght[$i];
                    }
                    if ($request->rack_number) {
                        $product_data->rack_number = $request->rack_number[$i];
                    }
                    if ($request->unit) {
                        $product_data->unit = $request->unit[$i];
                    }
                    if ($request->unit_amount) {
                        $product_data->unit_amount = $request->unit_amount[$i];
                    }

                    if ($request->stock) {
                        $product_data->stock = $request->stock[$i];
                    }

                    if ($request->attr_name) {
                        $attr_arr = [];
                        $attr_arr[$request->attr_name[0]] = $request->attr_item_id[$i];

                        $product_data->product_excerpt = json_encode($attr_arr);
                    }
                    $product_data->save();

                    $i++;
                }
            }
            if ($request->attr_item_id_one) {

                $i = 0;
                foreach ($request->attr_item_id_one as $attr) {
                    //add product info to product data table
                    $product_data = new ProductData();
                    $product_data->product_id = $product_id->id;
                    if ($request->regular_price) {
                        $product_data->regular_price = $request->regular_price[$i];
                    }
                    if ($request->sale_price) {
                        $product_data->sale_price = $request->sale_price[$i];
                    }
                    if ($request->sku) {
                        $product_data->sku = $request->sku[$i];
                    }
                    if ($request->variable_img) {
                        $product_data->variation_img = $request->variable_img[$i];
                    }
                    if ($request->shipping_weight) {
                        $product_data->shipping_weight = $request->shipping_weight[$i];
                    }
                    if ($request->shipping_height) {
                        $product_data->shipping_height = $request->shipping_height[$i];
                    }
                    if ($request->shipping_lenght) {
                        $product_data->shipping_lenght = $request->shipping_lenght[$i];
                    }
                    if ($request->rack_number) {
                        $product_data->rack_number = $request->rack_number[$i];
                    }
                    if ($request->unit) {
                        $product_data->unit = $request->unit[$i];
                    }
                    if ($request->unit_amount) {
                        $product_data->unit_amount = $request->unit_amount[$i];
                    }

                    if ($request->stock) {
                        $product_data->stock = $request->stock[$i];
                    }

                    if ($request->attr_name) {
                        // $attr_arr = [];
                        // $colors = ['Red', 'Green', 'Blue', 'Yellow', 'White', 'Teal', 'Cyne', 'Black', 'Pink', 'Purple'];
                        // $size = ['XS', 'L', 'M', 'L', 'XL'];
                        // if ($request->attr_name == 'Color') {
                        // }
                        // if ($request->attr_name == 'Size') {
                        // }
                        $attr_arr[$request->attr_name[0]] = $request->attr_item_id_one[$i];
                        $attr_arr[$request->attr_name[1]] = $request->attr_item_id_two[$i];
                        $product_data->product_excerpt = json_encode($attr_arr);
                    }

                    $product_data->save();

                    $i++;
                }
            }
        }
        return redirect()->route('backend.products')->with("success", "Product created successfully");
    }

    public function delete_product($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function edit_product($id)
    {
        $product = Product::where('id', '=', $id)->with("Category", "Productdata", "Attribute")->first();
        // return $product;
        $brands = Brand::orderBy('brand_title', 'asc')->get()
            ->map(function ($brand) {
                return [
                    'id' => $brand->id,
                    'brand_title' => $brand->brand_title,
                ];
            });

        $categories = Category::orderBy('category_title', 'asc')->where('status', '=', 'active')->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'category_title' => $category->category_title,
                ];
            });
        $attributes = Attribute::orderBy('attr_name', 'asc')->get()
            ->map(function ($attributes) {
                return [
                    'id' => $attributes->id,
                    'attr_name' => $attributes->attr_name,
                ];
            });
        return view('backend.products.edit_products')->with(['product' => $product, 'brands' => $brands, 'categories' => $categories, 'attributes' => $attributes]);
    }

    public function delete_img(Request $request)
    {
        ProductImageGallery::findOrFail($request->id)->delete();
        $gallery = ProductImageGallery::where('product_id', $request->product_id)->get();
        return $gallery;
    }

    public function update_product(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($request->product_type === 'simple') {
            $product->title = $request->product_title;
            if ($request->short_description) {
                $product->short_description = $request->short_description;
            }
            if ($request->product_image) {
                $product->product_image = $request->product_image;
            }
            if ($request->meta_title) {
                $product->meta_title = $request->meta_title;
            }
            if ($request->meta_description) {
                $product->meta_description = $request->meta_description;
            }
            if ($request->meta_tags) {
                $product->meta_tags = $request->meta_tags;
            }
            $product->description = $request->description;
            $product->type = $request->product_type;
            $product->stock_alert_quantity = $request->stock_alert_qnty;
            $product->stock_pre_alert_quantity = $request->stock_pre_alert_qnty;
            //    $product->brand_id = $request->product_brand;
            $product->save();

            //add images into product gallery table
            if ($request->product_gallery_image) {
                $old_gallery = ProductImageGallery::where("product_id", '=', $request->id)->get();
                foreach ($old_gallery as $old) {
                    $old->delete();
                }
                foreach ($request->product_gallery_image as $img) {
                    $g = new ProductImageGallery();
                    $g->product_id = $request->id;
                    $g->product_g_img = $img;
                    $g->save();
                }
            }
            // add catagory id into category_product table
            $cat = DB::table('category_products');
            DB::table('category_products')->where('product_id', '=', $request->id)->delete();
            foreach ($request->product_category as $category) {
                $cat->insert(['product_id' => $request->id, 'category_id' => $category]);
            }
            //add brand to brand_product
            $brand = DB::table('brand_products');
            DB::table('brand_products')->where('product_id', '=', $request->id)->delete();
            foreach ($request->product_brand as $b) {
                $brand->insert(['product_id' => $request->id, 'brand_id' => $b]);
            }
            //add product info to product data table

            $product_data = ProductData::where('product_id', '=', $request->id)->first();
            $product_data->product_id = $request->id;
            if ($request->_regular_price) {
                $product_data->regular_price = $request->_regular_price;
            }
            if ($request->_sale_price) {
                $product_data->sale_price = $request->_sale_price;
            }
            if ($request->_sku) {
                $product_data->sku = $request->_sku;
            }
            if ($request->_shipping_weight) {
                $product_data->shipping_weight = $request->_shipping_weight;
            }
            if ($request->_shipping_height) {
                $product_data->shipping_height = $request->_shipping_height;
            }
            if ($request->_shipping_lenght) {
                $product_data->shipping_lenght = $request->_shipping_lenght;
            }
            if ($request->_rack_number) {
                $product_data->rack_number = $request->_rack_number;
            }
            if ($request->_unit) {
                $product_data->unit = $request->_unit;
            }
            if ($request->_unit_amount) {
                $product_data->unit_amount = $request->_unit_amount;
            }
            if ($request->_stock) {
                $product_data->stock = $request->_stock;
            }
            $product_data->save();
            return redirect()->route('backend.products')->with('success', 'Product created successfully');
        } else {
            //variable product 
            // return $request->all();
            $product->title = $request->product_title;
            $product->description = $request->description;
            $product->type = $request->product_type;
            $product->stock_alert_quantity = $request->stock_alert_qnty;
            $product->stock_pre_alert_quantity = $request->stock_pre_alert_qnty;
            //    $product->brand_id = $request->product_brand;
            if ($request->short_description) {
                $product->short_description = $request->short_description;
            }
            if ($request->product_image) {
                $product->product_image = $request->product_image;
            }

            if ($request->meta_title) {
                $product->meta_title = $request->meta_title;
            }
            if ($request->meta_description) {
                $product->meta_description = $request->meta_description;
            }
            if ($request->meta_tags) {
                $product->meta_tags = $request->meta_tags;
            }

            $product->save();


            //add category to category_product table
            $cat = DB::table('category_products');
            DB::table('category_products')->where('product_id', '=', $request->id)->delete();
            foreach ($request->product_category as $category) {
                $cat->insert(['product_id' => $request->id, 'category_id' => $category]);
            }
            //add brand to brand_product
            $brand = DB::table('brand_products');
            DB::table('brand_products')->where('product_id', '=', $request->id)->delete();
            foreach ($request->product_brand as $b) {
                $brand->insert(['product_id' => $request->id, 'brand_id' => $b]);
            }
            // save atribute 
            if ($request->attr_name) {
                foreach ($request->attr_name as $attr) {
                    $attr = Attribute::where('attr_name', '=', $attr)->first();
                    DB::table('attribute_products')->insert(['product_id' => $request->id, 'attribute_id' => $attr->id, 'type' => 'Variable']);
                }
            }
            //add images into product gallery table
            if ($request->product_gallery_image) {
                $gallery = ProductImageGallery::where('product_id', '=', $request->id)->get();
                foreach ($gallery as $item) {
                    $item->delete();
                }
                foreach ($request->product_gallery_image as $img) {
                    $g = new ProductImageGallery();
                    $g->product_id = $request->id;
                    $g->product_g_img = $img;
                    $g->save();
                }
            }
            // add product data to the product
            if (count($request->sale_price) > 0) {
                $i = 0;
                $prod_data = ProductData::where('product_id', '=', $request->id)->get();
                foreach ($prod_data as $item) {
                    // foreach ($request->sale_price as $sale_price) {
                    //add product info to product data table
                    // $item = new ProductData();
                    $item->product_id = $request->id;
                    if ($request->regular_price) {
                        $item->regular_price = $request->regular_price[$i];
                    }
                    if ($request->sale_price) {
                        $item->sale_price = $request->sale_price[$i];
                    }
                    if ($request->variable_img) {
                        $item->variation_img = $request->variable_img[$i];
                    }
                    if ($request->sku) {
                        $item->sku = $request->sku[$i];
                    }
                    if ($request->shipping_weight) {
                        $item->shipping_weight = $request->shipping_weight[$i];
                    }
                    if ($request->shipping_height) {
                        $item->shipping_height = $request->shipping_height[$i];
                    }
                    if ($request->shipping_lenght) {
                        $item->shipping_lenght = $request->shipping_lenght[$i];
                    }
                    if ($request->rack_number) {
                        $item->rack_number = $request->rack_number[$i];
                    }
                    if ($request->unit) {
                        $item->unit = $request->unit[$i];
                    }
                    if ($request->unit_amount) {
                        $item->unit_amount = $request->unit_amount[$i];
                    }

                    if ($request->stock) {
                        $item->stock = $request->stock[$i];
                    }

                    // if (count($request->attr_name) == 1) {
                    //     $attr_arr = [];
                    //     $attr_arr[$request->attr_name[0]] = $request->attr_item_id[$i];

                    //     $product_data->product_excerpt = json_encode($attr_arr);
                    // } else {
                    //     $attr_arr = [];
                    //     $attr_arr[$request->attr_name[0]] = $request->attr_item_id_one[$i];
                    //     $attr_arr[$request->attr_name[1]] = $request->attr_item_id_two[$i];
                    //     $product_data->product_excerpt = json_encode($attr_arr);
                    // }

                    $item->save();

                    $i++;
                    // }
                }
            }

            return redirect()->route('backend.products')->with('success', 'Product created successfully');
        }
    }
}
