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
        $data['user_id'] = $this->data['user_id'] = auth()->id();

        $user = User::find($data['user_id']);
        if(!$user->hasRole('Clerk'))
            return abort(403);
        
        $data['progress'] = $this->data['progress'] = 'New';

        $staffid = Staff::where('nama', $data['name'])->first();
        $data['staffid'] = $staffid->staff_id;

        $approval = Approval::create([
                        'user_id'   => $data['approver_id'],
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
        foreach($this->data['passengers'] as $passenger)
        {
            Passenger::create([
                'name' => $passenger['passenger_name'],
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
        // 1 - Check approval that has no vehicle booking
        $approvals = Approval::all();
        foreach($approvals as $approval)
        {
            $vBooking = Vehiclebooking::where('approval_id', $approval->id)->first();
            if($vBooking == null)
                $approval->delete();
        }
    }
}
