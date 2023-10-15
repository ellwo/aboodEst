<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePart;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //



        $services=Service::all();
        return view('backend.pages.services.index',[
            'services'=>$services
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('backend.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'titel'=>['required'],
            'img'=>['required'],
        ]);

        Service::create(
            [
                'titel'=>$request['titel'],
                'img'=>$request['img'],
                'note'=>$request['note']
            ]
            );

            return redirect()->route('services')->with('status','تم تعديل الخدمة ينجاح ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {


        $serPart=$service->service_parts->first();

        $steps=[
            '0'=>[
                'title'=>'متطلبات الحصول على تأشيرة عمل في المملكة العربية السعودية',
                'type'=>'counter',
                'steps'=>[
                    'جواز السفر ساري المفعول',
                    'صورتين خلفية بيضاء 4×6',
                    'الفحص الطبي من احدى المستشفيات المعتمدة',
                    'صورة التأشيرة',
                    'صورة هوية الكفيل للأفراد أو السجل التجاري للشركات',
                    'عمل تفويض إلكتروني بإسم أجياد ترخيص رقم 17',
                ]

                ],
                '1'=>[
                    'title'=>'تعليمات اضافية',
                    'type'=>'point',
                    'steps'=>[
                        'يجب الا تقل صلاحية الجواز عن ستة أشهر.',
                        'مطابقة المهنة في الجواز للمهنه في فيزة العمل.',
                        'المستشفيات المعتمدة لعمل الفحص الطبي هي'=>[
                            'مستشفى آزال صنعاء - عدن',
                            'مستشفى صابر عدن'
                        ],
                        'إرفاق اصل شهادة المؤهل العلمي معمدة من الجهات الحكومية لفيز العمل المتخصصة',
                        'لا يقل عمر المتقدم لنيل فيزة العمل عن 21 سنة ولا يزيد عن 40 سنة.',
                    ]

                ]

        ];

        // foreach($steps as $se){

        //     foreach($se['steps'] as $k=>$v){
        //         echo $k."------".$v."<br/>";
        //     }

        // }
        // $serPart->update([
        //     'steps'=>$steps
        // ]);

        // return dd("hh");


        return view('backend.pages.services.show',['service'=>$service]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('backend.pages.services.edit',[
            'service'=>$service
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {



    //    return dd($request);



        $all_steps=[];
        $c=0;

        foreach($request["servicePartid"]??[] as $serp_id){

            $steps=[];


            foreach($request['titles'.$serp_id]??[] as $k=>$v){

                $substeps=[];
                foreach($request["steps".$serp_id."_".$k]??[] as $s){
                    if($s!=null)
                    $substeps[]=$s;
                }

                $steps[]=[
                    'title'=>$v,
                    'steps'=>$substeps,
                    'type'=>$request['types'.$serp_id."_".$k][0]??"counter"
                ];
            }


            $all_steps[]=[
                'id'=>$serp_id,
                'title'=>$request['steptitel'][$c],
                'note'=>$request['stepnote'][$c],
                'steps'=>$steps
            ];
            // $serPart->update([
            //     'title'=>$request['steptitel'][$c],
            //     'note'=>$request['stepnote'][$c],
            //     'steps'=>$steps
            // ]);


            $c++;


        }



        $service->service_parts()->delete();



        foreach($all_steps as $serpart){
        ServicePart::updateOrCreate([
              'id'=>$serpart['id']
            ],[
                 'titel'=>$serpart['title'],
                 'note'=>$serpart['note'],
                 'steps'=>$serpart['steps'],
                 'service_id'=>$service->id
            ]);


        }




  //   return dd($all_steps);

       // return dd($request);
        $this->validate($request,[
            'titel'=>['required'],
            'img'=>['required'],
        ]);

        $service->update(
            [
                'titel'=>$request['titel'],
                'img'=>$request['img'],
                'note'=>$request['note']
            ]
            );

            return redirect()->route('services')->with('status','تم تعديل الخدمة ينجاح ');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
