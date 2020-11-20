<?php

namespace App\Http\Controllers;

use App\Subscribers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SubscriberController
 * @package App\Http\Controllers
 */
class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows a list of subscribers
     * @method index
     * @param Subscribers $subscribers
     * @return Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(Subscribers $subscribers)
    {
        $subscribers->all();

        return view('admin.subscriberslist',compact('subscribers'));
    }

    /**
     * Download a list of subscribers
     * @method download
     */
    public function download()
    {

        $output = fopen('php://output', 'w');

        fputcsv($output, array('Subscribers Emails'));

        $result = Subscribers::all();

        foreach ($result as $row){
            fputcsv($output, $row->toArray());
        }

        fclose($output);

        header('Content-Type: text/csv; charset=utf-8');

        header('Content-Disposition: attachment; filename=subscribers.csv');

    }

}
