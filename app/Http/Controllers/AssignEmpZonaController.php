<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\User;
use \App\Zona;
use \App\AssignEmpZona;
use \App\ServeisZones;

class AssignEmpZonaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $assignacions = Zona::all();

    return view('gestio/AssignEmpZona/index', compact('assignacions'));

  }

  public function viewData(Request $request, $id){

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/date', compact('zona'));

  }

  public function filterEmploye(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarMantenimentFiltro($data_inici, $data_fi);
    $id_zona = Zona::find($id);

    return view('gestio/AssignEmpZona/freeEmploye', compact('user','data_inici', 'data_fi', 'id_zona'));
  }

  public function saveAssign (Request $request, $id){

            $request->validate([
                'id_zona' => 'required',
                'id_empleat' => 'required',
                'data_inici_modal' => 'required',
                'data_fi_modal' => 'required'
            ]);


        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 2,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');

  }

  public function listAssign (){

    $assign = AssignEmpZona::llistarEmpassign();
    return view ('gestio/AssignEmpZona/llistarAssign', compact('assign'));

  }

  public function deleteAssign ($id){


    $assignacio = AssignEmpZona::find($id);

    $assignacio->delete();

    $assign = AssignEmpZona::llistarEmpassign();

    return view ('gestio/AssignEmpZona/llistarAssign', compact('assign'));
  }

  public function viewDataNeteja(Request $request, $id){

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/dateNeteja', compact('zona'));

  }

  public function filterEmployeNeteja(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarNetejaFiltro ($data_inici, $data_fi);
    $id_zona = Zona::find($id);

    return view('gestio/AssignEmpZona/freeEmployeNeteja', compact('user','data_inici', 'data_fi', 'id_zona'));
  }

    public function saveAssignNeteja (Request $request, $id){

      $request->validate([
          'id_zona' => 'required',
          'id_empleat' => 'required',
          'data_inici_modal' => 'required',
          'data_fi_modal' => 'required'
      ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 1,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');

  }

  public function viewDataAtencio(Request $request, $id){

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/dateAtencio', compact('zona'));

  }

  public function filterEmployeAtencio(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarAtencioFiltro ($data_inici, $data_fi);
    $id_zona = Zona::find($id);

    return view('gestio/AssignEmpZona/freeEmployeAtencio', compact('user','data_inici', 'data_fi', 'id_zona'));
  }

  public function saveAssignAtencio (Request $request, $id){

    $request->validate([
        'id_zona' => 'required',
        'id_empleat' => 'required',
        'data_inici_modal' => 'required',
        'data_fi_modal' => 'required'
    ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 3,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');

  }
  public function viewDataShow(Request $request, $id){

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/dateShow', compact('zona'));

  }

  public function filterEmployeShow(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarShowFiltro($data_inici, $data_fi);
    $id_zona = Zona::find($id);

    return view('gestio/AssignEmpZona/freeEmployeShow', compact('user','data_inici', 'data_fi', 'id_zona'));
  }

  public function saveAssignShow (Request $request, $id){

    $request->validate([
        'id_zona' => 'required',
        'id_empleat' => 'required',
        'data_inici_modal' => 'required',
        'data_fi_modal' => 'required'
    ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 4,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');

  }
public function viewDataSeguretat(Request $request, $id){

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/dateSeg', compact('zona'));

  }

  public function filterEmployeSeguretat(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarSeguretatFiltro ($data_inici, $data_fi);
    $id_zona = Zona::find($id);

    return view('gestio/AssignEmpZona/freeEmployeSeg', compact('user','data_inici', 'data_fi', 'id_zona'));
  }

  public function saveAssignSeguretat (Request $request, $id){

    $request->validate([
        'id_zona' => 'required',
        'id_empleat' => 'required',
        'data_inici_modal' => 'required',
        'data_fi_modal' => 'required'
    ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 5,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');

  }

}
  
