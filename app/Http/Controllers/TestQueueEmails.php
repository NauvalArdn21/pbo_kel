<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestSendEmail;

class TestQueueEmails extends Controller
{
    /**
    * test email queues
    **/
    public function index()
    {
        $emailJobs = new TestSendEmail();
        $this->dispatch($emailJobs);
    }
}