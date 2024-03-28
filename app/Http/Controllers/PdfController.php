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

        // Disable download pdf in the form not approved.
        if($record->approval->status == 0)
        {
            Notification::make()
                ->title('This application NOT been approved yet. Please notify ' . $record->approval->user->name . ' to approve this application.')
                ->warning()
                ->send();
            
            return redirect()->back();
        }

        // Update progress in table of vehiclebookings of approved form to Done
        // Done - meaning that, this form has been taken all necessary actions.
        $record->progress = 'Done';
        $record->save();

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
