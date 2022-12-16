<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        // $users = User::get();
        $transaksis = Transaksi::latest()->get();
        // $produks = Produk::get();
        $details = DetailTransaksi::get();

        return view('pages.transaksi.index', [
            // 'users' => $users,
            'transaksis' => $transaksis,
            // 'produks' => $produks,
            'details' => $details,
        ]);
    }

    public function edit(Transaksi $transaksi)
    {
        return view('pages.transaksi.editTR', [
            'transaksi' => $transaksi
        ]);
    }

    public function printpage()
    {
        $transaksis = Transaksi::all();
        $users = User::all();
        $details = DetailTransaksi::all();
        $date = Carbon::now();
        return view('pages.transaksi.cetakTransaksi', [
            'transaksis' => $transaksis,
            'users' => $users,
            'details' => $details,
            'date' => $date,
        ]);
    }

    public function printpagedetail(Transaksi $transaksi)
    {
        // $transaksi = Transaksi::where('id', $id)->get();

        $users = User::all();
        $details = DetailTransaksi::all();
        $date = Carbon::now();
        return view('pages.transaksi.printDetailTransaksi', [
            'transaksi' => $transaksi,
            'users' => $users,
            'details' => $details,
            'date' => $date,
            'userx' => Auth::user()
        ]);
    }

    public function printaction(Request $request)
    {
        $transaksis = Transaksi::all();
        $users = User::all();
        $details = DetailTransaksi::all();
        $pdate = $request->post('pdate');
        $status = $request->post('status');
        $x = $pdate . ' 00:00:00';
        $e = $pdate . ' 23:59:00';
        if ($status == 1) {
            $transaksis = Transaksi::whereBetween('created_at', [$x, $e])->where('metode_Byr', 1)->get();
        } else if ($status == 0) {
            $transaksis = Transaksi::whereBetween('created_at', [$x, $e])->where('metode_Byr', 0)->get();
        } else {
            $transaksis = Transaksi::whereBetween('created_at', [$x, $e])->get();
        }


        $html =  '';
        $metodeByr = '<span class="badge bg-label-success"> Tunai </span>';
        if (count($transaksis) > 0) {
            // dd(count($transaksis));
            foreach ($transaksis as $transaksi) {
                if ($transaksi->metode_Byr == 0) {
                    $metodeByr = '<span class="badge bg-label-success"> Tunai </span>';
                } else {
                    $metodeByr = '<span class="badge bg-label-warning"> Kredit </span>';
                }
                $totalByr = 0;
                foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)

                    $total = $detail->qty * $detail->price;
                $totalByr += $total;
                $ttl = $this->moneyFormat($totalByr);
                $html .= '<tr>
                                <td class="text-info">#' . $transaksi->id . '</td>
                                <td>' . date("d/m/yy", strtotime($transaksi->created_at)) . '</td>
                                <td>' . $transaksi->user->name . '</td>
                                <td>' . $metodeByr . '</td>
                                <td>' . $ttl . ' </td>
                         </tr>';
            };
        } else {
            $html =  '
            <tr>
                <td></td>
                <td></td>
                <td class="m-2"><h5 class="text-center m-auto">Data Tidak Ditemukan</h5></td>
                <td></td>
                <td></td>
                
            </tr>
            ';
        }

        echo $html;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function moneyFormat($amount)
    {
        return 'Rp' . number_format($amount, 2);
    }

    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi telah di hapus');
    }
}
