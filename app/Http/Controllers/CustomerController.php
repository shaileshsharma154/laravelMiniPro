<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\member;
use Validator;
class CustomerController extends Controller
{
    public function index(){
        $title="Regsiter Customer";
        $url=url('/customerForm');
        $data=compact('url','title');
        return view('Customer')->with($data);
    }


    public function fetchCutomerData(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'pwd' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]
    );

    /*
        echo "<pre>";
         print_r($request->all());
        echo "dasd";
    */
        $customer= new Customer;
        //$customer->name=$request['name'];
        $customer->name=$request->name;
        //$customer->email=$request['email'];
        $customer->email=$request->email;
        $customer->password=$request['pwd'];
        $customer->country=$request['country'];
        $customer->state=$request['state'];
        $customer->city=$request['city'];
        $customer->save();
        //$msg="Added successfully";
        //return view('Customer')->with($msg);
        return redirect('/CustomerView')->with('message','ssRecord inserted successfully');
    }

    ////// ajax Form submition ///
    public function registration(){
        
        return view('CustomerAjax');
    }

    public function customerFormAjax(Request $request){
        $customer= new Customer;
        //$customer->name=$request['name'];
        $customer->name=$request->name;
        //$customer->email=$request['email'];
        $customer->email=$request->email;
        $customer->password=$request['pwd'];
        $customer->country=$request['country'];
        $customer->state=$request['state'];
        $customer->city=$request['city'];
        $customer->save();
        //return redirect('/CustomerView')->with('message','Record inserted successfully Ajax');
        return ['msg'=>"inserted data with ajax"];
    }

    public function viewPage(Request $request){
       // $customers= Customer::all();
       //$customers= Customer::get();
       //$customers= Customer::paginate(5);
        //echo "<pre>";
        //print_r($customers);
        //echo "</pre>";
       // $data= compact('customers');
        //die;
if(session()->has('user_id')){
        $search =$request['search'] ?? "";
        if($search !=""){
            // where
             //$customers = Customer::where('name',"LIKE", "%$search%")->get();
             $customers = Customer::where('name',"LIKE", "%$search%")->orWhere('email','LIKE',"%$search%")->get();
           // print_r($customers);
            // die;
        }else{
            $customers  = Customer::all();
        }
        //$customers= Customer::paginate(5);
        $data =compact('customers','search');
      
        return view('CustomerView')->with($data);
    }else{
    return redirect('/user');
    }
}

    public function delete($id){
        //$cutomers= Customer::find($id);
        //$cutomer= Customer::find($id)->delete();
        //return redirect()->back();
        //echo "<pre>";
        //print_r($cutomers);
        //die;
        $customers = Customer::find($id);
        if(!is_null($customers)){
            $customers->delete();
        }
        return redirect('CustomerView')->with('message','Data Deleted successfully');

    }
    public function edit($id){
        $customers= Customer::find($id);
        if(is_null($customers)){
           return redirect('CustomerView');
        }else{
            //$data=compact('customers');
            $title="Update Customer";
            $url=url('/customerUpdate')."/".$id;
            $data=compact('customers','url','title');
            return view('Customer')->with($data);
        }
    }

    public function update($id, Request $request){
        $customer = Customer::find($id);
        $customer->name=$request['name'];
        $customer->email=$request['email'];
        $customer->password=$request['pwd'];
        $customer->country=$request['country'];
        $customer->state=$request['state'];
        $customer->city=$request['city'];
        $customer->save();
        //$request->session->put('message','Data updated successfully');
        //Session::put('message', 'success');
        return redirect('/CustomerView')->with('message','Data updated successfully');
    }

    public function onetoone(){
        return member::with('getMemberData')->all();
    }

    ///============ API ==================//
    public function ViewAPIData(){
       // $customers= new Customer;
        $customers= Customer::all();
       return $customers;
    
    }
    public function apiAddFun(Request $req){

       
        $customers =new Customer;
        $customers->name=$req['name'];
            $customers->email= $req['email'];
            $customers->gender=$req['gender'];
            $customers->address= $req['address'];
            $customers->country= $req['country'];
            
            $result=$customers->save(); 
            if($result==1){
                return ['Result'=>"Data Added successfully"];
            }else{
                return ["bb"=>"dada"];
                return ['Result'=>"Some thing went wrong"];
            }
    }
    public function addAPIData(Request $req){
            $customers =new Customer;
          
            $customers->name=$req['name'];
            $customers->email= $req['email'];
            $customers->gender=$req['gender'];
            $customers->address= $req['address'];
            $customers->country= $req['country'];
           
            
            $result=$customers->save();
            if($result==1){
                return ['Result'=>"Data Added successfully"];
            }else{
                return ['Result'=>"Some thing went wrong"];
            }
        }

        public function updateAPIData(Request $req){
            $rules=array(
                "customer_id"=>"required"
            );
            $validator= Validator::make($req->all(), $rules);
            if($validator->fails()){
                return $validator->errors();
            }else{
            $customers =new Customer;
            $customers= Customer::find($req['customer_id']);
            
            //$customers->customer_id=Customer::find($customer_id);
            $customers->name=$req['name'];
            $customers->email= $req['email'];
            $customers->gender=$req['gender']; 
            $customers->address= $req['address'];
            $customers->country= $req['country'];
            //print_r($customers);
            //die;
            $result=$customers->save();
            if($result==1){
                return ['Result'=>"Data updated successfully"];
            }else{
                return ['Result'=>"Some thing went wrong in updated data"];
            }
        }
    }

        public function deleteAPIData($id){

            $customers= customer::find($id);
            if($customers){
                $customers->delete();
                return ["result"=>"Data found", "message"=>"Data has been deletd successfully"];

            }else{
                return ["result"=>"Data not found", "Message"=>"Something went wrong to delete data"];
            }
        }

        public function searchAPIData($search){
            
            $customers = Customer::where('name',"LIKE", "%$search%")->orWhere('email','LIKE',"%$search%")->get();
            return ["Result"=>"Search Data found", "Data"=>$customers];
        
        
        }
        public function searchAPIData1(Request $req){
           
            $search =$req['search'] ?? "";
            if($search !=""){
            
            $customers = Customer::where('name',"LIKE", "%$search%")->orWhere('email','LIKE',"%$search%")->get();
            return ["Result"=>"Search Data found", "Data"=>$customers];
        }
    }
}


