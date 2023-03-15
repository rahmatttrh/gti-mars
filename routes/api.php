<?php

use App\Models\Schedule;
use App\Models\Wo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Helpers\general;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//
//
// DI BAWAH INI CONTROLLER UNTUK MODUL CREATE CARGO PLAN
// 
// 


// 1 GET SCHEDULE
Route::post('/get-schedule', function (Request $request) {

    $validator = $request->validate([
        'date' => ['required', 'max:10', 'min:10'],
        'origin_id' => ['required'],
        'destination_id' => ['required']
    ]);



    // if ($validator->errors())) {
    //     // $response['response'] = $validator->messages();
    //     $response = 'Salah';
    // } else {
    $data = Schedule::where('date', $request->date)->where('origin_id', $request->origin_id)->where('destination_id', $request->destination_id)->get();

    if (isset($data)) {
        # code...
        $response = [
            'message' => 'success',
            'data' => $data

        ];
    }
    // }

    return $response;
});


// 2 Insert WO when Click Select Button
Route::post('/wo', function (Request $request) {

    $validator = $request->validate([
        'party_id' => ['required'],
        'schedule_id' => ['required']
    ]);

    $data = WO::where('status', '0')->where('party_id', $request->party_id)->where('schedule_id', $request->schedule_id)->first();

    // return isset($data);

    if (!isset($data)) {

        $result = Wo::create([
            'party_id' => $request->party_id,
            'schedule_id' => $request->schedule_id,
            'status' => '0'
        ]);

        if ($result) {
            $respon = [
                'message' => 'success',
                'data' => $result
            ];
        } else {
            $respon = [
                'message' => 'error'
            ];
        }
    } else {
        $respon = [
            'message' => 'Sudah Ada'
        ];
    }

    return $respon;
});

// 3 Get Detail WO
Route::get('/wo/{id}', function ($id) {

    $data = WO::where('id', $id)->first();

    if (isset($data)) {

        $respon = [
            'message' => 'success',
            'data' => $data
        ];
    } else {
        $respon = [
            'message' => 'success',
            'data' => 'Tidak Ada Data'
        ];
    }

    return $respon;
});

// 3 Get Detail WO
Route::get('/wo/{id}/plancargo', function ($id) {

    $data = WO::where('id', $id)->first();

    if (isset($data)) {

        $respon = [
            'message' => 'success',
            'data' => $data->party
        ];
    } else {
        $respon = [
            'message' => 'success',
            'data' => 'Tidak Ada Data'
        ];
    }

    return $respon;
});
