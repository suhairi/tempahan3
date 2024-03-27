<?php

namespace App\Http\Controllers;

use App\Models\Vehiclebooking;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

use function PHPUnit\Framework\isEmpty;

class PdfController extends Controller
{
    public function getVehicleBookingForm($id)
    {
        $record = Vehiclebooking::findOrFail($id);

        // dd($record->staff->jawatan->info_jawatan . ' - ' . $record->staff->gred->info_gred);
        // dd($record->approval->user->name . ' - ' . $record->approval->user->staff->gred->info_gred);
        // dd($record->driver->staff->no_tel);

        // dd($record->passengers()->first());

        $pdf =  PDF::loadView('pdf.bookings.vehicle.index', ['record' => $record])
                    ->setTemporaryFolder(base_path(('storage\app\pdf\temp')))
                    ->setPaper('a4');
        return $pdf->download('Booking #' . $record->id . '_' . now() . '.pdf');
    }

    public function listing()
    {
        return;
    }
}
