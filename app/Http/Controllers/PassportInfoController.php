<?php

namespace App\Http\Controllers;

use App\Models\PassportInfo;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PassportInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //\
        return view('backend.pages.passportinfos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function search(Request $requset){



        if($requset->isMethod('GET'))
        return view('pages.passportinfos.search');





        $res=PassportInfo::where('pass_num','=',$requset['pass_num'])
        ->first();


        $resultt=View::make('result',['pass'=>$res,'pass_num'=>$requset['pass_num']]);

        $state=$res!=null?true:false;
        return $data=[
            'resulteView'=>"".$resultt."",
        'state'=>$state,
        'pass_num'=>$requset['pass_num']
    ];

        return  response(['res'=>view('result',['pass'=>$res]) ],200);

    }

    /**
     * Store a newly created resource in storage.
     */


     function createx(Request $request) {



        foreach($request["data"] as $row){

            PassportInfo::updateOrCreate(
                [
                    'pass_num'=>$row[0]
                ],[
                'pass_num' => $row[0],
                'name' => $row[1],
                'office_name'=>$row[2],
                'agency_name' => $row[2],
                'received_date' => $row[3]!=null?$this->getDateF($row[3]):null,
                'sending_embassy_date' => $row[4]!=null?$this->getDateF($row[4]):null,
                 'departure_embassy_date' =>$row[5]!=null?$this->getDateF($row[5]):null
                 ,
                 'delivery_date' => $row[6]!=null?$this->getDateF($row[6]):null
                ,
                'state_info' => $row[7],
                 ]);

        }

        return response(['state'=>true],200);
     }


     function getDateF($d)  {


        try{
        $dd=date('Y-m-d',strtotime($d));
        $d=new DateTime($dd);

        return $d->format('Y-m-d');
        }catch(Exception $e){
            return null;
        }
     }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PassportInfo $passportInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PassportInfo $passportInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PassportInfo $passportInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PassportInfo $passportInfo)
    {
        //
    }
}
