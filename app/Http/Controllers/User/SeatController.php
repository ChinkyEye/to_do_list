<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seat;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::all();
        return view('user.seat.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
public function create()
{
    $rows = 7;
    $columns = 8;

    $vipRows = ['C'];
    $accessibleSeats = ['B2', 'D4'];
    $bookedSeatIds = ['A1', 'C3'];

    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $seatsToInsert = [];

    for ($r = 0; $r < $rows; $r++) {
        $row = $alphabet[$r];
        $isVipRow = in_array($row, $vipRows);

        for ($n = 1; $n <= $columns; $n++) {
            $seatId = "{$row}{$n}";
            $isAccessible = in_array($seatId, $accessibleSeats);
            $isBooked = in_array($seatId, $bookedSeatIds);

            $seatsToInsert[] = [
                // 'id' => $seatId,
                'row' => $row,
                'number' => $n,
                'type' => $isAccessible ? 'accessible' : ($isVipRow ? 'vip' : 'regular'),
                // 'status' => $isBooked ? 'taken' : 'available',
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ];
        }
    }

    // Optional: Clear existing seats before inserting new ones
    Seat::truncate();

    // Bulk insert to DB
    Seat::insert($seatsToInsert);

    // return view('user.seat.index');
     $pass = array(
          'message' => 'Data added successfully!',
          'alert-type' => 'success'
        );
     return redirect()->route('user.seat.index')->with($pass);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function isBooked(Request $request,$id)
    {
      $get_is_active = Seat::where('id',$id)
                            ->value('is_booked');
      $isactive = Seat::find($id);
      if($get_is_active == 0){
        $isactive->is_booked = 1;
        $notification = array(
          'message' => $isactive->name.' is Active!',
          'alert-type' => 'success'
        );
      }
      else {
        $isactive->is_booked = 0;
        $notification = array(
          'message' => $isactive->name.' is inactive!',
          'alert-type' => 'error'
        );
      }
      if(!($isactive->update())){
        $notification = array(
          'message' => 'data could not be changed!',
          'alert-type' => 'error'
        );
      }
      return back()->with($notification)->withInput();
    }
}
