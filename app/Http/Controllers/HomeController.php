<?php

namespace App\Http\Controllers;

use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Monolog\Handler\SyslogUdp\UdpSocket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function usuarios()
    {
        return view('usuarios');
    }

    public function productos()
    {
        return view('productos');
    }

    public function verPdf()
    {

        // dd(User::all()->count());

        //return view('productos');
        $data=User::paginate(10);
        $pdf = Pdf::setOptions(['defaultFont' => 'courier']);
        $pdf->loadView('pdf.ejemplo-pdf', ['data'=>$data]);
        //return $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');
    }

    public function verGraficas()
    {
        $elementos = [
            'Elemento 1' => 100,
            'Elemento 2' => 200,
            'Elemento 3' => 300,
            'Elemento 4' => 400,
            'Elemento 5' => 500,
        ];

        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Elementos');

        foreach ($elementos as $key => $value) {
            // dd($key);
            $columnChartModel->addColumn($key, $value, '#f6ad55');
        }

            // ->addColumn('Elementos', $elementos)

        // $columnChartModel = 
        // (new ColumnChartModel())
        // ->setTitle('Expenses by Type')
        // ->addColumn('Food', 100, '#f6ad55')
        // ->addColumn('Shopping', 200, '#fc8181')
        // ->addColumn('Travel', 300, '#90cdf4')
    ;
        return view('graficas.ejemplo1', compact('columnChartModel'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
