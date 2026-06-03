<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpParser\Node\Expr\Cast\Void_;

class HabitController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('habit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->habits()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Habito criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit): View
    {
        $this->authorize('update', $habit);
        return View('habit.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Hábito editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()->route('dashboard')->with('success', 'Hábito removido com sucesso!');

    }

    public function configurar(): View
    {
        $habits = Auth::user()->habits;
        return(view('habit.configurar', compact('habits')));
    }

    public function toggle(Habit $habit)
    {
        $this->authorize('toggle', $habit);

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
        ->where('habit_id', $habit->id)
        ->where('completed_at', $today)
        ->first();

        if($log){
            $log->delete();
            $message = 'Hábito desmarcado.';
        } else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today
            ]);
            $message = 'Hábito concluido 👏';
        }

        return redirect()
        ->route('dashboard')
        ->with('success', $message);

    }


    public function historico(): View
    {
        //1. Ano Atual
        $selectedYear = Carbon::now()->year;
        //2.Setar inicio e fim do ano
        $startDate = Carbon::create($selectedYear, 1, 1);
        $endDate = Carbon::create($selectedYear, 12,31);
        //3. Trazer Hábitos com os logs filtrados pelo ano atual
        $habits = Auth::user()->habits()
        ->with(['habitLogs' => function($query) use ($startDate, $endDate){
            $query->whereBetween('completed_at', [$startDate, $endDate]);
        }])
        ->get();
        return view('habit.historico', compact('habits', 'selectedYear'));
    }

}
