<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $transaction_number = $request->transaction_number;
        $payment_amount = $request->payment_amount;
        $month = $request->month;
        $year = $request->year;

        $data = Sales::where('transaction_number', $transaction_number)->first();

        if (is_null($data)) {
            return $this->api_response(404, "Data tidak ditemukan");
        }

        if ($data->payment_status == "COMPLETED") {
            return $this->api_response(409, "Pembayaran untuk nomor transaksi $transaction_number sudah lunas. Pembayaran dibatalkan.");
        }

        $data = Payment::where('month', $month)
            ->where('year', $year)
            ->first();

        if (!is_null($data)) {
            return $this->api_response(409, "Pembayaran untuk bulan $month pada tahun $year sudah dilakukan. Pembayaran dibatalkan.");
        }

        $total_paid = Payment::where('sales_transaction_number', $transaction_number)
            ->select(DB::raw('SUM(payment_amount) as total_paid'))
            ->groupBy('sales_transaction_number')
            ->first();

        if (!is_null($total_paid)) {
            $sales_amount = Sales::where('transaction_number', $transaction_number)->first()->total_balance;
            $total = $total_paid->total_paid + $payment_amount;
            $difference = $sales_amount - $total_paid->total_paid;

            if ($total > $sales_amount) {
                return $this->api_response(400, "Pembayaran melebihi sisa yang harus dibayar. Sisa yang harus dibayar: Rp. " . number_format($difference) . ". Pembayaran dibatalkan.");
            }

            $model = new Payment();
            $model->sales_transaction_number = $transaction_number;
            $model->payment_amount = $payment_amount;
            $model->month = $month;
            $model->year = $year;
            $model->save();

            $total_paid = Payment::where('sales_transaction_number', $transaction_number)
                ->select(DB::raw('SUM(payment_amount) as total_paid'))
                ->groupBy('sales_transaction_number')
                ->first();
            
            $remaining = $sales_amount - $total_paid->total_paid;
            if($remaining == 0) {
                $model = Sales::where('transaction_number', $transaction_number)->first();
                $model->payment_status = "COMPLETED";
                $model->save();
                return $this->api_response(200, "Pembayaran berhasil dilakukan dengan keterangan 'Sudah Lunas'");
            }

            return $this->api_response(200, "Pembayaran berhasil dilakukan. Sisa yang harus dibayar: Rp. " . number_format($sales_amount - $total_paid->total_paid) . "");
        }

        $sales_amount = Sales::where('transaction_number', $transaction_number)->first()->total_balance;
        if ($payment_amount > $sales_amount) {
            return $this->api_response(400, "Pembayaran melebihi jumlah yang harus dibayar. Jumlah yang harus dibayar: Rp. " . number_format($sales_amount) . ". Pembayaran dibatalkan.");
        }

        $model = new Payment();
        $model->sales_transaction_number = $transaction_number;
        $model->payment_amount = $payment_amount;
        $model->month = $month;
        $model->year = $year;
        $model->save();

        return $this->api_response(200, "Pembayaran berhasil dilakukan. Sisa yang harus dibayar: Rp. " . number_format($sales_amount - $payment_amount) . "");
    }
}
