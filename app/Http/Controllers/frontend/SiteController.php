<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;


class SiteController extends Controller
{
    public function index($slug = null)
    {

        if($slug == null)
        {
            return $this->home();
        }
        else
        {
           $link = Link::where('slug', '=', $slug)->first();
           if($link != null)
           {
                $type = $link->type;
                switch($type)
                {
                    case 'category': { return $this->product_category($slug);}
                    case 'topic': { return $this->post_topic($slug);}
                    case 'supplier': { return $this->product_supplier($slug);}
                    case 'page': { return $this->post_page($slug);}
                    default: {return $this->error404($slug);}
                }
           }
           else
           {
                $product = Product::where([['slug', '=', $slug], ['status', '=', '1']])->first();
                if($product != null)
                {
                    return $this->product_detail($product);
                }
                else{
                   $post = Post::where([['slug', '=', $slug], ['status', '=', '1'], ['posttype', '=', 'post']])->first();
                   if($post != null)
                   {
                       return $this->post_detail($post);
                   }
                   else
                   {
                    return $this->error404($slug);
                   }
                }
           }
        }
    }
    private function home()
    {
        $list_category = Category::where([['status','!=',0],['parentid', '=', 0]])->orderby('orders','asc')->get();
        return view('frontend.home', compact('list_category'));
    }
    //Sản phẩm
    public function product()
    {
        $list_category = Category::where('status', '=', '1')->get();
        $list_supplier = Supplier::where('status', '=', '1')->get();
        if(isset($_GET['sortby']))
        {
            $sort_by = $_GET['sortby'];
            switch($sort_by)
            {
                case 'kytu_az':
                    {
                        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('name', 'asc')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'kytu_za':
                    {
                        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('name', 'desc')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'giagiamdan':
                    {
                        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('price', 'desc')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'giatangdan':
                    {
                        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('price', 'asc')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'moinhat':
                    {
                        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('created_at', 'desc')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:duoi500000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'],['price', '<', '500000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:500000vnd_1000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'], ['price', '>=', '500000'], ['price', '<', '1000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:1000000vnd_3000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'], ['price', '>=', '1000000'], ['price', '<', '3000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:3000000vnd_6000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'], ['price', '>=', '3000000'], ['price', '<', '6000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:6000000vnd_9000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'], ['price', '>=', '6000000'], ['price', '<', '9000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:9000000vnd_15000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'], ['price', '>=', '9000000'], ['price', '<', '15000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                case 'gia:tren15000000vnd':
                    {
                        $list_product = Product::where([['status', '=', '1'],['price', '>=', '15000000']])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
                        ->paginate(12);
                        return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
                    }
                default :
                    {
                        return $this->error404($sort_by);
                    }
        }
        }
        else
        {
            $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('id', 'desc')
            ->get();
            return view('frontend.product', compact('list_product', 'list_category', 'list_supplier'));
        }

    }
    private function product_category($slug)
    {
        $list_category = Category::where('status', '=', '1')->get();
        $list_supplier = Supplier::where('status', '=', '1')->get();
        $category = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $catId = $category->id;
        $catSlug = $category->slug;
        $arrCatId = array();
        array_push($arrCatId, $catId);
        $list_cat2 = Category::where([['status', '=', 1], ['parentid', '=', $catId]])->get();
        if(count($list_cat2) > 0){
            foreach($list_cat2 as $cat2){
                array_push($arrCatId, $cat2->id);
                $list_cat3 = Category::where([['status', '=', 1], ['parentid', '=', $cat2->id]])->get();
                if(count($list_cat3) > 0){
                    foreach($list_cat3 as $cat3){
                         array_push($arrCatId, $cat3->id);
                    }
                }
            }
        }
        if(isset($_GET['sortby']))
        {


            $sort_by = $_GET['sortby'];
            switch($sort_by)
            {
                case 'kytu_az':
                    {
                        $list_product_cat = Product::where('products.status','=', '1')
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->orderBy('productname', 'asc')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'kytu_za':
                    {
                        $list_product_cat = Product::where('products.status','=', '1')
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->orderBy('productname', 'desc')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'giagiamdan':
                    {
                        $list_product_cat = Product::where('products.status','=', '1')
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->orderBy('products.price', 'desc')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'giatangdan':
                    {
                        $list_product_cat = Product::where('products.status','=', '1')
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->orderBy('products.price', 'asc')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'moinhat':
                    {
                        $list_product_cat = Product::where('products.status','=', '1')
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->orderBy('products.created_at', 'desc')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:duoi500000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '<', '500000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:500000vnd_1000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '500000'], ['price', '<', '1000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:1000000vnd_3000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '1000000'], ['price', '<', '3000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:3000000vnd_6000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '3000000'], ['price', '<', '6000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:6000000vnd_9000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '6000000'], ['price', '<', '9000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:9000000vnd_15000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '9000000'], ['price', '<', '15000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                case 'gia:tren15000000vnd':
                    {
                        $list_product_cat = Product::where([['products.status','=', '1'], ['price', '>=', '15000000']])
                        ->whereIn('catid', $arrCatId)
                        ->join('category', 'category.id', '=', 'products.catid')
                        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.slug as productslug')
                        ->paginate(12);
                        return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
                    }
                default :
                    {
                        return $this->error404($sort_by);
                    }
        }
        }
        else
        {
            $list_product_cat = Product::where('products.status','=', '1')
            ->whereIn('catid', $arrCatId)
            ->join('category', 'category.id', '=', 'products.catid')
            ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.id as productid, products.slug as productslug')
            ->paginate(12);
            return view('frontend.product-category', compact('list_product_cat', 'category', 'list_category', 'list_supplier'));
        }

    }
    private function product_supplier($slug)
    {
        $list_category = Category::where('status', '=', '1')->get();
        $list_supplier = Supplier::where('status', '=', '1')->get();
        $supplier = Supplier::where([['status', '=', 1], ['slug', '=', $slug]])->first();

        

        $list_product_supp = Product::where([['products.status','=', '1'], ['suppliers.slug', '=', $slug]])
        ->join('suppliers', 'suppliers.id', '=', 'products.suppid')
        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai, products.name as productname, products.id as productid, products.id as productid, products.slug as productslug')
        ->paginate(12);
        return view('frontend.product-supplier', compact('supplier','list_category', 'list_supplier', 'list_product_supp'));
    }
    private function product_detail($slug)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $product_detail = Product::where('slug', '=', $slug->slug)->first();
        $list_category = Category::where('status', '=', '1')->get();
        $list_supplier = Supplier::where('status', '=', '1')->get();
        $list_same_product = Product::where([['status', '=', '1'],['catid', '=', $slug->catid]])->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->orderBy('created_at', 'desc')->limit(10)->get();
        $list_new_product = Product::where('status', '=', '1')->orderBy('created_at', 'desc')->limit(6)->get();
        return view('frontend.product-detail', compact('product_detail', 'list_category', 'list_supplier', 'list_same_product', 'list_new_product'));
    }


    //Bài viết
    public function post()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $single_post = Post::where([['status' , '=', '1'], ['posts.posttype', '=', 'post']])->orderBy('created_at', 'desc')->first();
        $list_news_post = Post::where([['posts.status' , '=', '1'], ['posts.posttype', '=', 'post']])
        ->join('topics', 'topics.id', '=', 'posts.topid')
        ->orderby('posts.created_at','desc')
        ->select('posts.*', 'topics.name', 'topics.slug as slugtop')
        ->paginate(6);
        $list_category = Category::where('status', '=', '1')->get();
        $list_topic = Topic::where('status', '=', '1')->get();
        $list_hot_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->get();
        return view('frontend.post', compact('single_post', 'list_news_post', 'list_category', 'list_topic', 'list_hot_post'));
    }
    private function post_topic($slug)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $topic = Topic::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $list_news_post = Post::where([['posts.status' , '=', '1'], ['posts.posttype', '=', 'post'], ['topics.slug', '=', $slug]])
        ->join('topics', 'topics.id', '=', 'posts.topid')
        ->orderby('posts.created_at','desc')
        ->select('posts.*', 'topics.name', 'topics.slug as slugtop')
        ->paginate(6);
        $list_category = Category::where('status', '=', '1')->get();
        $list_topic = Topic::where('status', '=', '1')->get();
        $list_hot_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->get();
        return view('frontend.post-topic', compact('topic', 'list_news_post', 'list_category', 'list_topic', 'list_hot_post'));
    }
    private function post_page($slug)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post_detail = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $list_category = Category::where('status', '=', '1')->get();
        $list_topic = Topic::where('status', '=', '1')->get();
        $list_hot_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->limit(6)->get();
        $list_new_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->limit(6)->orderBy('created_at', 'desc')->get();
        return view('frontend.post-page', compact('post_detail', 'list_category', 'list_topic', 'list_hot_post', 'list_new_post'));
    }
    private function post_detail($slug)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $post_detail = Post::find($slug)->first();
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        $list_category = Category::where('status', '=', '1')->get();
        $list_topic = Topic::where('status', '=', '1')->get();
        $list_hot_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->limit(6)->get();
        $list_new_post = Post::where([['status' , '=', '1'], ['posttype', '=', 'post']])->limit(6)->orderBy('created_at', 'desc')->get();

        return view('frontend.post-detail', compact('post_detail', 'users', 'list_category', 'list_topic', 'list_hot_post', 'list_new_post'));
    }

    //Ko tìm thấy trang
    private function error404($slug)
    {
        return view('frontend.error404');
    }


}
