<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class HRController extends Controller
{
   public function finalSelect($id)
{
    $interview = Interview::findOrFail($id);

    // 1. update status
    $interview->overall_status = 'selected';
    $interview->save();

    // 2. get candidate
    $candidate = $interview->candidate;

    // 3. generate secure link (valid 7 days)
    $link = URL::temporarySignedRoute(
        'candidate.form',
        now()->addDays(7),
        ['id' => $candidate->id]
    );

    // 4. send mail
    Mail::send('emails.final-selected', [
        'candidate' => $candidate,
        'link' => $link
    ], function ($message) use ($candidate) {
        $message->to($candidate->email)
                ->subject('You are Selected - Next Step');
    });

    return back()->with('success', 'Mail sent successfully');
}
}
