<?php

use App\Models\Schedule;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Helpers\general;
use App\Models\Wo;

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


// 0.1 GET SCHEDULE
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
            'message' => 'Get successfully ',
            'data' => $data

        ];
    }
    // }

    return $response;
});

// 1.1 Insert WO when Click Select Button
Route::post('/wo', function (Request $request) {

    $validator = $request->validate([
        'party_id' => ['required'],
        'payloadtype_id' => ['required'],
        'schedule_id' => ['required']
    ]);

    $data = WO::where('status', '0')->where('party_id', $request->party_id)->where('schedule_id', $request->schedule_id)->where('payloadtype_id', $request->payloadtype_id)->first();

    // return isset($data);

    if (!isset($data)) {

        $result = Wo::create([
            'party_id' => $request->party_id,
            'schedule_id' => $request->schedule_id,
            'payloadtype_id' => $request->payloadtype_id,
            'status' => '0'
        ]);

        if ($result) {
            $respon = [
                'message' => 'Inserted successfully ',
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

// 1.2 Update WO
Route::put('/wo/{id}', function (Request $request, $id) {

    $validator = $request->validate([
        'party_id' => ['required'],
        'payloadtype_id' => ['required'],
        'schedule_id' => ['required']
    ]);

    // return isset($data);
    $result = Wo::where('id', $id)->update([
        'party_id' => $request->party_id,
        'schedule_id' => $request->schedule_id,
        'payloadtype_id' => $request->payloadtype_id,
        'updated_at' => NOW()
    ]);

    if ($result) {
        $respon = [
            'message' => 'Updated successfully',
            'data' => $id
        ];
    } else {
        $respon = [
            'message' => 'error'
        ];
    }

    return $respon;
});

// 1.3 Get Detail WO
Route::get('/wo/{id}', function ($id) {

    $data = WO::where('id', $id)->first();

    if (isset($data)) {

        $respon = [
            'message' => 'Get successfully',
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

// 1.4 Update WO
Route::patch('/wo/{id}/update', function (Request $request, $id) {

    $validator = $request->validate([
        'activity' => ['required'],
        'departure' => ['required']
    ]);

    $result = Wo::where('id', $id)->update([
        'activity' => $request->activity,
        'departure' => $request->departure,
        'updated_at' => NOW()
    ]);

    if ($result) {
        $respon = [
            'message' => 'Updated successfully',
            'data' => $id
        ];
    } else {
        $respon = [
            'message' => 'error'
        ];
    }

    return $respon;
});

// 1.5 Delete WO
Route::delete('/wo/{id}/delete', function ($id) {

    $result = Wo::destroy($id);

    if ($result) {
        $respon = [
            'message' => 'Deleted successfully',
            'data' => $id
        ];
    } else {
        $respon = [
            'message' => 'error'
        ];
    }

    return $respon;
});

// 1.5 Release WO
Route::patch('/wo/{id}/release', function (Request $request, $id) {

    // $validator = $request->validate([
    //     'activity' => ['required'],
    //     'departure' => ['required']
    // ]);

    $result = Wo::where('id', $id)->update([
        'status' => '1',
        'release_at' => NOW()
    ]);

    if ($result) {
        $respon = [
            'message' => 'Release successfully',
            'data' => $id
        ];
    } else {
        $respon = [
            'message' => 'error'
        ];
    }

    return $respon;
});

// 2.1 Get Index Cargo Plan
Route::get('/wo/{id}/cargoplan', function ($id) {

    $data = Wo::where('id', $id)->first();
    $cargos = Cargo::where('wo_id', $id)->get();
    $ton = Cargo::where('wo_id', $id)->sum('ton');
    $m3 = Cargo::where('wo_id', $id)->sum('m3');

    if (isset($data)) {

        $respon = [
            'message' => 'success',
            'data' => $data,
            'ton' => $ton,
            'm3' => $m3,
            'cargos' => $cargos
        ];
    } else {
        $respon = [
            'message' => 'success',
            'data' => 'Tidak Ada Data'
        ];
    }

    return $respon;
});

// 2.2 Insert Cargo Plan 
Route::post('/cargo', function (Request $request) {

    $validator = $request->validate([
        'doc_no' => ['required'],
        'description' => ['required'],
        'qty' => ['required'],
        'unit' => ['required'],
        'ton' => ['required'],
        'm3' => ['required'],
    ]);


    if (!isset($request->wo_id)) {
        $request->wo_id == null;
    }

    $result = Cargo::create([
        'wo_id' => $request->wo_id,
        'doc_no' => $request->doc_no,
        'description' => $request->description,
        'qty' => $request->qty,
        'unit' => $request->unit,
        'ton' => $request->ton,
        'm3' => $request->m3,
        'created_at' => NOW(),
        'updated_at' => NOW()
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

    return $respon;
});

// 2.3 Show Cargo
Route::get('/cargo/{id}', function ($id) {

    $data = Cargo::where('id', $id)->first();

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

// 2.4 Update Cargo
Route::put('/cargo/{id}', function (Request $request, $id) {

    $validator = $request->validate([
        // 'id' => ['required'],
        'doc_no' => ['required'],
        'description' => ['required'],
        'qty' => ['required'],
        'unit' => ['required'],
        'ton' => ['required'],
        'm3' => ['required'],
    ]);

    $result = Cargo::where('id', $id)->update([
        'doc_no' => $request->doc_no,
        'description' => $request->description,
        'qty' => $request->qty,
        'unit' => $request->unit,
        'ton' => $request->ton,
        'm3' => $request->m3,
        'created_at' => NOW(),
        'updated_at' => NOW()
    ]);

    if ($result) {
        $respon = [
            'message' => 'Updated successfully',
            'data' => $result
        ];
    } else {
        $respon = [
            'message' => 'error'
        ];
    }

    return $respon;
});

// 2.5 Delete Cargo
Route::delete('/cargo/{id}/delete', function ($id) {

    $result = Cargo::destroy($id);

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

    return $respon;
});
