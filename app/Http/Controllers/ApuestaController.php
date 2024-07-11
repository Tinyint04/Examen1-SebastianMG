<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use App\Models\Juego;
use Illuminate\Http\Request;

class ApuestaController extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|integer',
        ]);

        Apuesta::create($request->all());

        return redirect()->route('apuestas.index');
    }

    public function filterByPlayers()
    {
        $apuestas = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->get();

        return view('apuestas.mayor_tres_jugadores', compact('apuestas'));
    }

    public function compareCardGames()
    {
        $totalCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');

        $totalNoCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');

        return view('apuestas.compare', compact('totalCartas', 'totalNoCartas'));
    }

    public function search(Request $request)
    {
        $juego = $request->input('juego');
        $apuestas = Apuesta::whereHas('juego', function ($query) use ($juego) {
            $query->where('nombre', 'like', '%' . $juego . '%');
        })->get();

        return view('apuestas.buscar_por_juego', compact('apuestas'));
    }

    public function buscarPorJuego(Request $request)
    {
        $juegoId = $request->input('juego_id');
        $apuestas = Apuesta::where('id_juego', $juegoId)->get();

        return view('apuestas.buscar_por_juego', compact('apuestas'));
    }

    public function compararDineroApuestas()
    {
        $totalCartas = Apuesta::whereHas('juego', function($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');

        $totalNoCartas = Apuesta::whereHas('juego', function($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');

        return view('apuestas.comparar_dinero', compact('totalCartas', 'totalNoCartas'));
    }

    public function apuestasMayorTresJugadores()
    {
        $apuestas = Apuesta::whereHas('juego', function($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->get();

        return view('apuestas.mayor_tres_jugadores', compact('apuestas'));
    }
}
