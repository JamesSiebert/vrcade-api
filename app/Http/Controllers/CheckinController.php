<?php

namespace App\Http\Controllers;


use App\Exports\CheckinExport;
use App\Models\Checkin;
use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class CheckinController extends Controller
{
    public $success_status = 200;
    public $fail_status = 300;
    public $deduct_money = true;
    public $deduct_amount = 10;

    public function checkin(Request $request): \Illuminate\Http\JsonResponse
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


        if ( property_exists($data, 'player_id') && property_exists($data, 'room_id') ) {

            $db_checkin = new Checkin();
            $db_checkin->player_id = $data->player_id;
            $db_checkin->room_id = $data->room_id;
            $db_checkin->save();

            // deduct money for game usage
            if($this->deduct_money == true)
            {
                $player_id = $data->player_id;

                $credit_search = Credit::where('player_id', $player_id)
                    ->first();

                if($data == null) {
                    // if no account found make a new one
                    $db_credit = new Credit();
                    $db_credit->player_id = $data->player_id;
                    $db_credit->amount = 0 - $this->deduct_amount;
                    $db_credit->save();

                    return response()->json([
                        'status' => $this->success_status,
                        'balance' => 0 - $this->deduct_amount,
                        'sent_post_data' => $data,
                    ],
                        $this->success_status);
                }else{
                    $new_amount = $credit_search->amount - $this->deduct_amount;
                    $credit_search->amount = $new_amount;
                    $credit_search->save();

                    return response()->json([
                        'status' => $this->success_status,
                        'balance' => $new_amount,
                        'sent_post_data' => $data,
                    ],
                        $this->success_status);
                }
            }

        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id or room id not in request'
            ],
                $this->fail_status);
        }


    }

    public function index(): string
    {
        $data = DB::table('checkin')
            ->orderBy('updated_at', 'DESC')
            ->paginate(100);

        return view('checkin_log', ['data' => $data]);
    }

    public function export()
    {
        return Excel::download(new CheckinExport, 'checkin_export.xlsx');
    }
}
