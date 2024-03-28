<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Vehiclebooking;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Filament\Notifications\Notification;
use illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class PdfController extends Controller
{
    public function getVehicleBookingForm($id)
    {
        $record = Vehiclebooking::findOrFail($id);

        if($record->approval->status == 0)
        {
            Notification::make()
                ->title('This application NOT been approved yet. Please notify ' . $record->approval->user->name . ' to approve this application.')
                ->warning()
                ->send();
            
            return redirect()->back();
        }

        $passengers = [];
        foreach($record->passengers as $passenger)
        {
            $passengers[] = Staff::query()->where('staff_id', $passenger['passengers'])->first()->nama;
        }

        // dd($passengers);

        $pdf =  PDF::loadView('pdf.bookings.vehicle.index', ['record' => $record, 'passengers' => $passengers])
                    ->setTemporaryFolder(base_path(('storage\app\pdf\temp')))
                    ->setPaper('a4');
        return $pdf->download('Booking #' . $record->id . '_' . now() . '.pdf');
    }

    public function listing()
    {
        return;
    }
}
