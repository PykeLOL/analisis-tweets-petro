<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\RespuestaTweet;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TweetPython;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index');
    }

    public function actividadPorTiempo(Request $request)
    {
        $tipo = $request->input('agrupacion', 'mensual'); // mensual por defecto

        switch ($tipo) {
            case 'semanal':
                $formato = "IYYY-IW"; // Semana ISO
                break;
            case 'anual':
                $formato = "YYYY";
                break;
            case 'mensual':
            default:
                $formato = "YYYY-MM";
                break;
        }

        $tweets = DB::table('tweets_python')
            ->select(DB::raw("TO_CHAR(main_tweet_datetime, '$formato') as periodo"), DB::raw('COUNT(*) as total'))
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get();

        return response()->json($tweets);
    }

    public function sentimientosRespuestas()
    {
        $result = DB::table('tweets_python')
            ->select('sentiment', DB::raw('COUNT(*) as total'))
            ->groupBy('sentiment')
            ->orderByRaw("CASE
                WHEN sentiment = 'Muy negativo' THEN 1
                WHEN sentiment = 'Negativo' THEN 2
                WHEN sentiment = 'Neutro' THEN 3
                WHEN sentiment = 'Positivo' THEN 4
                WHEN sentiment = 'Muy positivo' THEN 5
                ELSE 6 END")
            ->get();

        return response()->json($result);
    }

    public function sentimientoPorGenero()
    {
        $generoDistribucion = DB::table('respuestas_tweets')
            ->select('gender', DB::raw('COUNT(*) as total'))
            ->groupBy('gender')
            ->get();

        $totalGenero = $generoDistribucion->sum('total');

        $porcentajes = $generoDistribucion->mapWithKeys(function ($item) use ($totalGenero) {
            return [$item->gender => $item->total / $totalGenero];
        });

        $sentimientos = DB::table('tweets_python')
        ->select('sentiment', DB::raw('COUNT(*) as total'))
        ->groupBy('sentiment')
        ->get();

        $estimacion = [];

        foreach ($sentimientos as $sentimiento) {
            foreach (['male', 'female', 'bodega'] as $genero) {
                $estimacion[] = [
                    'sentiment' => $sentimiento->sentiment,
                    'gender' => $genero,
                    'estimado' => round($sentimiento->total * ($porcentajes[$genero] ?? 0))
                ];
            }
        }

        return response()->json($estimacion);
    }

    public function usuariosMasComentan()
    {
        $data = DB::table('tweets_python')
            ->select('comment_username', DB::raw('COUNT(*) as total'))
            ->whereNotNull('comment_username')
            ->groupBy('comment_username')
            ->orderByDesc('total')
            ->limit(20)
            ->get();

        return response()->json($data);
    }

    public function sentimientoPorTiempo(Request $request)
    {
        $agrupacion = $request->get('agrupacion', 'mensual');

        switch ($agrupacion) {
            case 'semanal':
                $formato = "IYYY-IW"; // Año-Semana ISO
                break;
            case 'anual':
                $formato = "YYYY";
                break;
            case 'mensual':
            default:
                $formato = "YYYY-MM";
                break;
        }

        $datos = DB::table('tweets_python')
            ->selectRaw("TO_CHAR(comment_time, '{$formato}') as periodo, ROUND(AVG(sentiment_score), 3) as promedio")
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get();

        return response()->json($datos);
    }
}
