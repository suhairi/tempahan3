<?php

namespace App\Filament\Resources\VehiclebookingResource\Pages;

use App\Filament\Resources\VehiclebookingResource;
use App\Models\Approval;
use App\Models\Passenger;
use App\Models\Staff;
use App\Models\User;
use App\Models\Vehiclebooking;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateVehiclebooking extends CreateRecord
{
    protected static string $resource = VehiclebookingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        $staffid = Staff::where('nama', $data['name'])->first();
        $data['staffid'] = $staffid->staff_id;

        $approver = Approval::create([
                        'user_id'   => $data['approver']['name'],
                        'status'    => 'new',   
                    ]);
        $this->data['approval_id'] = $approver->id;
    
        // dd($data);
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
}
