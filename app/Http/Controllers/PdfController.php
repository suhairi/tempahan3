<?php

namespace App\Http\Controllers;

use App\Models\Vehiclebooking;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PdfController extends Controller
{
    public function getVehicleBookingForm($id)
    {
        $record = Vehiclebooking::findOrFail($id);

        // return view('pdf.bookings.vehicle.index', ['record' => $record]);
        $pdf =  PDF::loadView('pdf.bookings.vehicle.index', ['record' => $record])
                    ->setTemporaryFolder(base_path(('storage\app\pdf\temp')));
        return $pdf->download('Booking #' . $record->id . '_' . now() . '.pdf');
    }
}
