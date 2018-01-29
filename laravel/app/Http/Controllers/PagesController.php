<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApicallModel;
use Helper;
use DB;
use App\ProcessModel;

class PagesController extends Controller
{	
	public function Career(Request $request){
		if ($request->isMethod('get')) {
            $data['data_services'] = ProcessModel::GetServices();
			$data['css']  = [];
	        $data['js'] = [];
	        $data['active_menu'] = 'C';
	        $data['meta'] = Helper::pagEdetails('AYANA SYSTEMS', 'La Ilaha Illallah Muhammadur Rasulullah', 'Islam, islam, liimr, prophet, messenger, nabi, rasool, rasul, allah, muslim, haq', 'career');
			return view('page.career')->with($data);			
		}
		else{

		}
	}

	public function Home(Request $request){
    	if ($request->isMethod('get')) {

    		$data['data_banner'] = ProcessModel::GetBanner();
    		$data['data_about'] = ProcessModel::GetAbout();
    		$data['data_services'] = ProcessModel::GetServices();
    		$data['data_leaders'] = ProcessModel::GetLeaders();
    		
			$data['css']  = [];
	        $data['js'] = ['service_highlight.js'];
	        $data['active_menu'] = '';
	        $data['meta'] = Helper::pagEdetails('AYANA SYSTEMS', 'La Ilaha Illallah Muhammadur Rasulullah', 'Islam, islam, liimr, prophet, messenger, nabi, rasool, rasul, allah, muslim, haq', 'home');
			return view('page.home')->with($data);
		}
		else if ($request->isMethod('post')) {
			echo "Method not allowed..?";
		}
    }

    public function Service(Request $request, $id){
    		$data['data_service'] = ProcessModel::GetService($id);
            $data['data_services'] = ProcessModel::GetServices();
    	    $data['css'] = [];
	        $data['js'] = [];
	        $data['active_menu'] = 'S';
	        $data['meta'] = Helper::pagEdetails('AYANA SYSTEMS', 'La Ilaha Illallah Muhammadur Rasulullah', 'Islam, islam, liimr, prophet, messenger, nabi, rasool, rasul, allah, muslim, haq', 'test');
    	return view('page.service')->with($data);
    }

    public function About(Request $request){
    		$data['data_about'] = ProcessModel::GetAbout();
            $data['data_services'] = ProcessModel::GetServices();
    	    $data['css'] = [];
	        $data['js'] = [];
	        $data['active_menu'] = 'A';
	        $data['meta'] = Helper::pagEdetails('AYANA SYSTEMS', 'La Ilaha Illallah Muhammadur Rasulullah', 'Islam, islam, liimr, prophet, messenger, nabi, rasool, rasul, allah, muslim, haq', 'test');
		return view('page.about')->with($data);
    }

    public function Quote(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            /*echo "<pre>";
            print_r($data); die;*/

        	if(($data['query_type'] == 1) or ($data['query_type'] == 3)){
                $SetRequest = DB::table('query')->insert(
                [
                    'name' => $data['txtName'],
                    'email' => $data['txtEmail'],
                    'contact' => $data['txtContact'].' '.$data['txtCCode'],
                    'message' => $data['txtMessage'],
                    'type' => $data['query_type'],
                ]
                );
        	}
            else if($data['query_type'] == 2){
            	echo "<pre>";
            	print_r($data); die;
                $SetRequest = DB::table('query')->insert(
                [
                    'name' => $data['txtName'],
                    'email' => $data['txtEmail'],
                    'contact' => $data['txtContact'].' '.$data['txtCCode'],
                    'message' => $data['txtMessage'],
                    'service' => $data['txtService'],
                    'type' => $data['query_type'],
                ]
                );
            }
            else if($data['query_type'] == 4){
                if ($request->hasFile('image')) {
                    $this->validate($request, ['image' => 'required|mimes:zip,pdf|max:2048',]);

                    $file = request()->file('image');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(public_path().'/career_uploads/', $fileName); 

                    $SetRequest = DB::table('query')
                    ->insert([
                    'name' => $data['txtName'],
                    'email' => $data['txtEmail'],
                    'contact' => $data['txtContact'].' '.$data['txtCCode'],
                    'about' => $data['txtMessage'],
                    'skills' => $data['txtSkills'],
                    'resume' => $fileName,
                    'type' => $data['query_type'],
                    ]);
                }
                else{
                    $SetRequest = DB::table('query')
                    ->insert([
                    'name' => $data['txtName'],
                    'email' => $data['txtEmail'],
                    'contact' => $data['txtContact'].' '.$data['txtCCode'],
                    'about' => $data['txtMessage'],
                    'skills' => $data['txtSkills'],
                    'type' => $data['query_type'],
                    ]);
                }                
            }

            if($SetRequest){
            	if($data['query_type'] == 4){
                	$msg = 'Your application is subject to verify !';
	            }
	            else{
	                $msg = 'We will get back to you soon !';
	            }
	            Helper::SendMail($data);
	            return back()->with('success',$msg);
            }
        	else{
        		return back()->with('error','Ooops, something is wrong? Please try after sometime !');
        	}
        }
    }

}
