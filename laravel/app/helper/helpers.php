<?php
namespace App\helper;
use App\ApicallModel;
use App\ProcessModel;
use Illuminate\Support\Facades\Mail;

class Helper
{

  public static function SendMail($data){
      return Mail::send('email.welcome', [], function ($message) use ($data)
        {

            $message->from('hello@ayanasystems.com', 'Ayana Systems');
            $message->subject('Thanks for Visit Ayana Systems');
            $message->to($data['txtEmail']);

        });
        /*if(count(Mail::failures()) == 0){
          dd('Mail successfully sent!');
        }*/
  }

  public static function ContactForm($qry_type, $service = null){ 
    return view('inc.contact_form')
    ->with('hidden_fields', ['Query_Type' => $qry_type, 'Service' => $service]);
  }
  public static function Header(){
      $data['data_services'] = ProcessModel::GetServices();
      $data['data_quotes'] = ProcessModel::GetQuotes();
      $data['log_data'] = ProcessModel::SessionData();
      return view('inc.admin_menu')->with($data);
  }
  public static function Greeting(){
      $data['data_greeting'] = ProcessModel::GetGreeting();
      return view('inc.greeting')->with($data);
  }

  public static function test(){
    echo "hiii";
  }
  public static function PageDetails($title, $desc, $keyword, $bodyclass = ""){
        return $data = array (
            'Title'=>$title,
            'Description'=>$desc,
            'Keyword'=>$keyword,
            'BodyClass'=>$bodyclass
        );
    }
  public static function SetPageDetails($ExistArray, $NewDataArray){
    foreach ($NewDataArray as $key => $value) {
      $ExistArray[$key] = $value;
    }
    return $ExistArray;
  }

} 

?>