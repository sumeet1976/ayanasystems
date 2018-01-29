<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessModel;
use Redirect;
use Session;
use Helper;
use File;
use DB;

class AdminController extends Controller
{
    public function Delete($type, $id){
        $operation = ProcessModel::DeleteQuery($type, $id);
        if($operation){
            return back()->with('success','Successful Deleted');
        }
        else{
            return back()->with('error','Ooops, Something is wrong? Please try after sometime');
        }
    }
    public function Add(Request $request, $type){
        if($request->isMethod('get')){
            switch ($type) {
                case 'service':
                    return view('page.admin.add_service');
                    break;

                case 'leader':
                    return view('page.admin.add_leader');
                    break;
                
                default:
                    return back()->with('error','Ooops, Route method not exist?');        
                    break;
            }
        }
        else{
            $operation = ProcessModel::AddData($request, $type);
            if($operation){
                return back()->with('success', $type.' Successful Added');
            }
            else{
                return back()->with('error','Ooops, Something is wrong? Please try after sometime');
            }
        }
    }
    public function ChangeStatus($type, $id, $status){
        $operation = ProcessModel::ChangeStatus($type, $id, $status);
        if($operation){
            return back()->with('success','Status Successful Changed');
        }
        else{
            return back()->with('error','Ooops, Something is wrong? Please try after sometime');
        }
    }
    public function Home(Request $request){
    	if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

			$data  = [];
	        return view('page.admin.home')->with($data);
		}
    }
    public function Query(Request $request, $type){
        $data['data_quotes'] = ProcessModel::GetQuotes();
        switch ($type) {
            case 'career':
                return view('page.admin.career')->with($data);
                break;
            case 'query':
                return view('page.admin.request')->with($data);
                break;
        }
    }
    public function Resume($document_name){
        if($document_name){
              #$file =  base_path().'../career_uploads/'.$document_name;
              $file = public_path().'/career_uploads/'.$document_name; 
              #echo $file; die;
                if (file_exists($file)){

                   $ext =File::extension($file);
                  
                    if($ext=='pdf'){
                        $content_types='application/pdf';
                       }elseif ($ext=='doc') {
                         $content_types='application/msword';  
                       }elseif ($ext=='docx') {
                         $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';  
                       }elseif ($ext=='xls') {
                         $content_types='application/vnd.ms-excel';  
                       }elseif ($ext=='xlsx') {
                         $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';  
                       }elseif ($ext=='txt') {
                         $content_types='application/octet-stream';  
                       }
                   
                    return response(file_get_contents($file),200)
                           ->header('Content-Type',$content_types);
                                                             
                }else{
                 exit('Requested file does not exist on our server!');
                }

           }else{
             exit('Invalid Request');
           } 
        #return view('page.admin.resume')->with('resume', $file);
    }
    public function Service(Request $request, $id = 0){
    	if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

           $data['data_service'] = ProcessModel::GetService($id); 	    
	       $data['active_menu'] = 'S';
	       return view('page.admin.service')->with($data);
        }
        else if($request->isMethod('post')) {

            $data = $request->all();
            
            if ($request->hasFile('image')) {
                $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('images/', $fileName); 

                $Update_Service = DB::table('what_we_do')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'tag_line' => $data['txt_tag_line'],
                    'description' => htmlspecialchars($data['txt_description']),
                    'status' => $data['txt_status'],
                    'image' => $fileName,
                    ]);

                if($Update_Service){
                    return back()->with('success','Service Successful Updated');
                }

            }
            else{
                
                $Update_Service = DB::table('what_we_do')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'tag_line' => $data['txt_tag_line'],
                    'description' => htmlspecialchars($data['txt_description']),
                    'status' => $data['txt_status'],
                    ]);

                if($Update_Service){
                    return back()->with('success','Service Successful Updated');
                }
                else{
                    return back()->with('success','Nothing Updated!');
                }
            }
        }
    }
    public function Services(){
        $data['data_services'] = ProcessModel::GetServices();
        return view('page.admin.services')->with($data);
    }
    public function About(Request $request){
    	if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

			$data['data_about'] = ProcessModel::GetAbout();
            return view('page.admin.about')->with($data);
		}
        else{
            /*echo "<pre>";
            print_r($request->all()); die;*/

            $data = $request->all();
   
            if ($request->hasFile('image')) {
                $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('images/', $fileName); 

                $Update_About = DB::table('why_us')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'description' => htmlspecialchars($data['txt_description']),
                    'image' => $fileName,
                    ]);
                if($Update_About){
                    return back()->with('success','Successful Updated');
                }
            }
            else{
                $Update_About = DB::table('why_us')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'description' => htmlspecialchars($data['txt_description']),
                    ]);
                if($Update_About){
                    return back()->with('success','About Successful Updated');
                }
                else{
                    return back()->with('success','Nothing Updated!');
                }
            }
        }
    }
    public function Leaders(Request $request){
    	if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

			$data['data_leaders'] = ProcessModel::GetLeaders();
	        return view('page.admin.leaders')->with($data);
		}
        else{
            /*echo "<pre>";
            print_r($request->all()); die;*/

            $data = $request->all();
            
            if ($request->hasFile('image')) {
                $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('images/', $fileName); 

                $Update_Leader = DB::table('leadership')
                ->where('id', $data['txt_id'])
                ->update([
                    'name' => $data['txt_title'],
                    'designation' => $data['txt_designation'],
                    'education1' => $data['txt_education1'],
                    'education2' => $data['txt_education2'],
                    'intro' => $data['txt_intro'],
                    'status' => $data['txt_status'],
                    'image' => $fileName,
                    ]);
                 if($Update_Leader){
                    return back()->with('success','Leadership Successful Updated');
                }
            }
            else{
                $Update_Leader = DB::table('leadership')
                ->where('id', $data['txt_id'])
                ->update([
                    'name' => $data['txt_title'],
                    'designation' => $data['txt_designation'],
                    'education1' => $data['txt_education1'],
                    'education2' => $data['txt_education2'],
                    'intro' => $data['txt_intro'],
                    'status' => $data['txt_status'],
                    ]);

                if($Update_Leader){
                    return back()->with('success','Leadership Successful Updated');
                }
                else{
                    return back()->with('success','Nothing Updated!');
                }
            }
        }
    }
    public function LeaderEdit(Request $request, $id){
        if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

            $data['data_leader'] = ProcessModel::GetLeader($id);
            return view('page.admin.leader')->with($data);
        }
    }
    public function Banner(Request $request){
        if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

            $data['data_banners'] = ProcessModel::GetBanners();
            return view('page.admin.banners')->with($data);
        }
        else{
            /*echo "<pre>";
            print_r($request->all()); die;*/

            $data = $request->all();

            if($data['txt_status'] == 1){
                $Update_Banner_Status = DB::table('banner')
                ->update([
                    'status' => 0,
                    ]);
            }
            else{
                $Update_Banner_Status = DB::table('banner')
                ->update([
                    'status' => 1,
                    ]);
            }
            
            if ($request->hasFile('image')) {
                $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('images/', $fileName); 

                $Update_Banner = DB::table('banner')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'tag_line' => $data['txt_tag_line'],
                    'button1' => $data['txt_text1'],
                    'button2' => $data['txt_text2'],
                    'button3' => $data['txt_text3'],
                    'status' => $data['txt_status'],
                    'background' => $fileName,
                    ]);
            }
            else{
                $Update_Banner = DB::table('banner')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'tag_line' => $data['txt_tag_line'],
                    'button1' => $data['txt_text1'],
                    'button2' => $data['txt_text2'],
                    'button3' => $data['txt_text3'],
                    'status' => $data['txt_status'],
                    ]);
            }

            if($Update_Banner){
                return back()->with('success','Successful Updated');
            }
        }
    }
    public function BannerEdit(Request $request, $id){
        if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

            $data['data_banner'] = ProcessModel::GetBannerSpecific($id);
            return view('page.admin.banner')->with($data);
        }
    }
    public function WelcomeMessage(Request $request){
        if ($request->isMethod('get')) {

            if(!Session::has('log_id')){
                return redirect()->action('AdminController@Index');
            }

            $data['data_greeting'] = ProcessModel::GetGreeting();
            return view('page.admin.greeting')->with($data);
        }
        else{
            /*echo "<pre>";
            print_r($request->all()); die;*/

            $data = $request->all();
   
                $Update_Greeting = DB::table('welcome_greeting')
                ->where('id', $data['txt_id'])
                ->update([
                    'title' => $data['txt_title'],
                    'description' => $data['txt_desc'],
                    ]);
   
            if($Update_Greeting){
                return back()->with('success','Successful Updated');
            }
        }
    }
    public function SignOut(){
        session()->flush();
        #return view('index');
        return redirect()->action('AdminController@Index');
    }
    public function Index(){
        if(Session::has('log_id')){
            return view('page.admin.home');
        }
        else{
            return view('page.admin.login');
        }
    }
    public function ValidateLogin(Request $request){
        $data = $request->all();
        $authentication = ProcessModel::ValidateLogin($data['userid'], $data['password']);

        if(count($authentication) > 0){
            $Session = ProcessModel::UpdateSession($authentication[0]);
            return back()->with('success','Welcome back mr. '.$authentication[0]->type);
        }
        else{
            echo "access denied";
            return back()->with('error','Access Denied');
        }
    }
    public function Setting(Request $request){
        if($request->isMethod('get')){
            $data['log_data'] = ProcessModel::SessionData();
            return view('page.admin.setting')->with($data);   
        }
        else{
            $operation = ProcessModel::ChangeSetting($request->all());
            if($operation == 1){
                $data = $request->all();
                $pwd = $pwd = ($data['txt_new_password'] != '') ? $data['txt_new_password'] : $data['txt_password'];

                ProcessModel::UpdateSession(array(
                    'login_id'=>$data['txt_log_id'],
                    'password'=>$pwd,
                    'type'=>$data['txt_type'],
                    'name'=>$data['txt_name'],
                    'email'=>$data['txt_email'],
                    'pic'=>$data['txt_pic']
                    ));
                return back()->with('success','Setting Changed!');
            }
            else if($operation == 'Denied'){
                return back()->with('error','Ooops, Password not matched!');   
            }
            else{
                return back()->with('error','Ooops, something is wrong? Please try after sometime!');
            }
        }
    }
    
}
