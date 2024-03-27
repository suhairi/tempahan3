<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approves(Request $request) 
    {
        // 1. check whether the token exists
        dd($request->all());

        // 2. update approval status to true

        // 3. send notification to admin to take actions
    }

    public function resend(Request $request, $id)
    {
        $approval = Approval::findOrFail($id);

        // 1. update token and send email with the updated token to Approver
    }
}
