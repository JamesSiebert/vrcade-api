<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckinController extends Controller
{
    public $success_status = 200;
    public $fail_status = 300;

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

        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id or room id not in request'
            ],
                $this->fail_status);
        }

        return response()->json([
            'status' => $this->success_status,
            'sent_post_data' => $data,
        ],
            $this->success_status);
    }

    public function index(): string
    {
        $data = DB::table('checkin')
            ->orderBy('updated_at', 'DESC')
            ->paginate(100);

        return view('checkin-log', ['data' => $data]);
    }
}
