<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Review;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;


class AjaxController extends Controller
{
    public function loadcomment(Request $request)
    {
        $postid = $request->postid;
        $comments = Comment::where('postid', '=', $postid)->get();

        $output = '
        <h5 class="postnews__detail--comment-count">Bình luận (<span>'.count($comments).'</span> bình luận)</h5>
        <div class="postnews__detail--comment-top">
            <div class="grid postnews__detail--comment-showconatiner">';
        foreach($comments as $comment)
        {
            $output .= '
            <div class="row" style="margin-bottom:20px">
                <div class="col l-1">
                    <div class="postnews__detail--comment-showavatar" ><i class="fas fa-user-astronaut"></i></div>
                </div>
                <div class="col l-11">
                    <div class="postnews__detail--comment-showbox">
                        <div class="postnews__detail--comment-showname">
                            <span class="comment-showname">'.$comment->name.'</span>
                        </div>
                        <div class="postnews__detail--comment-showtime">
                            <span>'.$comment->created_at.'</span>
                        </div>
                        <div class="postnews__detail--comment-showcontent">
                            <p>'.$comment->content.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }

        $output .= '</div>
            </div>';

        return $output;
    }

    public function sendcomment(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $comment = new Comment();
        $comment->postid = $request->postid;
        $comment->content = $request->commContent;
        $comment->name = $request->commName;
        $comment->email = $request->commEmail;
        $comment->save();
    }

    public function loadreview(Request $request)
    {
        $productid = $request->productid;
        $review_list = Review::where('productid', '=', $productid)->orderBy('created_at', 'desc')->get();
        return $review_list;
    }
    public function sendreview(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $review = new Review();
        $review->productid = $request->productid;
        $review->star = $request->star;
        $review->content = $request->revContent;
        $review->name = $request->revName;
        $review->email = $request->revEmail;
        $review->created_by = 1;
        $review->updated_by = 1;
        $review->save();
    }

    public function sendcart(Request $request)
    {
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $cartList = json_decode($request->cartList, true);
      $order = new Order();
      $order->userid = Auth::user()->id;
      $order->fullname = $request->nameReciver;
      $order->phone = $request->phoneReciver;
      $order->email = $request->emailReciver;
      $order->address = $request->addressReciver;
      $order->note = $request->noteReciver;
      $order->status = 3;
      $order->updated_by = 1;
      $order->save();
      foreach($cartList as $cartItems) {
          $arrays = json_decode($cartItems, true);
          $orderdetail = new Orderdetail();
          $orderdetail->orderid = $order->id;
          $orderdetail->productid = $arrays["id"];
          $orderdetail->number = $arrays["quantity"];
          $orderdetail->amount = $arrays["amount"];
          $orderdetail->price = $arrays["price"];
          $orderdetail->save();
      }
    }

    
    public function products(Request $request)
    {
        $list_product = Product::where('status', '=', '1')->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')
        ->offset($request->start)->limit($request->limit)->get();
        return $list_product;
    }
    public function search(Request $request)
    {
        if($request->keywords == ''){
            $list_products = [];
            return $list_products;
        }
        $list_products = Product::where([['status', '=', 1], ['name', 'like', $request->keywords.'%']])->limit(5)
        ->get();
        return $list_products;
    }
}
