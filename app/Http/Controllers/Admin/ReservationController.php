<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResevationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status',TableStatus::Available)->get();
        return view('admin.reservation.create',compact('tables'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResevationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning','Please choose the table based on guest.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach($table->reservations as $res){
            if (Carbon::parse($res->res_date)->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning','The choosed table is reserved for this date.');            }
        }
        Reservation::create($request->validated());
        return to_route('admin.reservation.index')->with('success','Reservation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status',TableStatus::Available)->get();

        return view('admin.reservation.edit',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResevationStoreRequest $request, Reservation $reservation)
    {
        
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning','Please choose the table based on guest.');
        }
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        $request_date = Carbon::parse($request->res_date);
        foreach($reservations as $res){
            if (Carbon::parse($res->res_date)->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning','The choosed table is reserved for this date.');            }
        }
        $reservation->update($request->validated());
        return to_route('admin.reservation.index')->with('success','Reservation updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservation.index')->with('danger','Reservation deleted successfully');

    }
}
