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

    <div class="container m-4">

        <h1>Details Vehicle Booking Form</h1>
        <table class="table table-bordered">
            <tr>
                <td class="font-bold">Applicant</td>
                <td>{{ $record->name }}</td>
            </tr>
            <tr>
                <td class="font-bold">Start Date</td>
                <td>{{ Carbon\Carbon::parse($record->start_date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="font-bold">End Date</td>
                <td>{{ Carbon\Carbon::parse($record->end_date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="font-bold">Driver</td>
                <td>{{ strtoupper($record->driver->name) }}</td>
            </tr>
            <tr>
                <td class="font-bold">Destination</td>
                <td>{{ strtoupper($record->destination) }}</td>
            </tr>
            
        </table>

    </div>
    
    
</body>
</html>