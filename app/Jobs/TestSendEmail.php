<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Barang;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestHelloEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TestSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new TestHelloEmail();
        // Mail::to('nauval222@gmail.com')->send($email);
        $barang = Barang::all();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $html = "";
        $html = view('barang/cetak_barang', compact('barang'));
        $mpdf->writeHTML($html);
        // $content = $mpdf->output();
        // $mpdf->Output('filename.pdf', 'S');
        Storage::disk('local')->put("testt.pdf", $mpdf->Output("testt.pdf", "S"));
        // $barang = Barang::all();
        // $pdf = PDF::loadView('pdf.barang', $barang);
        // Storage::disk('local')->put('public/pdf/barang.pdf', $pdf->output());
        // return $pdf->download('barang.pdf');
        // Storage::disk('local')->put('test.txt', 'ContentsTEST TEST');
        // Storage::disk('local')->put('test.pdf', $content);
    }
}
