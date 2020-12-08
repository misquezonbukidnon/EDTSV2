<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\ProcessType;
use App\Office;
use App\PrDescription;
use App\Status;
use App\AccountingProcess;
use App\BacProcess;
use App\BudgetProcess;
use App\GsoProcess;
use App\MmoProcess;
use App\MtoProcess;
use App\Endorsement;
use App\MisProcess;
use input;
use DNS1D;
use DNS2D;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use QrCode;

class TransactionController extends Controller
{
    /*
    | Page Redirection - Office/Create
    */
    Public function create(Request $request){
        // $transactions = Transaction::all();
        /*
            Server-side Processing
            Returns the query of Province model and adding new column for action
        */

        if ($request->ajax()) {
            $data = Transaction::with('process_types', 'statuses', 'users');
            return Datatables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="/find/records/'.$data->id.'" class="btn btn-xs btn-outline-primary"><i class="tio-zoom_in tio-lg">zoom_in</i></a>';
                    $button1 = ' <a href="/edit/transaction/'.$data->id.'" class="btn btn-xs btn-outline-primary"><i class="tio-edit tio-lg"></i></a>';
                    $button2 = ' <a href="/barcode/transaction/'.$data->id.'" class="btn btn-xs btn-outline-primary"><i class="tio-barcode tio-lg"></i></a>';
                    return $button.$button1.$button2;
                })
                ->addColumn('status', function($data){
                    // $button = 'status';
                    // return $button;
                    switch ($data->statuses->name) {
                        case $data->statuses->name == "Complete":
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-success"></span> '.$data->statuses->name.'</span></div>';
                            return $column;
                            break;
                        case $data->statuses->name == "In Progress":
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-primary"></span> '.$data->statuses->name.'</span></div>';
                            return $column;
                        break;
                        case $data->statuses->name == "Cancelled":
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-danger"></span> '.$data->statuses->name.'</span></div>';
                            return $column;
                        break;
                        default:
                            $message = 'Please Contact Administrator';
                            return $message;
                        break;  
                    }
                })
                ->addColumn('client', function($data){
                    switch ($data->process_types_id) {
                        // Purchase Request
                        case $data->process_types_id == 1:
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->offices->name.'</span></div>';
                            return $column;
                            break;
                    
                        // Purchase Order
                        case $data->process_types_id == 2:
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->client.'</span></div>';
                            return $column;
                        break;

                        // Voucher
                        case $data->process_types_id == 3:
                            $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->client.'</span></div>';
                            return $column;
                        break;
                        
                        default:
                            $message = 'Please Contact Administrator';
                            return $message;
                        break;  
                    }
                })
                ->addColumn('reference_id', function($data){
                    $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->reference_id.'</span><span class="d-block font-size-sm text-body">'.strval($data->users->name).'</span></div>';
                    return $column;
                })
                ->addColumn('process_types.name', function($data){
                    $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->process_types->name.'</span></div>';
                    return $column;
                })
                ->addColumn('description', function($data){
                    $column = '<div class="media-body"><span class="d-block h5 text-hover-primary mb-0">'.$data->description.'</span></div>';
                    return $column;
                })
            ->rawColumns(['reference_id', 'process_types.name', 'client', 'action', 'description', 'status'])
            ->make(true);
        }


        $transactions = Transaction::with('offices', 'process_types', 'pr_descriptions')->get();
        $transactioncounts = Transaction::all()->count();
        $offices = Office::all();
        $processtypes = ProcessType::all();
        $prdescriptions = PrDescription::all();
    	return view('transaction.create',compact('transactions', 'offices','processtypes','prdescriptions', 'transactioncounts'));

    }
    
    /*
    | Store - Offices
    */
    Public function store(Request $request){
        /*
        | Generates Barcode as Reference No.
        */
        $date = $request->input('date_of_entry');
        $process_type = $request->input('process_type');
        // $pr = $request->input('pr_number');
        // $barcode = $date.'-'.$process_type;

        $input_3 = $request->input('offices_id');
        $input_5 = $request->input('pr_descriptions_id');
        $input_6 = $request->input('est_amount');
        $ucword_6 = ucwords($input_6);
        $input_8 = $request->input('statuses_id');
        $ucword_8 = ucwords($input_8);
        $input_9 = $request->input('reference_id');
        $ucword_9 = strtoupper($input_9);
        $input_10 = $request->input('supplier');
        $ucword_10 = ucwords($input_10);
        $input_11 = $request->input('supplier_address');
        $ucword_11  = ucwords($input_11); 
        $input_12 = $request->input('sub_reference_id');
        $ucword_12 = strtoupper($input_12);
        $input_13 = $request->input('description');
        $ucword_13 = ucwords($input_13);

        //added
        $inputTrigger = $request->input('trigger');
        $inputFund = $request->input('fund');
        $inputPO = $request->input('po');

    	$data = new Transaction;         	
        $data->date_of_entry = $date;

        // switch statement
        switch ($inputTrigger) {
            case $inputTrigger == 1:
                // purchase request
                $refid = $inputFund.'-'.$ucword_9; 
                $find = Transaction::where('reference_id', '=', $refid)->first();
                if (empty($find)) {
                    $data->reference_id = $refid;
                }else{
                    flash("Purchase Request $refid, already exist in our database. Please double check before you submit.")->error()->important();
                    return back()->withInput();
                }
                break;
            case $inputTrigger == 2;
                // purchase order
                $refid = $inputPO.'-'.$ucword_9; 
                $subrefid = $inputFund.'-'.$ucword_12; 
                $find = Transaction::where('reference_id', '=', $refid)->first();
                if ($find == null) {
                    $data->reference_id = $refid;
                    $data->sub_reference_id = $subrefid;
                }else{
                    flash("Purchase Order $refid, already exist in our database. Please double check before you submit.")->error()->important();
                    return back()->withInput();
                }
                break;
            case $inputTrigger == 3;
                // voucher
                $refid = $ucword_9; 
                $subrefid = $inputFund.'-'.$ucword_12; 
                $find = Transaction::where('reference_id', '=', $refid)->first();
                if ($find == null) {
                    $data->reference_id = $refid;
                    $data->sub_reference_id = $subrefid;
                }else{
                    flash("Voucher $refid, already exist in our database. Please double check before you submit.")->error()->important();
                    return back()->withInput();
                }
                break;
            default:
                // error message
                flash("There is an error. Please contact Administrator")->error()->important();
                return back()->withInput();
                break;
        }

        if ($input_13 != null) {
            $data->description = $ucword_13; 
        }else{
            $data->description = 'None';
        }
        $data->process_types_id = $process_type;
        $data->offices_id = $input_3; 
        $data->pr_descriptions_id = $input_5; 
        $data->amount = $ucword_6;
        $data->client = $ucword_10;
        $data->address = $ucword_11;
        $data->statuses_id = 2; //pending by default
        $data->users_id = auth()->user()->id;
        $data->endorsement_date = $date;  
        $data->save();

        if($inputTrigger == 1){
            // purchase request
            $ref_no = $inputFund.'-'.$ucword_9; 
            $query = Transaction::where('reference_id', '=', $ref_no)->first();
            $query->reference_id = $ref_no;
            $query->save();
            $endorsement = new Endorsement;
            $endorsement->transactions_id = $query->id;
            $endorsement->endorsing_offices_id = auth()->user()->offices_id;
            $endorsement->statuses_id = 2; // pending by default
            $endorsement->action_takens_id = 1; // none by default
            $endorsement->save();
        }elseif($inputTrigger == 2){
            // purchase order request
            $ref_no = $inputPO.'-'.$ucword_9; 
            $query = Transaction::where('reference_id', '=', $ref_no)->first();
            $query->reference_id = $ref_no;
            $query->save();
            $endorsement = new Endorsement;
            $endorsement->transactions_id = $query->id;
            $endorsement->endorsing_offices_id = auth()->user()->offices_id;
            $endorsement->statuses_id = 2; // pending by default
            $endorsement->action_takens_id = 1; // none by default
            $endorsement->save();
        }else{
            // voucher request
            $ref_no = $ucword_9; 
            $query = Transaction::where('reference_id', '=', $ref_no)->first();
            $query->reference_id = $ref_no;
            $query->save();
            $endorsement = new Endorsement;
            $endorsement->transactions_id = $query->id;
            $endorsement->endorsing_offices_id = auth()->user()->offices_id;
            $endorsement->statuses_id = 2; // pending by default
            $endorsement->action_takens_id = 1; // none by default
            $endorsement->save();
        }

        // $query = Transaction::where('reference_id', '=', $ucword_9)->first();
        // $query->reference_id = $ucword_9;
        // $query->save();
        // $endorsement = new Endorsement;
        // $endorsement->transactions_id = $query->id;
        // $endorsement->endorsing_offices_id = auth()->user()->offices_id;
        // $endorsement->statuses_id = 2; // pending by default
        // $endorsement->action_takens_id = 1; // none by default
        // $endorsement->save();


    	flash('Transaction created successfully!')->success();
    	return redirect('home');
    }
     
    /*
    | Edit - Transaction
    */
    Public function edit($id){
        $transactions = Transaction::findOrFail($id);        
        $offices = Office::all();
        $processtypes = ProcessType::all();
        $prdescriptions = PrDescription::all();
        return view('transaction.edit', compact('transactions', 'offices', 'prdescriptions', 'processtypes'));
    }

    /*
    | Update - Transaction
    */

    Public function update(Request $request, $id){
        $transactions = Transaction::findOrFail($id);         

        switch ($transactions->process_types_id) {
            // Purchase Request
            case $transactions->process_types_id == 1:
                $input_3 = $request->input('offices_id');
                $ucword_3 = ucwords($input_3);
                $input_5 = $request->input('pr_descriptions_id');
                $ucword_5 = ucwords($input_5);
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_9 = $request->input('pr_number');
                $ucword_9 = strtoupper($input_9); 
                $input_10 = $request->input('description'); 
                $ucword_10 = ucwords($input_10);
                
                $transactions->offices_id = $ucword_3;
                $transactions->pr_descriptions_id = $ucword_5; 
                if ($input_10 != null) {
                    $transactions->description = $ucword_10; 
                }else{
                    $transactions->description = 'None';
                }
                $transactions->amount = $input_6;
                $transactions->reference_id = $ucword_9;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            // Financial Assistance
            case $transactions->process_types_id == 2:
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);
                $input_11 = $request->input('supplier_address');
                $ucword_11  = ucwords($input_11); 
                
                $transactions->amount = $input_6;
                $transactions->client = $ucword_10;
                $transactions->address = $ucword_11;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            // Internet Billing
            case $transactions->process_types_id == 3:
                $input_3 = $request->input('offices_id');
                $ucword_3 = ucwords($input_3);
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);
                $input_11 = $request->input('supplier_address');
                $ucword_11  = ucwords($input_11); 
                
                $transactions->offices_id = $ucword_3;
                $transactions->amount = $input_6;
                $transactions->client = $ucword_10;
                $transactions->address = $ucword_11;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            // Mobile Allowance
            case $transactions->process_types_id == 4:
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);
                
                $transactions->amount = $input_6;
                $transactions->client = $ucword_10;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            case $transactions->process_types_id == 5:
                $input_3 = $request->input('offices_id');
                $ucword_3 = ucwords($input_3);
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);
                
                $transactions->offices_id = $ucword_3;
                $transactions->amount = $input_6;
                $transactions->client = $ucword_10;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            case $transactions->process_types_id == 6:
                $input_3 = $request->input('offices_id');
                $ucword_3 = ucwords($input_3);
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);

                $transactions->offices_id = $ucword_3;           
                $transactions->amount = $input_6;          
                $transactions->client = $ucword_10;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            case $transactions->process_types_id == 7:
                $input_3 = $request->input('offices_id');
                $ucword_3 = ucwords($input_3);
                $input_6 = $request->input('est_amount');
                $ucword_6 = ucwords($input_6);
                $input_10 = $request->input('supplier');
                $ucword_10 = ucwords($input_10);

                $transactions->offices_id = $ucword_3;           
                $transactions->amount = $input_6;          
                $transactions->client = $ucword_10;
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
                break;
            case $transactions->process_types_id == 8:
                $input_1 = $request->input('reference_id');
                $strtoupper_1 = strtoupper($input_1);
                $input_2 = $request->input('sub_reference_id');
                $strtoupper_2 = ucwords($input_2);
                $input_3 = $request->input('offices_id');
                $input_4 = $request->input('pr_descriptions_id');
                $input_5 = $request->input('supplier');
                $ucwords_1 = ucwords($input_5);
                $input_6 = $request->input('est_amount');
                $input_10 = $request->input('description'); 
                $ucwords_10 = ucwords($input_10); 

                $transactions->reference_id = $strtoupper_1;           
                $transactions->sub_reference_id = $strtoupper_2;          
                $transactions->offices_id = $input_3;
                $transactions->pr_descriptions_id = $input_4;
                $transactions->client = $ucwords_1;
                $transactions->amount = $input_6;
                if ($input_10 != null) {
                    $transactions->description = $ucwords_10; 
                }else{
                    $transactions->description = 'None';
                }
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
            case $transactions->process_types_id == 9:
                $input_1 = $request->input('reference_id');
                $strtoupper_1 = strtoupper($input_1);
                $input_2 = $request->input('sub_reference_id');
                $strtoupper_2 = ucwords($input_2);
                $input_3 = $request->input('offices_id');
                $input_4 = $request->input('pr_descriptions_id');
                $input_5 = $request->input('supplier');
                $ucwords_1 = ucwords($input_5);
                $input_6 = $request->input('address');
                $ucwords_2 = ucwords($input_6);
                $input_7 = $request->input('est_amount');
                $input_10 = $request->input('description');
                $ucwords_10 = ucwords($input_10); 

                $transactions->reference_id = $strtoupper_1;           
                $transactions->sub_reference_id = $strtoupper_2;          
                $transactions->offices_id = $input_3;
                $transactions->pr_descriptions_id = $input_4;
                $transactions->client = $ucwords_1;
                $transactions->address = $ucwords_2;
                $transactions->amount = $input_7;
                if ($input_10 != null) {
                    $transactions->description = $ucwords_10; 
                }else{
                    $transactions->description = 'None';
                }
                $transactions->save();

                flash('Updated Successfully!')->success();
                return back()->withInput();
            default:
                echo 'Oops! Please contact Administrator';
                break;
        }
    }

    /*
    | View - Transaction by Transaction ID
    */

    Public function view($id){
        $transactions = Transaction::findOrFail($id);        
        $offices = Office::all();
        $prdescriptions = PrDescription::all();
        return view('transaction.view', compact('transactions', 'offices','prdescriptions'));
    }

    /*
    | Barcode - Shows transaction barcode
    */

    public function barcode($id){
        $data = Transaction::findOrFail($id);   
        $b_code = $data->reference_id;
        echo '<div style="width: 15%; margin-top:1%;" align="center">'. DNS2D::getBarcodeHtml($b_code, "QRCODE").'<br><hr><h2>'.$b_code.'<hr></h2>' .'</div>';
        // echo QrCode::format('png')->generate('Embed me into an e-mail!');
        

        
        
    }
   
}
