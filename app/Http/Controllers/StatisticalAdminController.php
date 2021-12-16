<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;

class StatisticalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistical_post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter_by_date(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $get = DB::table('bai_viet')->whereBetween('created_at',[$from_date, $to_date])
        ->select('created_at',
            DB::raw('count(*) as bai_viet'),
        )
        ->groupBy('created_at')->get();

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $data[] = array(
                'created_at' => $date,
                'bai_viet' => $val->bai_viet,
            );
        }

        return response()->json($data, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard_filter(Request $request){

        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $dauthang10 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(1)->startOfMonth()->toDateString();
        $cuoithang10 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(1)->endOfMonth()->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){

            $get = DB::table('bai_viet')->whereBetween('created_at',[$sub7days,$now])
            ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();

        }elseif($data['dashboard_value']=='thangtruoc'){

            $get = DB::table('bai_viet')->whereBetween('created_at',[$dau_thangtruoc,$cuoi_thangtruoc])
            ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();

        }elseif($data['dashboard_value']=='thangnay'){

            $get = DB::table('bai_viet')->whereBetween('created_at',[$dauthangnay,$now])
            ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();

        }elseif ($data['dashboard_value']=='thang10') {

            $get = DB::table('bai_viet')->whereBetween('created_at',[$dauthang10,$cuoithang10])
            ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();

        }else{
            $get = DB::table('bai_viet')->whereBetween('created_at',[$sub365days,$now])
            ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();
        }

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $chart_data[] = array(
                'created_at' => $date,
                'bai_viet' => $val->bai_viet,
            );
        }
        echo $data = json_encode($chart_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function days_post(){

        $sub100days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(100)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = DB::table('bai_viet')->whereBetween('created_at',[$sub100days,$now])
        ->select('created_at',
            DB::raw('count(*) as bai_viet'),
            )
            ->groupBy('created_at')->get();

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $chart_data[] = array(
                'created_at' => $date,
                'bai_viet' => $val->bai_viet,
            );
        }
       echo $data = json_encode($chart_data);
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
}
