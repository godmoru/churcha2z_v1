<?php
/*
Project: Membership/Information Management Software - Dunamis International Gospel Center, Abuja
File Name: Class Controller 
Description: Core classes management functionalities controller.
Author: Umoru Godfrey, E. 
Address: GESUSOFT Technology, Abuja Nigeria
godfrey.umoru@gesusoft.com
Date Created: 16th September, 2018.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ClassesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }


    public function getclasses()
    {

    	$param['pageName'] = "Classes List";
    	$param['classcat'] = \App\ClassCategory::where('status',1)->orderBy('id','asc')->get();
    	return view('classes.index', $param);
    }

    public function oneclass($id)
    {

        $id = \Crypt::decrypt($id);
        
        $param['class'] = \App\ClassCategory::find($id);

        if ($param['class']->id == 1) {
            $param['participants'] = \App\People::where('fclass_status',1)->get();
            $param['batches'] = \App\FoundationClass::all();
         }
         elseif ($param['class']->id == 2) {
            $param['participants'] = \App\People::where('dltc_status',1)->get();
            }
        // else {
        //     return 0;
        // }
        $param['pageName'] = $param['class']->cat_name. "'s Profile";
        return view('classes.one', $param);
    }

    public function batches()
    {
        $param['pageName'] = "Foundation Class Batches";
        $param['cno'] = mt_rand(9, 10000013234);
        
        
         if(auth()->user()->hasRole('fc-coordinator'))
            {
                $param['classes'] = \App\FoundationClass::where('counselor_id',\Auth::user()->counselorData->id)->orderBy('name','asc')->get();
                // $param['classes'] = \App\FoundationClass::where('counselor_id',\Auth::user()->id)->orderBy('name','asc')->get();
            }
            else {
            $param['classes'] = \App\FoundationClass::where('status',1)->orderBy('name','asc')->get();
        }
        return view('classes.fclass.index', $param); 
    }

    public function onebatch($id)
    {
        $id = \Crypt::decrypt($id);
        $param['batchname'] = \App\FoundationClass::find($id);
        $location_id = \Auth::user()->location_id;

        $param['batch'] = \DB::select("SELECT DISTINCT 
            p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, p.id as PId, b.name as BName, 
                coun.surname as CounselorName, coun.othernames as CounselorOtherName, coun.email as CounselorEmail, coun.phone1 as CounselorPhone1, 
                    fca.class_1_status as class_1_status, fca.class_2_status as class_2_status, fca.class_3_status as class_3_status, 
                    fca.class_4_status as class_4_status, fca.class_5_status as class_5_status, fca.class_6_status as class_6_status 
                    FROM people p 
            LEFT JOIN foundation_class_attendances fca ON fca.people_id = p.id 
            LEFT JOIN foundation_classes b ON b.id = fca.foundation_class_id 
            LEFT JOIN counselors coun ON coun.id = fca.c1_counselor_id  
            WHERE b.id = $id ORDER BY p.fullnames asc");

        $param['counselors'] = \App\Counselor::all();
        $param['fclasses'] = \App\FoundationClass::all();
        return view('classes.fclass.viewone', $param); 

    }

    public function newBatch()
    {
        $inps = Input::all();
        $fclass = new \App\FoundationClass;
        $fclass->name = $inps['batchname'];
        $fclass->start_date = $inps['startdate'];
        $fclass->end_date = $inps['enddate'];
        $fclass->descriptions = $inps['description'];
        $fclass->location_id = \Auth::user()->location_id;
        $fclass->created_by = \Auth::user()->id;
        $fclass->status = 1;
        // dd($fclass);
        $fclass->save();
        flash()->success('You have successfully created new class/batch to the foundation class batches');
        return redirect()->back();
    }
	
	public function deleteBatch()
    {
        $inps = Input::all();
        $fclass = \App\FoundationClass::find($inps['batchId']);
        $fclass->delete();
        return redirect()->route('classes.foundation-classes');

    }
    
    public function assignCounselor()
    {
        $inps = Input::all();
        $fclass = \App\FoundationClass::find($inps['classID']);
        $fclass->counselor_id = $inps['counselor'];
        $fclass->update();
        flash()->success('You have successfully assigned this class/batch to a counselor');
        return redirect()->back();
    }

    public function startclass($id)
    {
        $param['class'] = \App\ClassCategory::find($id);
        if ($param['class']->id == 1) {

            // $param['participants'] = \App\People::where('fclass_status',1)->get();
            $param['participants'] = \App\People::where('fclass_status',2)->where('service_date', '2018-10-21')->get();
            // $param['participants'] = \App\People::where('fclass_status',2)->where('service_date', 'LIKE','%'.\Carbon\Carbon::now()->format('Y-m-d').'%')->get();

        } elseif ($param['class']->id == 2) {
            $param['participants'] = \App\People::where('dltc_status',2)->get();
         } //else{
        //     return 0;
        // }
    	return view('classes.startclass', $param);
    }

    public function doAddtoClass()
    {
        $inps = Input::all();
            $fclassAtt = New \App\FoundationClassAttendance;
            $fclassAtt->people_id = $inps['pId'];
            $fclassAtt->class_1_dated = \Carbon\Carbon::now()->subDays(7);
            
            $fclassAtt->class_1_status = 1;
            // $fclassAtt->class_2_status = 1;
            $fclassAtt->c1_counselor_id = \Auth::user()->id;
            // $fclassAtt->c2_counselor_id = \Auth::user()->id;
            $fclassAtt->foundation_class_id = $inps['classid'];
            $fclassAtt->location_id = \Auth::user()->location_id;
            $fclassAtt->c1_counselor_id = \Auth::user()->id;
            $fclassAtt->status = 6;
            // dd($fclassAtt);
            $fclassAtt->save();

            $convert = \App\People::find($inps['pId']);
            $convert->fclass_status = 1;
            $convert->update();
               // flash()->success('You have successfully added new location to the system');
            return redirect()->back();
    }

    public function showAttendance()
    {
        $param['attendances'] = \App\FoundationClassAttendance::where('status','!=', '')->where('c1_counselor_id', \Auth::user()->id)->orderBy('class_1_dated', 'asc')->get();
        // $param['attendances'] = \App\FoundationClassAttendance::where('status','!=', '')->groupBy('class_1_dated')->orderBy('class_1_dated', 'asc')->get();
        // dd(count($param['attendances']));
        return view('classes.fclass.attendance', $param);

    }
    public function addfclass(Request $request)
    {
        $this->validate($request, [
            'class_1_status' => 'required',
        ]);
        $selected = $request->input('class_1');
        dd($request::all());
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->insert();
            flash()->success('You have successfully added new converts to the foundation class');
        return redirect()->back();
    }


    public function addFClass1()
    {
        $inps = Input::all();

        $convert = \App\People::find($inps['pid']);
        $activeclass = \App\People::find($inps['classId']);
        if ($convert != '') {
            $convert = \App\People::find($inps['pid']);
            $convert->fclass_status = 1;
            $convert->update();

            $fclassAtt = new \App\FoundationClassAttendance;
            $fclassAtt->people_id = $inps['pid'];
            $fclassAtt->class_1_dated = $inps['dsfclass']; //\Carbon\Carbon::now()->subDays(8);
            // $fclassAtt->class_2_dated = $inps['dsfclass'];
            $fclassAtt->foundation_class_id = $inps['classId'];
            $fclassAtt->location_id = \Auth::user()->location_id;
            $fclassAtt->class_1_status = 1;
            // $fclassAtt->class_2_status = 1;
            $fclassAtt->c1_counselor_id = \Auth::user()->id;
            // $fclassAtt->c2_counselor_id = \Auth::user()->id;
            $fclassAtt->status = 6;
            $fclassAtt->save();
            
            flash()->success('You have successfully added '.$convert->fullnames. ' to the foundation class batch ' .$activeclass->name . ' on the system');
        return redirect()->route('classes.class.batches', \Crypt::encrypt($inps['classId']));

        } else {

            $ppl = new \App\People;
            $ppl->seek_code = "FCL-".mt_rand(435678,4345653);  
            $ppl->fullnames = $inps['fullnames'];
            $ppl->service_id = 1;   
            $ppl->service_date = \Carbon\Carbon::now()->format('Y-m-d');
            $ppl->phone1 = $inps['phone'];
            $ppl->people_category_id = 4;
            $ppl->location_id  = \Auth::user()->location_id;
            $ppl->fclass_status = 1;
            $ppl->dltc_status = 2;
            $ppl->status = 1;
            $ppl->save();

            $fclassAtt = New \App\FoundationClassAttendance;
            $fclassAtt->people_id = $ppl->id;
            $fclassAtt->class_1_dated = $inps['dsfclass']; //\Carbon\Carbon::now()->subDays(7);
            
            // $fclassAtt->class_2_dated = $inps['dsfclass'];
            $fclassAtt->foundation_class_id = $inps['classId'];
            $fclassAtt->class_1_status = 1;
            // $fclassAtt->class_2_status = 1;
            $fclassAtt->c1_counselor_id = \Auth::user()->id;
            // $fclassAtt->c2_counselor_id = \Auth::user()->id;
            $fclassAtt->location_id = \Auth::user()->location_id;
            $fclassAtt->status = 6;
            $fclassAtt->save();
            
            // flash()->success('You have successfully added '.$ppl->fullnames. ' to the foundation class batch ' .$activeclass->name . ' on the system');
            flash()->success('You have successfully added a person to the foundation class batch on the system');
            return redirect()->route('classes.class.batches', \Crypt::encrypt($inps['classId']));
        }
    
        
               
    }
    
    
    public function submitAttendance(Request $request)
    {
       $inps = Input::all();


        if(isset($_POST['class_2_button']))
        {
            if(!$inps['class_2_status'] == ""){
            $selected = $request->input('class_2_status');
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->update(['class_2_status' => 1, 'c2_counselor_id' => \Auth::user()->id, 'class_2_dated' => \Carbon\Carbon::now()->format('Y-m-d'),
                'status'=> 1]);
            }
            return back();
        }

        if(isset($_POST['class_3_button']))
        {
            if(!$inps['class_3_status'] == ""){
            $selected = $request->input('class_3_status');
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->update(['class_3_status' => 1, 'c3_counselor_id' => \Auth::user()->id, 'class_3_dated' => \Carbon\Carbon::now()->format('Y-m-d'),
                'status'=> 1]);
            }
            return back();
        }

        if(isset($_POST['class_4_button']))
        {
            if(!$inps['class_4_status'] == ""){
            $selected = $request->input('class_4_status');
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->update(['class_4_status' => 1, 'c4_counselor_id' => \Auth::user()->id, 'class_4_dated' => \Carbon\Carbon::now()->format('Y-m-d'),
                'status'=> 1]);
            }
            return back();
        } 


        if(isset($_POST['class_5_button']))
        {

            if(!$inps['class_5_status'] == ""){
            $selected = $request->input('class_5_status');
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->update(['class_5_status' => 1, 'c5_counselor_id' => \Auth::user()->id, 'class_5_dated' => \Carbon\Carbon::now()->format('Y-m-d'),
                'status'=> 1]);
            }
            return back();
        }  

        if(isset($_POST['class_6_button']))
        {

            if(!$inps['class_6_status'] == ""){
            $selected = $request->input('class_6_status');
            \DB::table('foundation_class_attendances')->whereIn('id', $selected)->update(['class_6_status' => 1, 'c6_counselor_id' => \Auth::user()->id, 'class_5_dated' => \Carbon\Carbon::now()->format('Y-m-d'),
                'status'=> 1]);
            }
            return back();
        }
    }    

    public function startdltc()
    {
    	# code...
    }

    public function takeattendancefclass()
    {
    	# code...
    }

    public function startNewClass()
    {
        $param['services'] = \App\Service::all();
        $param['peoplecats'] = \App\PeopleCategory::all();
        $param['fclasses'] = \App\FoundationClass::all();
        $param['attendances'] = \App\FoundationClassAttendance::where('status','!=', '')->where('c1_counselor_id', \Auth::user()->id)->orderBy('class_1_dated', 'asc')->get();
        $param['pageName'] = " Foundation Class Attendance";
        $param['converts'] = \App\People::where('fclass_status',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        return view('classes.fclass.begin', $param);
    }

    public function printClass($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and fca.location_id = $location_id ORDER BY p.fullnames asc");
            // $attendances = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('c1_counselor_id', \Auth::user()->id)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
            view('classes.fclass.printattendance', $param);
                $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');

                return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
                // return $pdf->download('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    
    public function printC2Present($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_2_status = 1 and fca.location_id = $location_id ORDER BY p.fullnames asc");

        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC2Absent($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_2_status = null and fca.location_id = $location_id ORDER BY p.fullnames asc");
        //$param['attendances']  = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('class_2_status', '!=', 1)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
        // dd($attendances);

        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    } 

    public function printC3Present($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_3_status = 1 and fca.location_id = $location_id ORDER BY p.fullnames asc");

        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC3Absent($id)
    {
        $id = \Crypt::decrypt($id);
        $attendances = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('class_3_status', null)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
        // dd($attendances);

        view('classes.fclass.printattendance', $attendances);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $attendances], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC4Present($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_4_status = 1 and fca.location_id = $location_id ORDER BY p.fullnames asc");


        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC4Absent($id)
    {
        $id = \Crypt::decrypt($id);
        $attendances = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('class_4_status', null)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
        // dd($attendances);

        view('classes.fclass.printattendance', $attendances);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $attendances], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC5Present($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_5_status = 1 and fca.location_id = $location_id ORDER BY p.fullnames asc");

        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC5Absent($id)
    {
        $id = \Crypt::decrypt($id);
        $attendances = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('class_5_status', null)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
        // dd($attendances);

        view('classes.fclass.printattendance', $attendances);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $attendances], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC6Present($id)
    {
        $id = \Crypt::decrypt($id);
        $location_id = \Auth::user()->location_id;
        $param['attendances'] = \DB::select("SELECT p.fullnames AS fullnames, p.phone1 AS Phone1, p.phone2 AS Phone2, cat.short_name AS Category, fca.class_1_dated as BeginDate, fca.class_1_status as C1, fca.class_2_status as C2, fca.class_3_status as C3, fca.class_4_status as C4, fca.class_5_status as C5, fca.class_6_status as C6 from people p LEFT JOIN foundation_class_attendances fca ON p.id = fca.people_id LEFT JOIN people_categories cat ON p.people_category_id = cat.id where foundation_class_id = $id and class_6_status = 1 and fca.location_id = $location_id ORDER BY p.fullnames asc");

        view('classes.fclass.printattendance', $param);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $param['attendances']], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }

    public function printC6Absent($id)
    {
        $id = \Crypt::decrypt($id);
        $attendances = \App\FoundationClassAttendance::where('location_id', \Auth::user()->location_id)->where('class_6_status', null)->where('foundation_class_id', $id)->orderBy('class_1_dated', 'asc')->get();
        // dd($attendances);

        view('classes.fclass.printattendance', $attendances);
            $pdf = \PDF::loadView('classes.fclass.printattendance', ['attendances' => $attendances], ['dpi' => 200, 'defaultFont' => 'Arial', 'fontSize'])->setPaper('a4', 'landscape');
            return $pdf->stream('FoundationClassAttendance-'.date('d-m-Y').'.pdf');
    }
    
}
