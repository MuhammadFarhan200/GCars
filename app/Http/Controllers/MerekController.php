<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.merek.index', [
            'mereks' => Merek::latest()->get(),
        ]);
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
        $validated = $request->validate([
            'nama' => 'required|max:255|unique:mereks',
        ]);
        $validated['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $validated['nama']));

        Merek::create($validated);
        Alert::success('Done', 'Data Merek Berhasil Di Buat')->autoClose();
        return redirect()->route('merek.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merek = Merek::findOrFail($id);

        if ($request->nama !== $merek->nama) {
            $validated = $request->validate([
                'nama' => 'required|max:255|unique:mereks',
            ]);
            $merek->nama = $validated['nama'];
            $merek->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $validated['slug']));
            $merek->save();
        }

        Alert::success('Done', 'Data Merek Berhasil Di Edit')->autoClose();
        return redirect->route('merek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!Merek::destroy($id)) {
        //     return redirect()->back();
        // }
        Merek::destroy($id);
        return redirect()->route('merek.index');
    }
}
