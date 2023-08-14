<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use PDF;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::where('user_id', '=', Auth::user()->id, 'AND')->where('status', '=', 'waiting for payment')->latest('created_at')->first();
        $pay = Payment::where('transaction_id', '=', $transaction->id)->first();
        $totalHarga = $pay->price;
        $jumlahPesanan = $transaction->many_room;
        $roomId = explode(', ', $transaction->room_id);

        $check_in = Carbon::parse($transaction->check_in);
        $check_out = Carbon::parse($transaction->check_out);
        $totalMalam = $check_in->diffInDays($check_out);

        $kamar = Room::whereIn('id', $roomId)->get();
        $dataType = RoomType::where('id', '=', $kamar[0]->type_id)->first();
        foreach ($kamar as $val) {
            $nomorKamar[] = $val->number;
        }
        $nomorKamar = implode(', ', $nomorKamar);

        return view('payment.index', compact('nomorKamar', 'totalHarga', 'totalMalam', 'jumlahPesanan', 'transaction', 'dataType', 'pay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function invoice(Request $request)
    {
        $transactionId = Transaction::where('user_id', '=', Auth::user()->id, 'AND')->where('status', '=', 'waiting for payment')->pluck('id');
        $pay = Payment::whereIn('transaction_id', $transactionId)->get();
        $totalHarga = 0;
        foreach ($pay as $val) {
            $idPayment[] = $val->id;
            $totalHarga += $val->price;
        }

        $idPayment = implode(', ', $idPayment);

        // dd($idPayment);
        if ($request->pay_type == "dana") {
            $pay->url = 'https://link.dana.id';
            $pay->type = 'Dana';
            $pay->nomor = '089501157954';
        } else if ($request->pay_type == "ovo") {
            $pay->url = 'https://ovo.id';
            $pay->type = 'OVO';
            $pay->nomor = '089501157954';
        } else if ($request->pay_type == "gopay") {
            $pay->url = 'https://www.gojek.com/gopay/';
            $pay->type = 'Gopay';
            $pay->nomor = '089501157954';
        } else if ($request->pay_type == "mandiriva") {
            $pay->url = 'https://ibank.bankmandiri.co.id';
            $pay->type = 'Mandiri VA';
            $pay->nomor = '8895089501157954';
        } else if ($request->pay_type == "briva") {
            $pay->url = 'https://bri.co.id';
            $pay->type = 'BRI VA';
            $pay->nomor = '8895089501157954';
        } else if ($request->pay_type == "bcava") {
            $pay->url = 'https://bca.co.id';
            $pay->type = 'BCA VA';
            $pay->nomor = '8895089501157954';
        } else {
            $pay->url = 'error';
            $pay->type = 'error';
            $pay->nomor = 'error';
        }

        // dd($pay);
        return view('payment.invoice', compact('totalHarga', 'pay', 'idPayment'));
    }

    public function transactionProofPrint($id)
    {
        $data = Transaction::find($id);
        // dd($data);
        $roomId = explode(', ', $data->room_id);

        $kamar = Room::whereIn('id', $roomId)->get();
        $dataType = RoomType::where('id', '=', $kamar[0]->type_id)->first();
        foreach ($kamar as $val) {
            $nomorKamar[] = $val->number;
        }
        $nomorKamar = implode(', ', $nomorKamar);
        $data->nomorKamar = $nomorKamar;
        // dd($data);
        $pdf = PDF::loadView(
            'pdf.print-bukti',
            ['data' => $data]
        );
        return $pdf->download('bukti-pembayaran.pdf');
    }

    public function uploadProof(Request $request)
    {
        $imgName = time() . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('images/bukti'), $imgName);


        $paymentsId = explode(', ', $request->payment_id);

        $payments = Payment::whereIn('id', $paymentsId)->get();
        // $pay = Payment::find($request->payment_id);
        foreach ($payments as $val) {
            $val->update(['bukti' => $imgName]);
            // dd($pay);
            $data = Transaction::find($val->transaction_id);
            // dd($data);
            $data->update(['status' => 'process']);

            $logpay = date('YmdHis') . '_customer_pay_transaction';
            Log::create([
                'transaction_id' => $data->id,
                'log' => $logpay,
                'executor_id' => Auth::user()->id,
            ]);

            $log = date('YmdHis') . '_receptionist_toProcess_order';
            Log::create([
                'transaction_id' => $data->id,
                'log' => $log,
                'executor_id' => Auth::user()->id,
            ]);
        }

        return redirect()->route('customer.transactions');
    }

    public function receptionisUploadProof(Request $request)
    {
        $imgName = time() . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('images/bukti'), $imgName);

        $pay = Payment::find($request->payment_id);
        $pay->update(['bukti' => $imgName]);
        $data = Transaction::find($pay->transaction_id);
        $data->update(['status' => 'process']);

        $logpay = date('YmdHis') . '_customer_pay_transaction';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $logpay,
            'executor_id' => Auth::user()->id,
        ]);

        $log = date('YmdHis') . '_receptionist_toProcess_order';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('customer.transactions');
    }
}
