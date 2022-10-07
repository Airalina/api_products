<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendEmailVerificationReminderCommand;
use App\Console\Commands\SendNewsLetterCommand;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewsLetterController extends Controller
{
    public function send()
    {
        Artisan::call(SendEmailVerificationReminderCommand::class);

        return response()->json([
            'data' => 'OK'
        ]);
    }
}
