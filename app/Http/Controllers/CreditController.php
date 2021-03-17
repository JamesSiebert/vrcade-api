<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    public $success_status = 200;
    public $fail_status = 300;

    // WEB
    public function index(): string
    {
        $data = DB::table('credit')
            ->orderBy('updated_at', 'DESC')
            ->paginate(100);

        return view('credit', ['data' => $data]);
    }

    // WEB
    public function get_credit(): string
    {
        $data = DB::table('credit')
            ->orderBy('updated_at', 'DESC')
            ->paginate(100);

        return view('credit', ['data' => $data]);
    }






    // API
    public function check_credit(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - Validation'
            ],
                $this->fail_status);
        }

        $success = false;
        $data = json_decode(request('data'));   // decodes data JSON object

        if ( property_exists($data, 'player_id')) {

            $player_id = $data->player_id;

            $data = DB::table('credit')
                ->where("player_id", "=", $player_id)
                ->first();

            if($data == null){
                return response()->json([
                    'status' => $this->fail_status,
                    'reason' => 'Fail - Player not found',
                    'player_id' => $player_id
                ],
                    $this->fail_status);
            }else{
                $return_amount = $data->amount;
            }
        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id not in request'
            ],
                $this->fail_status);
        }

        return response()->json([
            'status' => $this->success_status,
            'amount' => $return_amount,
            'sent_post_data' => $data,
        ],
            $this->success_status);
    }





    // API
    public function modify_credit(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - Validation'
            ],
                $this->fail_status);
        }

        $success = false;
        $data = json_decode(request('data'));   // decodes data JSON object


        if ( property_exists($data, 'player_id') && property_exists($data, 'amount') ) {

            $player_id = $data->player_id;
            $modify_amount = $data->amount;

            $credit_search = Credit::where('player_id', $player_id)
                ->first();

            if($credit_search == null){
                $new_amount = $data->amount;
                // if no account found make a new one
                $db_credit = new Credit();
                $db_credit->player_id = $data->player_id;
                $db_credit->amount = $new_amount;
                $db_credit->save();
            }else{
                $new_amount = $credit_search->amount + $modify_amount;
                $credit_search->amount = $new_amount;
                $credit_search->save();
            }
        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id or amount not in request'
            ],
                $this->fail_status);
        }

        return response()->json([
            'status' => $this->success_status,
            'player_id' => $player_id,
            'modify_amount' => $modify_amount,
            'new_amount' => $new_amount,

            'sent_post_data' => $data,
        ],
            $this->success_status);
    }

}
