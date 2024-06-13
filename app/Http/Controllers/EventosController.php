<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Delegate_events;
use App\Models\Delegate;
use App\Models\Company;
use App\Models\Organizer;
use Carbon\Carbon;
use Auth; 
use DB;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Event::all();
        return view('eventos.index', compact('eventos'));
    }
    public function activos()
    {
        $eventos = Event::where('active', true)->get();
        //session()->flash('success', 'Registro guardado correctamente.');
        return view('eventos.activos', compact('eventos'));
    }

    public function participantes($id)
    {
        $participantes = DB::table('delegate_events')
        ->join('delegates', 'delegate_events.delegate', '=', 'delegates.id')
        ->join('companies', 'delegates.company', '=', 'companies.id')
        ->join('events', 'delegate_events.event', '=', 'events.id')
        ->join('organizers', 'events.organizer', '=', 'organizers.id')
        ->select('companies.*')
        ->where('delegate_events.event', $id)
        ->paginate(20);
    

        $usuario= Auth::id();

        $delegate = Delegate::where('user', Auth::id())->first();

        $evento_actual=Delegate_events::where('event',$id)->first();

        $event = DB::table('events')
        ->join('organizers', 'events.organizer', '=', 'organizers.id')
        ->join('companies', 'organizers.company', '=', 'companies.id')
        ->join('delegate_events', 'events.id', '=', 'delegate_events.event')
        ->select('events.*','companies.profile as perfil','delegate_events.paid as pagado')
        ->where('events.id',$evento_actual->event)
        ->first();
        // Retornar la vista 'eventos.participantes' con los datos de los participantes
        return view('eventos.participantes', [
            'participantes' => $participantes,
            'evento_actual' => $evento_actual,
            'event' => $event
        ]);
    }
    
    public function participar($eventoId) {
        $evento = Event::find($eventoId);
        
        if (!$evento) {
            return redirect()->route('evento.participantes', ['id' => $eventoId])->with('error', 'Evento no encontrado');
        }

        $delegate = Delegate::where('user', Auth::id())->first();
        if (!$delegate) {
            return redirect()->route('evento.participantes', ['id' => $eventoId])->with('error', 'Delegado no encontrado');
        }

        $evento_delegate = Delegate_events::where('event', $eventoId)->where('delegate', $delegate->id)->first();
        
        if ($evento_delegate) {
            return redirect()->route('evento.participantes', ['id' => $eventoId])->with('message', 'Ya estás inscrito en este evento');
        } else {
            $inscribir = new Delegate_events();
            $inscribir->event = $eventoId;
            $inscribir->delegate = $delegate->id;
            $inscribir->save();

            return redirect()->route('evento.participantes', ['id' => $eventoId])->with('message', 'Inscripción exitosa');
        }
    }
    
    public function disponibles()
    {
        return view('eventos.create');
    }
    public function finalizados()
    {
        $eventosActivos = Event::where('active', false)->get();
        return view('eventos.finalizados', ['eventos' => $eventosActivos]);
    }
    public function planificar($id)
    {
        $participantes = DB::table('delegate_events')
        ->join('delegates', 'delegate_events.delegate', '=', 'delegates.id')
        ->join('companies', 'delegates.company', '=', 'companies.id')
        ->join('events', 'delegate_events.event', '=', 'events.id')
        ->join('organizers', 'events.organizer', '=', 'organizers.id')
        ->select('companies.*','delegates.name as representante')
        ->where('delegate_events.event', $id)
        ->paginate(20);
    

        $usuario= Auth::id();

        $delegate = Delegate::where('user', Auth::id())->first();

        $evento_actual=Delegate_events::where('event',$id)->first();

        $event = DB::table('events')
        ->join('organizers', 'events.organizer', '=', 'organizers.id')
        ->join('companies', 'organizers.company', '=', 'companies.id')
        ->select('events.*','companies.profile as perfil')
        ->where('events.id',$evento_actual->event)
        ->first();
        // Retornar la vista 'eventos.participantes' con los datos de los participantes
        return view('eventos.planificacion', [
            'participantes' => $participantes,
            'evento_actual' => $evento_actual,
            'event' => $event
        ]);
    }

    public function create()
    {
        //
    }
    public function completarpago($id)
    {
        $options = [
            'ESPAÑA' => 'ESPAÑA',
            'ESPAÑA' => 'ESPAÑA',
            'ESPAÑA' => 'ESPAÑA',
        ];
        $evento=Event::find($id);
        $organizador=Organizer::find($evento->organizer);
        $company=Company::find($organizador->company);
        return view('eventos.metodopago',['options'=>$options,'evento'=>$evento,'company'=>$company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
