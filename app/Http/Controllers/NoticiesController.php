<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str as Str;
//use Illuminate\Support\Facades\Storage;
use Storage;
use File;
use Auth;
use View;


use \App\noticies;
use \App\categories;

class NoticiesController extends Controller
{
    /**
     * Llista les noticies
     * @return [view]           [retorna la vista amb les noticies]
     */
    public function index(Request $request)
    {
      $noticies = DB::table('noticies')
        ->join('users', 'users.id', '=', 'noticies.id_usuari')
        ->join('categories', 'categories.id', '=', 'noticies.categoria')
        ->select('noticies.id', 'titol', 'descripcio', 'users.nom', 'users.cognom1', 'users.cognom2', 'users.numero_document', 'path_img', 'str_slug', 'categories.nom as categoria')
        ->orderBy('id', 'DESC')
        ->paginate(10);
      return view('gestio.noticies.index', compact('noticies'));
    }

    /**
     * Mostra el formulari de creació de una nova noticia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        return view('gestio.noticies.create', compact('categories'));
    }

    /**
     * Guarda una nova noticia.
     * Si es crea la noticia correctament, crida a una notificació que envía un corrou a tots els clients.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      if ($request->has('image')) {
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/noticies';
        $file->move($file_path, $file_name);
        $foto_up = "/".$file_path."/".$file_name;
      }else {
        $foto_up = "";
      }
      $noticia = new noticies([
          'titol' => $request->get('titol'),
          'descripcio' => $request->get('descripcio'),
          'id_usuari' => Auth::id(),
          'categoria' => $request->get('categoria'),
          'path_img' => $foto_up,
          'str_slug' => str::slug($request->get('titol'))
      ]);
      $noticia ->save();
      $url = asset('/noticies/'.$noticia->str_slug);
      dispatch(new \App\Jobs\SendEmailNoticiesJob($noticia, $url));
      return redirect('/gestio/noticies')->with('success', 'Noticia registrada correctament');

    }

    /**
     * Mostra la noticia indicada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = noticies::find($id);
        return View::make('gestio.noticies.show')
            ->with('noticia', $noticia);
    }

    /**
     * Mostra el formulari d'edició de la noticia indicada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = noticies::find($id);
        $categoria = categories::find($noticia->categoria);
        $categories = categories::all();
        return view('gestio.noticies.edit', compact('noticia', 'categoria', 'categories'));

    }

    /**
     * Actualitza la noticia especificada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $noticia = noticies::find($id);
      $noticia->titol = $request->get('titol');
      $noticia->descripcio = $request->get('descripcio');
      $noticia->categoria = $request->get('categoria');
      if ($request->has('image')) {
        $image_path = public_path().$noticia->path_img;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/noticies';
        $file->move($file_path, $file_name);

        $noticia->path_img = "/".$file_path."/".$file_name;
      }
        $noticia->save();
        return redirect('/gestio/noticies')->with('success', 'Noticia modificada correctament');
    }

    /**
     * Elimina la noticia indicada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $noticia = noticies::find($id);
      $noticia->delete();
      return redirect('/gestio/noticies') ->with('success', 'Noticia eliminada correctament');
    }
}
