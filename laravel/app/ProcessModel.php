<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use Illuminate\Support\Facades\Validator;
/*use ValidateRequests;*/

class ProcessModel extends Model
{	

	public static function DeleteQuery($type, $id){
		switch ($type) {
			case 'query':
			case 'career':
				return DB::table('query')
						->where('id', '=', $id)->delete();
				break;
			
			case 'service':
				return DB::table('what_we_do')
						->where('id', '=', $id)->delete();
				break;

			default:
				return false;
				break;
		}
	}
	public static function ChangeStatus($type, $id, $status){
		$sts = ($status == 1) ? 0 : 1;
		switch ($type) {
			case 'query':
			case 'career':
				return DB::table('query')
                ->where('id', $id)
                ->update([
                    'status' => $sts,
                    ]);
				break;
			
			default:
				return false;
				break;
		}
	}
	public static function AddData($request, $type){
		$data = $request->all();
		/*echo "<pre>";
		print_r($data); die;*/

		/*default images if image  not selected*/
		$file_name = ['service'=>'default_service.png', 'leader' => 'default_leader.png'];

		if ($request->hasFile('image')) {
            
            /*static::validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);*/

            $v = Validator::make($request->all(), [
		        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		    ]);

		    if ($v->fails()){
		        return redirect()->back()->withErrors($v->errors());
		    }

            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(public_path().'/images/', $fileName);
        	
        	/*echo public_path().'/images/'; die;*/
        	$file_name[$type] = $fileName;
            /*echo $fileName; die;*/
        }

		switch ($type) {
			case 'service':
				return DB::table('what_we_do')->insert(
				[
					'title' => $data['txt_title'],
					'tag_line' => $data['txt_tag_line'],
					'description' => htmlspecialchars($data['txt_description']),
					'image' => $file_name['service'],
					'status' => $data['txt_status'],
				]
				);
				break;
			
			case 'leader':
				return DB::table('leadership')->insert(
				[
					'name' => $data['txt_name'],
					'designation' => $data['txt_designation'],
					'education1' => $data['txt_education1'],
					'education2' => $data['txt_education2'],
					'intro' => $data['txt_intro'],
					'image' => $file_name['leader'],
					'status' => $data['txt_status'],
				]
				);
				break;

			default:
				return false;
				break;
		}
	}
	public static function GetQuotes(){
		$all_quotes = DB::select("call GetQuery()");
		
		/*Format array according type and status*/
		$active_quotes = $non_active_quotes = $active_career = $non_active_career = [];

		foreach ($all_quotes as $key => $value) {
			if($value->type == 4){
				if($value->status){
					foreach ($value as $key => $value) {
						$temp_array[$key] = $value;
					}
					$active_career[] = $temp_array;
				}
				else{
					foreach ($value as $key => $value) {
						$temp_array[$key] = $value;
					}
					$non_active_career[] = $temp_array;	
				}
			}
			else{
				if($value->status){
					foreach ($value as $key => $value) {
						$temp_array[$key] = $value;
					}
					$active_quotes[] = $temp_array;
				}
				else{
					foreach ($value as $key => $value) {
						$temp_array[$key] = $value;
					}
					$non_active_quotes[] = $temp_array;	
				}	
			}
		}

		return array('career' => array('Active' => $active_career, 'Deactive' => $non_active_career), 'request' => array('Active' => $active_quotes, 'Deactive' => $non_active_quotes));
	}
	public static function GetLeaders(){
		return DB::select("call GetLeaders()");  
	}
	public static function GetLeader($id){
		return DB::select("call GetLeader(".$id.")");  
	}
    public static function GetBanners(){
		return DB::select("call GetBanners()");  
	}
	public static function GetBanner(){
		return DB::select("call GetBanner()");  
	}
	public static function GetBannerSpecific($id){
		return DB::select("call GetBannerSpecific(".$id.")");  
	}
	public static function GetAbout(){
		return DB::select("call GetAbout()");  
	}
	public static function GetServices(){
		return DB::select("call GetServices()");  
	}
	public static function GetService($id){
		return DB::select("call GetService(".$id.")");  
	}
	public static function GetGreeting(){
		return DB::select("call GetGreeting()");  
	}
	public static function ValidateLogin($id, $pass){
		$pass = md5($pass);
		return DB::select("call ValidateLogin('$id', '$pass')");
	}
	public static function SessionData(){
		return array(
			'login_id' => session()->get('log_id'),
			'name' => session()->get('name'),
			'type' => session()->get('type'),
			'email' => session()->get('email'),
			'password' => session()->get('password'),
			'pic' => session()->get('pic')
			);
	}
	public static function UpdateSession($data_obj_or_arr){
		$data = [];

		if(is_object($data_obj_or_arr)){
			foreach($data_obj_or_arr as $key => $value){
			    $data[$key] = $value;
			}
		}
		else{
			$data = $data_obj_or_arr;
		}
		
		session()->regenerate();
        session()->put('log_id', $data['login_id']);
        session()->put('password', $data['password']);
        session()->put('type', $data['type']);
        session()->put('name', $data['name']);
        session()->put('email', $data['email']);
        session()->put('pic', $data['pic']);
	}
	public static function ChangeSetting($data){
		if($data['password'] === md5($data['txt_password'])){
        	$pwd = ($data['txt_new_password'] != '') ? $data['txt_new_password'] : $data['txt_password'];
	        return DB::table('user')
	            ->where('login_id', $data['log_id'])
	            ->update([
	                'name' => $data['txt_name'],
	                'type' => $data['txt_type'],
	                'login_id' => $data['txt_log_id'],
	                'password' => md5($pwd),
	                'email' => $data['txt_email'],
	                ]);
        }
        else{
        	return 'Denied';
        }
	}
}
