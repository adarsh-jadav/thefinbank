<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\Category;
use App\Models\admin\Banner;
use App\Models\admin\PopularProducts;
use App\Models\Product;
use App\Models\Enquiry;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use App\Helpers\Helper;

class HomeController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
    }


    function index(){
        $data['error'] = "";
        $data['all_categories'] = Category::orderBy('set_order', 'ASC')->get();

        $data['popular_products_1'] = PopularProducts::orderBy('set_order', 'ASC')
                                                    ->where('set_home_1',1)
                                                    ->get();

        $data['popular_products_2'] = PopularProducts::orderBy('set_order', 'ASC')
                                                    ->where('set_home_2',1)
                                                    ->get();

        $data['all_banners'] = Banner::orderBy('set_order', 'ASC')->get();
        $data['all_products'] = Product::orderBy('set_order', 'ASC')
                                            ->where('set_home',1)
                                            ->get();
        $data['system']=DB::table('system')->where('id',1)->first();
        $data['testimonial']=DB::table('testimonial')->orderBy('id','DESC')->get();
      //  echo "<pre>";print_r($data['banner']);echo "</pre>";exit;
        $data['meta_title'] = '';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.index',$data);
    }

    function products(Request $request, $categoryUrl){
        $data['error'] = "";
        $data['category_data'] = $category_data = Category::where('page_url',$categoryUrl)->first();
        $data['products_data'] = Product::where('category_id',$category_data->id)->get();
        $data['meta_title'] = '';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.products',$data);
    }

    public function product_detail(Request $request, $categoryUrl = null, $page_url = null)
    {
        $data['error'] = "";

        if ($categoryUrl != "" && $page_url != "") {
            $data['product_detail'] = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.page_url', $categoryUrl)
                ->where('products.page_url', $page_url)
                ->select('products.*', 'categories.page_url as category_page_url')
                ->first();
        } else {
            $data['product_detail'] = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('products.page_url', trim($categoryUrl))
                ->select('products.*', 'categories.page_url as category_page_url')
                ->first();
        }

        if ($data['product_detail']) {
            $data['meta_title'] = $data['product_detail']->meta_title ?? '';
            $data['meta_keyword'] = $data['product_detail']->meta_keyword ?? '';
            $data['meta_description'] = $data['product_detail']->meta_description ?? '';
        } else {
            $data['error'] = 'Product not found';
            $data['meta_title'] = $data['meta_keyword'] = $data['meta_description'] = '';
        }
        return view('front.product-detail', $data);
    }


    function product_listing(Request $request){
        $data['error'] = "";
        $data['all_products'] = Product::orderBy('name','ASC')->get();
        $data['meta_title'] = '';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.products-listing',$data);
    }

    public function about_us(Request $request){
        $data['meta_title'] = 'About Us';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.about-us',$data);
    }
    public function contact_us(Request $request){
        $data['meta_title'] = 'Contact Us';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.contact-us',$data);
    }
    public function apply_now(Request $request){
        $data['meta_title'] = 'Apply Now';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.apply-now',$data);
    }

    public function enquiry_now_form($page_url){
        $data['product_detail'] = Product::where('page_url',$page_url)->first();
        $data['meta_title'] = '';
        $data['meta_keyword'] = '';
        $data['meta_description'] = '';
        return view('front.enquiry-form',$data);
    }

    public function enquiry_form_store(Request $request){

        if($request->g_token !="" && !empty($request->g_token)){

            $enquiry = new Enquiry;
            $enquiry->product_id = $request->product_id;
            $enquiry->category_id = $request->category_id;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone_no = $request->phone_no;
            $enquiry->message = $request->message;
            $enquiry->save();

            $html_email = '<!doctype html> <html>

            <head>
                <meta charset="utf-8">
                <title>Registration Email</title>
                <style>
                    .logo {
                        text-align: center;
                        width: 100%;
                          }

                    .wrapper {

                        width: 100%;

                        max-width:500px;

                        margin:auto;

                        font-size:14px;

                        line-height:24px;

                        font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;

                        color:#555;

                    }

                    .wrapper div {

                        height: auto;

                        float: left;

                        margin-bottom: 15px;

                        width:100%;

                    }

                    .text-center {

                        text-align: center;

                    }

                    .email-wrapper {

                        padding:5px;

                        border:1px solid #ccc;

                        width:100%;

                    }

                    .big {

                        text-align: center;

                        font-size: 26px;

                        color: #e31e24;

                        font-weight: bold;

                        margin-bottom: 0 !important;

                        text-transform: uppercase;

                        line-height: 34px;
                    }

                    .welcome {

                        font-size: 17px;

                        font-weight: bold;
                    }

                    .footer {

                        text-align: center;

                        color: #999;

                        font-size: 13px;
                    }

                </style>
            </head>
            <body>
                <div class="wrapper" >

                    <div class="logo">
                       <img src="'.asset("public/front/assets/images/logo.png").'" style="width: 30%;" >
                    </div>
                    <div class="email-wrapper" >
                        <table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td style="font-size:18px;">Hello ,</td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:20px;">
                                               Please find the below Enqiry details
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td width="50%">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                                    <tr><td width="100px">Category: </td><td>'.Helper::get_category_name($request->category_id).'</td></tr>
                                                    <tr><td width="100px">Product: </td><td>'.Helper::get_product_name($request->product_id).'</td></tr>
                                                    <tr><td width="100px">Name: </td><td>'.$request->name.'</td></tr>
                                                    <tr><td width="100px">Email: </td><td>'.$request->email.'</td></tr>
                                                    <tr><td width="100px">Phone No: </td><td>'.$request->phone_no.'</td></tr>
                                                    <tr><td width="100px">Message: </td><td>'.$request->message.'</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </body>
        </html>';
        $subject = "Thank you for Enquiry Now - The FinBank";
        $admin = 'amvisolution@gmail.com';


        $body = "
        <html>
        <body>
            <div style='padding:10px 30px;width:600px;border:1px solid #263289';>
                <div style='text-align:center'>
                    <a href='".url('/')."' target='_blank'>
                    <img src='".asset("public/front/assets/images/logo.png")."' style='width:180px';>
                    </a>
                </div>
                <hr>
            <div>
                <p>Dear <b>".ucfirst($request->name)."</b>,<p>

                <p>Thank you for getting in touch! </p>

                <p>We appreciate you contacting us. One of our team members will get back in touch with you soon!</p>
                <p>Have a great day!</p>

                <p>Thanks & Regards,</p>
                <p>Team The FinBank</p>
            </div>
        </div>
        </body>
    </html>";
    $userEmail = $request->email;

            Mail::send([], [], function($message) use($html_email, $admin, $subject) {
                $message->to($admin);
                $message->subject($subject);
                $message->from('ventesh.hnrtechnologies@gmail.com', 'The FinBank');
                $message->html($html_email);
            });

            Mail::send([], [], function($message) use($body, $userEmail, $subject) {
                $message->to($userEmail);
                $message->subject($subject);
                $message->from('ventesh.hnrtechnologies@gmail.com', 'The FinBank');
                $message->html($body);
            });
            return response()->json(['message' => 'TRUE']);
        }else{
            return response()->json(['message' => 'CAPTCHA']);
        }

    }


    public function contact_form_store(Request $request){

        //echo "<pre>";print_r($request->all());echo "</pre>";exit;

        if($request->g_token !="" && !empty($request->g_token)){

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_no = $request->phone_no;
            $contact->message = $request->message;
            $contact->save();

            $html_email = '<!doctype html> <html>

            <head>
                <meta charset="utf-8">
                <title>Registration Email</title>
                <style>
                    .logo {
                        text-align: center;
                        width: 100%;
                          }

                    .wrapper {

                        width: 100%;

                        max-width:500px;

                        margin:auto;

                        font-size:14px;

                        line-height:24px;

                        font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;

                        color:#555;

                    }

                    .wrapper div {

                        height: auto;

                        float: left;

                        margin-bottom: 15px;

                        width:100%;

                    }

                    .text-center {

                        text-align: center;

                    }

                    .email-wrapper {

                        padding:5px;

                        border:1px solid #ccc;

                        width:100%;

                    }

                    .big {

                        text-align: center;

                        font-size: 26px;

                        color: #e31e24;

                        font-weight: bold;

                        margin-bottom: 0 !important;

                        text-transform: uppercase;

                        line-height: 34px;
                    }

                    .welcome {

                        font-size: 17px;

                        font-weight: bold;
                    }

                    .footer {

                        text-align: center;

                        color: #999;

                        font-size: 13px;
                    }

                </style>
            </head>
            <body>
                <div class="wrapper" >

                    <div class="logo">
                       <img src="'.asset("public/front/assets/images/logo.png").'" style="width: 30%;" >
                    </div>
                    <div class="email-wrapper" >
                        <table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td style="font-size:18px;">Hello ,</td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:20px;">
                                               Please find the below Contact Us details
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td width="50%">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                                    <tr><td width="100px">Name: </td><td>'.$request->name.'</td></tr>
                                                    <tr><td width="100px">Email: </td><td>'.$request->email.'</td></tr>
                                                    <tr><td width="100px">Phone No: </td><td>'.$request->phone_no.'</td></tr>
                                                    <tr><td width="100px">Message: </td><td>'.$request->message.'</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </body>
        </html>';
        $subject = "Thank you for Contact Us - The FinBank";
        // $admin = 'ventesh.hnrtechnologies@gmail.com';
        $admin = 'amvisolution@gmail.com';


        $body = "
        <html>
        <body>
            <div style='padding:10px 30px;width:600px;border:1px solid #263289';>
                <div style='text-align:center'>
                    <a href='".url('/')."' target='_blank'>
                    <img src='".asset("public/front/assets/images/logo.png")."' style='width:180px';>
                    </a>
                </div>
                <hr>
            <div>
                <p>Dear <b>".ucfirst($request->name)."</b>,<p>

                <p>Thank you for getting in touch! </p>

                <p>We appreciate you contacting us. One of our team members will get back in touch with you soon!</p>
                <p>Have a great day!</p>

                <p>Thanks & Regards,</p>
                <p>Team The FinBank</p>
            </div>
        </div>
        </body>
    </html>";
    $userEmail = $request->email;

            Mail::send([], [], function($message) use($html_email, $admin, $subject) {
                $message->to($admin);
                $message->subject($subject);
                $message->from('ventesh.hnrtechnologies@gmail.com', 'The FinBank');
                $message->html($html_email);
            });

            Mail::send([], [], function($message) use($body, $userEmail, $subject) {
                $message->to($userEmail);
                $message->subject($subject);
                $message->from('ventesh.hnrtechnologies@gmail.com', 'The FinBank');
                $message->html($body);
            });
            return response()->json(['message' => 'TRUE']);
        }else{
            return response()->json(['message' => 'CAPTCHA']);
        }

    }


}