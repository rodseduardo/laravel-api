<?php

namespace App\Http\Controllers;

use App\Products;
use App\Http\Requests\ProductsRequest as Request;
use Excel;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    if($request->hasFile('file')){
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

            $path = $request->file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                    $insert[] = [
                        'lm' => $value->lm,
                        'name' => $value->name,
                        'free_shipping' => $value->free_shipping,
                        'description' => $value->description,
                        'price' => $value->price,
                    ];
                }

                if(!empty($insert)){

                    $insertData = Products::create($insert);
                    if ($insertData) {
                        return $insertData;
                    }else {
                        return 'Falha ao gravar dados';
                    }
                }
            }

        }else {
            return 'O Tipo de arquivo inseriod é: '. $extension .', favor fazer upload nos formatos: xls/csv ';
        }
    }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result =  Products::findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Products::findOrFail($id);
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Products::findOrFail($id);
        $result->delete();
        return response()->json($result);
    }
}
