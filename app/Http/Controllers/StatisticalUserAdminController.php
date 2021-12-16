<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Session;
use Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;

class StatisticalUserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistical_user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose_by_date(Request $request)
    {
        $tu_ngay = $request->tu_ngay;
        $den_ngay = $request->den_ngay;

        $get = DB::table('nguoi_dung')->whereBetween('created_at',[$tu_ngay, $den_ngay])
        ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
        )
        ->groupBy('created_at')->get();

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $data[] = array(
                'created_at' => $date,
                'nguoi_dung' => $val->nguoi_dung,
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
    public function dashboard_choose(Request $request)
    {
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $dauthang8 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(3)->startOfMonth()->toDateString();
        $cuoithang8 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(3)->endOfMonth()->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){

            $get = DB::table('nguoi_dung')->whereBetween('created_at',[$sub7days,$now])
            ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();

        }elseif($data['dashboard_value']=='thangtruoc'){

            $get = DB::table('nguoi_dung')->whereBetween('created_at',[$dau_thangtruoc,$cuoi_thangtruoc])
            ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();

        }elseif($data['dashboard_value']=='thangnay'){

            $get = DB::table('nguoi_dung')->whereBetween('created_at',[$dauthangnay,$now])
            ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();

        }elseif ($data['dashboard_value']=='thang8') {

            $get = DB::table('nguoi_dung')->whereBetween('created_at',[$dauthang8,$cuoithang8])
            ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();

        }else{
            $get = DB::table('nguoi_dung')->whereBetween('created_at',[$sub365days,$now])
            ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();
        }

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $chart_data[] = array(
                'created_at' => $date,
                'nguoi_dung' => $val->nguoi_dung,
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
    public function days_user()
    {
        $sub120days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(120)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = DB::table('nguoi_dung')->whereBetween('created_at',[$sub120days,$now])
        ->select('created_at',
            DB::raw('count(*) as nguoi_dung'),
            )
            ->groupBy('created_at')->get();

        foreach($get as $key => $val){
            $date = \Carbon\Carbon::parse($val->created_at)->format('Y-m-d');
            $chart_data[] = array(
                'created_at' => $date,
                'nguoi_dung' => $val->nguoi_dung,
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
