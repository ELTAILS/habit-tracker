<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpParser\Node\Expr\Cast\Void_;

class HabitController extends Controller
{
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
        return View('habit.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        //if valida se o usuario que está excruindo um habito
        //è relamente o habito dele
        if($habit->user_id !== Auth::id())
        {
            abort(403, 'FATAL erro: Habito não encontrado na sua lista');
        }

        $habit->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Hábito editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        //if valida se o usuario que está excruindo um habito
        //è relamente o habito dele
        if($habit->user_id !== Auth::id())
        {
            abort(403, 'FATAL erro: Habito não encontrado na sua lista');
        }

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
        if($habit->user_id !== Auth::id()){
            abort(403, 'FATAL erro: Habito não encontrado na sua lista');
        }

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

}
