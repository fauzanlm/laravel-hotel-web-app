<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Log;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Transaction::where('user_id', '=', Auth::user()->id)->get();
        $pay = Transaction::where('status', 'waiting for payment')->get()->count();

        return view('transaction.index', compact('datas', 'pay'));
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $dataType = RoomType::find($request->type_id);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);
        $totalMalam = $check_in->diffInDays($check_out);
        // dd($totalMalam);
        if ($request->jumlah != NULL) {
            $jumlahPesanan = $request->jumlah;
        } else{
            $jumlahPesanan = 1;
        }
        if ($jumlahPesanan > $request->stok) {
            return redirect()->back()->with('error', 'Kamar melebihi batas!');
        }
        // dd($request->type_id);

        $dataKamar = Room::where('type_id', '=', $request->type_id)->where('status', '=', 'v')->get()->take($jumlahPesanan);
        // dd($dataKamar);
        foreach ($dataKamar as $val) {
            $dtkmr[] = $val->id;
            $nomorKamar[] = $val->number;
            Room::find($val->id)->update(['status' => 'r']);
        }
        // dd($dataKamar);
        if ($dataKamar != NULL) {
            $idKamar = implode(', ', $dtkmr);
            $nomorKamar = implode(', ', $nomorKamar);
        } else {
            $idKamar = "ERROR!";
        }


        $totalHarga = $dataType->price * $totalMalam * $jumlahPesanan + random_int(100, 999);
        // dd($totalHarga);


        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'room_id' => $idKamar,
            'many_room' => $jumlahPesanan,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        Payment::create([
            'user_id' => Auth::user()->id,
            'transaction_id' => $transaction->id,
            'price' => $totalHarga,
        ]);

        $log = date('YmdHis') . '_customer_order';
        Log::create([
            'transaction_id' => $transaction->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('customer.pay');
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

    public function transactionCancel($id)
    {
        $data = Transaction::find($id);
        $data->update(['status'=>'canceled']);

        $idKamar = explode(', ',$data->room_id);
        $dataKamar = Room::whereIn('id', $idKamar)->get();
        foreach ($dataKamar as $val) {
            Room::find($val->id)->update(['status' => 'v']);
        }

        $log = date('YmdHis').'_customer_cancel_order';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('customer.transactions');
    }

    public function transactionPay(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $pays = Payment::where('transaction_id', $transaction->id)->get();
        $pay = Payment::where('transaction_id', $transaction->id)->first();
        $idPayment = $pay->id;
        // dd($pay);
        $totalHarga = 0;
        foreach ($pays as $val) {
            $totalHarga += $val->price;
        }

        if ($request->pay_type == "dana") {
            $pay->url = 'https://link.dana.id';
            $pay->type = 'Dana';
            $pay->nomor = '089501157954';
        }else if ($request->pay_type == "ovo") {
            $pay->url = 'https://ovo.id';
            $pay->type = 'OVO';
            $pay->nomor = '089501157954';
        }else if ($request->pay_type == "gopay") {
            $pay->url = 'https://www.gojek.com/gopay/';
            $pay->type = 'Gopay';
            $pay->nomor = '089501157954';
        }else if ($request->pay_type == "mandiriva") {
            $pay->url = 'https://ibank.bankmandiri.co.id';
            $pay->type = 'Mandiri VA';
            $pay->nomor = '8895089501157954';
        }else if ($request->pay_type == "briva") {
            $pay->url = 'https://bri.co.id';
            $pay->type = 'BRI VA';
            $pay->nomor = '8895089501157954';
        }else if ($request->pay_type == "bcava") {
            $pay->url = 'https://bca.co.id';
            $pay->type = 'BCA VA';
            $pay->nomor = '8895089501157954';
        }else{
            $pay->url = 'error';
            $pay->type = 'error';
            $pay->nomor = 'error';
        }

        return view('payment.invoice', compact('totalHarga', 'pay', 'idPayment'));
    }
    public function reservations()
    {
        $datas = Transaction::select("*")
                            ->orderBy("created_at", "desc")
                            ->get();;
        return view('receptionis.reservations', compact('datas'));
    }

    public function toProcessTransaction($id)
    {

        $data = Transaction::find($id);
        $data->update(['status'=>'process']);

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

        return redirect()->route('receptionis.reservations');
    }

    public function toVerifiedTransaction($id)
    {
        $data = Transaction::find($id);
        $data->update(['status'=>'verified']);

        $log = date('YmdHis') . '_receptionist_toVerified_order';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('receptionis.reservations');
    }

    public function toFailedTransaction($id)
    {
        $data = Transaction::find($id);
        $data->update(['status'=>'failed']);

        $log = date('YmdHis') . '_receptionist_toFailed_order';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('receptionis.reservations');
    }

    public function toRejectedTransaction($id)
    {
        $data = Transaction::find($id);
        $data->update(['status'=>'rejected']);

        $log = date('YmdHis') . '_receptionist_rejected_order';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('receptionis.reservations');
    }

    public function transactionProof($id)
    {
        $data = Transaction::find($id);
        $roomId = explode(', ', $data->room_id);

        $kamar = Room::whereIn('id', $roomId)->get();
        $dataType = RoomType::where('id', '=', $kamar[0]->type_id)->first();
        foreach ($kamar as $val) {
            $nomorKamar[] = $val->number;
        }
        $nomorKamar = implode(', ', $nomorKamar);
        $data->nomorKamar = $nomorKamar;

        return view('bukti', compact('data'));
    }


    public function checkIn()
    {
        $transactions = Transaction::where('status', 'verified')->get();
        $datas = Transaction::where('status' , 'checked in')->get();


        return view('receptionis.checkin', compact('transactions', 'datas'));
    }
    public function checkInPersonalData()
    {
        $transactions = Transaction::where('status', 'verified')->get();
        $datas = Transaction::where('status' , 'checked in')->get();


        return view('receptionis.checkin-pdata', compact('transactions', 'datas'));
    }



    public function checkInPost(Request $request)
    {
        $data = Transaction::where( 'id','=',$request->transaction_id)->where('status', 'verified')->first();
        if ($data == NULL) {
            return redirect()->back()->with('error', 'Transaction ID is not Valid');
        }
        $data->update(['status' => 'checked in']);
        $idKamar = explode(', ',$data->room_id);
        $dataKamar = Room::whereIn('id', $idKamar)->get();

        $log = date('YmdHis') . '_receptionist_customer_checkin';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);
        foreach ($dataKamar as $val) {
            Room::find($val->id)->update(['status' => 'o']);
        }

        return redirect()->route('receptionis.checkin')->with('status', 'Success Checked In');
    }
    public function checkInPersonalDataPost(Request $request)
    {
        $data = Transaction::where( 'id','=',$request->transaction_id)->where('status', 'verified')->first();
        if ($data == NULL) {
            return redirect()->back()->with('error', 'Transaction ID is not Valid');
        }
        $data->update(['status' => 'checked in']);
        $idKamar = explode(', ',$data->room_id);
        $dataKamar = Room::whereIn('id', $idKamar)->get();

        $log = date('YmdHis') . '_receptionist_customer_checkin';
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);
        foreach ($dataKamar as $val) {
            Room::find($val->id)->update(['status' => 'o']);
        }

        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'job' => $request->job,
            'birthdate' => $request->birthdate,
            'transaction_id' => $data->id,
            'user_id' => $data->user_id,
        ]);

        return redirect()->route('receptionis.checkin.pdata')->with('status', 'Success Checked In');
    }

    public function checkOut($id)
    {
        $data = Transaction::find($id);
        $data->update(['status' => 'checked out']);
        $idKamar = explode(', ',$data->room_id);
        $dataKamar = Room::whereIn('id', $idKamar)->get();
        $log = date('YmdHis') . '_receptionist_customer_checkout';
        foreach ($dataKamar as $val) {
            Room::find($val->id)->update(['status' => 'v']);
        }
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('receptionis.checkin')->with('status', 'Success Checked Out');
    }
    public function checkPersonalDataOut($id)
    {
        $data = Transaction::find($id);
        $data->update(['status' => 'checked out']);
        $idKamar = explode(', ',$data->room_id);
        $dataKamar = Room::whereIn('id', $idKamar)->get();
        $log = date('YmdHis') . '_receptionist_customer_checkout';
        foreach ($dataKamar as $val) {
            Room::find($val->id)->update(['status' => 'v']);
        }
        Log::create([
            'transaction_id' => $data->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('receptionis.checkin.pdata')->with('status', 'Success Checked Out');
    }

    public function logs()
    {
        $datas = Log::select("*")
                            ->orderBy("created_at", "desc")
                            ->get();;
        return view('app.log', compact('datas'));
    }
}
