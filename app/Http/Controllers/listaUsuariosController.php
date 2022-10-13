<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use HttpRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Localidades;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class listaUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estados=Estados::all();
        $municipios=Municipios::all();
        $localidades=Localidades::all();

        $nombre = $request->get('buscarnombre');
        $ap = $request->get('buscarapellidop');
        $am = $request->get('buscarapellidom');

        $users = User::name($nombre)->ap($ap)->am($am)->Paginate(100000000000);

        return view('lista_usuarios.index', compact('users', 'estados'), compact('municipios', 'localidades'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivos2 $cultivos2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cultivos2 $cultivos2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivos2 $cultivos2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cultivos2 $cultivos2)
    {
        //
    }
}
