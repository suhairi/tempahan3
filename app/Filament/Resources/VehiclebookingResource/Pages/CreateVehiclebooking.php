<?php

namespace App\Filament\Resources\VehiclebookingResource\Pages;

use App\Filament\Resources\VehiclebookingResource;
use App\Mail\VehicleBooked;
use App\Models\Approval;
use App\Models\Passenger;
use App\Models\Staff;
use App\Models\User;
use App\Models\Vehiclebooking;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

class CreateVehiclebooking extends CreateRecord
{
    protected static string $resource = VehiclebookingResource::class;
    protected ?string $heading = 'Vehicle Booking Form';

    public function getSubheading(): string
    {
        return 'This form will ...';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['clerk_id'] = $this->data['clerk_id'] = auth()->id();

        $user = User::find($data['clerk_id']);
        if(!$user->hasRole('Clerk'))
            return abort(403);
        
        $data['progress'] = $this->data['progress'] = 'New';

        $staffid = Staff::where('nama', $data['name'])->first();
        $data['staffid'] = $staffid->staff_id;

        $approval = Approval::create([
                        'user_id'   => $this->data['approver_id'],
                    ]);
        $data['approval_id'] = $this->data['approval_id'] = $approval->id;
        
        /*
        // Modification to $data
        // this function should return $data, not $this->data
        // below are the modifications
        */
        $this->data['attachment'] = $data['attachment'];

        // dump($this->data);
        // dd($data);

        // Send notification to approver
        // $approver = User::find($approver->id);
        $approver = User::find(1); // for development purpose, just send the notification to approve booking to me.
        Mail::to($approver)
            ->queue(new VehicleBooked($approver, $data));
    
        // dd($data);
        // $data['progress'] = 'New';
        return $data;
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        // Create passenger data
        $vehiclebooking_id = $this->record->id;
        // dd($this->data['passengers']);
        foreach($this->data['passengers'] as $passenger)
        {
            $staffName = Staff::where('staff_id', $passenger['passenger_staffid'])->first()->nama;
            Passenger::create([
                'staffid'   => $passenger['passenger_staffid'],
                'name'      => $staffName,
                'vehiclebooking_id' => $vehiclebooking_id,
            ]);
        }

        // update vehiclebooking->approval_id
        $this->record->approval_id = $this->data['approval_id'];
        $this->record->save();
        // dd($this->data);
    }

    protected function beforeFill(): void
    {
        // 1 - Check Approval that has no Vehiclebooking, and delete them
        $approvals = Approval::all();
        foreach($approvals as $approval)
        {
            $vBooking = Vehiclebooking::where('approval_id', $approval->id)->first();
            if($vBooking == null)
                $approval->delete();
        }

        // 2 - Check Vehiclebooking that has no Approval, and delete them.
        $vBookings = Vehiclebooking::where('approval_id', null)->get();
        foreach($vBookings as $vBooking)
            $vBooking->delete();
        
    }
}
