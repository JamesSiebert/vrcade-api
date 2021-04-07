<?php

namespace App\Http\Controllers;

use App\Exports\ScoreExport;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ScoreController extends Controller
{
    public $success_status = 200;
    public $fail_status = 300;


    // WEB
    public function index(): string
    {
        $data = DB::table('scores')
            ->orderBy('updated_at', 'DESC')
            ->paginate(100);

        return view('scores', ['data' => $data]);
    }

//    // WEB
//    public function get_credit(): string
//    {
//        $data = DB::table('credit')
//            ->orderBy('updated_at', 'DESC')
//            ->paginate(100);
//
//        return view('credit', ['data' => $data]);
//    }






    // API
    public function get_scores(Request $request): \Illuminate\Http\JsonResponse
    {
        $air_hockey_room_name = "Room_AirHockey";
        $basketball_room_name = "Room_Basketball";
        $archery_room_name = "Room_Archery";

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

            // Get Top Scores
            $return_air_hockey_top = 0;
            $return_basketball_top = 0;
            $return_archery_top = 0;

            $score_search = Score::where('room_id', $air_hockey_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_air_hockey_top = $score_search->score;
            }

            $score_search = Score::where('room_id', $basketball_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_basketball_top = $score_search->score;
            }

            $score_search = Score::where('room_id', $archery_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_archery_top = $score_search->score;
            }


            $return_air_hockey_player_best = 0;
            $return_basketball_player_best = 0;
            $return_archery_player_best = 0;

            // Get specific players best score
            $score_search = Score::where('player_id', $player_id)->where('room_id', $air_hockey_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_air_hockey_player_best = $score_search->score;
            }

            $score_search = Score::where('player_id', $player_id)->where('room_id', $basketball_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_basketball_player_best = $score_search->score;
            }

            $score_search = Score::where('player_id', $player_id)->where('room_id', $archery_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_archery_player_best = $score_search->score;
            }

            return response()->json([
                'airHockeyTop' => $return_air_hockey_top,
                'basketballTop' => $return_basketball_top,
                'archeryTop' => $return_archery_top,
                'airHockeyPlayerBest' => $return_air_hockey_player_best,
                'basketballPlayerBest' => $return_basketball_player_best,
                'archeryPlayerBest' => $return_archery_player_best,
            ],
                $this->success_status);

        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id not in request'
            ],
                $this->fail_status);
        }
    }





    // API
    public function post_score(Request $request): \Illuminate\Http\JsonResponse
    {
        $air_hockey_room_name = "Room_AirHockey";
        $basketball_room_name = "Room_Basketball";
        $archery_room_name = "Room_Archery";

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

        if ( property_exists($data, 'player_id') && property_exists($data, 'room_id') && property_exists($data, 'score') ) {

            $player_id = $data->player_id;
            $room_id = $data->room_id;
            $score = $data->score;

            $db_score = new Score();
            $db_score->player_id = $player_id;
            $db_score->room_id = $room_id;
            $db_score->score = $score;
            $db_score->save();


            // Get Top Scores
            $return_air_hockey_top = 0;
            $return_basketball_top = 0;
            $return_archery_top = 0;

            $score_search = Score::where('room_id', $air_hockey_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_air_hockey_top = $score_search->score;
            }

            $score_search = Score::where('room_id', $basketball_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_basketball_top = $score_search->score;
            }

            $score_search = Score::where('room_id', $archery_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_archery_top = $score_search->score;
            }


            $return_air_hockey_player_best = 0;
            $return_basketball_player_best = 0;
            $return_archery_player_best = 0;

            // Get specific players best score
            $score_search = Score::where('player_id', $player_id)->where('room_id', $air_hockey_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_air_hockey_player_best = $score_search->score;
            }

            $score_search = Score::where('player_id', $player_id)->where('room_id', $basketball_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_basketball_player_best = $score_search->score;
            }

            $score_search = Score::where('player_id', $player_id)->where('room_id', $archery_room_name)->orderBy('score', 'desc')->first();
            if($score_search != null) {
                $return_archery_player_best = $score_search->score;
            }

            return response()->json([
                'airHockeyTop' => $return_air_hockey_top,
                'basketballTop' => $return_basketball_top,
                'archeryTop' => $return_archery_top,
                'airHockeyPlayerBest' => $return_air_hockey_player_best,
                'basketballPlayerBest' => $return_basketball_player_best,
                'archeryPlayerBest' => $return_archery_player_best,
            ],
                $this->success_status);


        }else{
            return response()->json([
                'status' => $this->fail_status,
                'reason' => 'Fail - player id, room_id or score not in request'
            ],
                $this->fail_status);
        }
    }



    public function export()
    {
        return Excel::download(new ScoreExport, 'score_export.xlsx');
    }
}
