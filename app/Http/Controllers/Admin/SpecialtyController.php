<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\SpecialityUpdateRequest;

class SpecialtyController extends Controller
{

/*     public function __construct(){
        $this->middleware('can:specialties.index')->only('index');
        $this->middleware('can:specialties.create')->only('create');
        $this->middleware('can:specialties.store')->only('store');
        $this->middleware('can:specialties.show')->only('show');
        $this->middleware('can:specialties.update')->only('update');
        $this->middleware('can:specialties.edit')->only('edit');
        $this->middleware('can:specialties.destroy')->only('destroy');
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // creamos una variable con las especialidadas ordenadas
        $specialties = Specialty::orderBy('name', 'asc')->get();
        // se las pasamos a la vista
        return view('admin.specialties.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // variable con una nueva instancia de Scpeciality
        $specialty = new Specialty();
        $btn = "create";
        $title="new Specialty";
        return view('admin.specialties.create',compact('specialty', 'btn','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*   validamos que se nos envie el name para seguir
         y   que sea unico en la tabla */
        $request->validate([
            'name' => 'required|unique:specialties,name',
        ]);
        // pasamos ese nombre a minusculas
        $name = mb_strtolower($request->name);
        // creamos el slug con el nombre
        $slug = Str::slug($name);
        // creamos la variable especialidad
        $specialty = Specialty::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        return redirect()->route('specialties.index')->with('success', 'Especialidad creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        return view('admin.specialties.show',compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        $btn = "update";
        $title="edit Specialty";
        return view('admin.specialties.edit', compact('specialty','btn','title'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialityUpdateRequest $request, Specialty $specialty)
    {
        $name = mb_strtolower($request->name);
        $slug = Str::slug($name);
        $specialty->update([
            'name' => $name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        $specialty->save();

        return redirect()->route('specialties.index')->with('success', 'Specialty updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        /*  Se pone el numero 7 porque esas son las primeras que no queremos que se 
        borren */
        if($specialty->id>7){
            $specialty->delete();
        return redirect()->route('specialties.index')->with('success', 'Especialidad borrada con exito');

        }else{
        return redirect()->route('specialties.index')->with('fail', 'Especialidad no se pudo borro');

        }


    }
}
