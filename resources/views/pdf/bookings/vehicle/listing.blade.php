<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>

    <div class="m-4">

        <h1>Details Vehicle Booking Form</h1>

        <br />
        <div><p><strong>Status :</strong> {{ $record->progress }}</p></div>
        <table class="table table-bordered table-dark table-sm">
            <tr>
                <td colspan="2"><strong>Applicant Info</strong></td>
            </tr>
            <tr>
                <td width="20%"><strong>Applicant Name</strong></td>
                <td>{{ $record->staffid }} - {{ $record->name }} </td>
            </tr>
            <tr>
                <td><strong>Approver / Supervisor</strong></td>
                <td>{{ $record->approval->user->staffid }} - {{ $record->approval->user->name }}</td>
            </tr>
        </table>
            
        <table class="table table-bordered table-sm bg">
            <tr>
                <td colspan="2"><strong>Event & Booking Info</strong></td>
            </tr>
            <tr>
                <td width="20%"><strong>Booking Start Date</strong></td>
                <td>{{ $record->start_date }} - {{ Carbon\Carbon::parse($record->start_date)->locale('en')->dayName }}</td>
            </tr>
            <tr>
                <td><strong>Event Start Date</strong></td>
                <td>{{ $record->start_event_date }} - {{ Carbon\Carbon::parse($record->start_event_date)->locale('en')->dayName }}</td>
            </tr>
            
            <tr>
                <td><strong>End Date</strong></td>
                <td>{{ $record->end_date }} - {{ Carbon\Carbon::parse($record->end_date)->locale('en')->dayName }}</td>
            </tr>
            <tr>
                <td><strong>Event Location</strong></td>
                <td>{{ $record->destination }}</td>
            </tr>
        </table>
        
        <table class="table table-bordered table-sm bg">
            <tr>
                <td colspan="2"><strong>Vehicle and Driver Info</strong></td>
            </tr>
            <tr>
                <td width="20%"><strong>Request Driver Name</strong></td>
                <td>{{ $record->driver->staffid }} - {{ $record->driver->name }}</td>
            </tr>
            <tr>
                <td><strong>Request Vehicle Type</strong></td>
                <td>{{ $record->cartype->name }}</td>
            </tr>
        </table>
        <table class="table table-bordered table-sm bg">
            <tr>
                <td colspan="2"><strong>Passengers Info</strong></td>
            </tr>
            @if(empty($record->passengers()->first()))
            <tr>
                <td>*No passenger.</td>
            </tr>
            @else
                @foreach($record->passengers()->get() as $passenger)
                    <tr>
                        <td width="20%"><strong>Name #{{ $loop->iteration }}</strong></td>
                        <td>{{ $passenger->staffid}} - {{ $passenger->name }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        
    </div>
    
    
</body>
</html>