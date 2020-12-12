<?php

namespace App\Http\Controllers;

use App\Repository\DProductRepoInterface;
use Illuminate\Http\Request;
use DataTables;

class DuplicateProductController extends Controller
{
    protected $dproduct;

    public function __construct(DProductRepoInterface $dproduct)
    {
        // set the product
        $this->dproduct = $dproduct;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = $this->dproduct->all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('category',function($row){
                    return $row->category->name;
                })
                ->rawColumns(['description', 'action'])
                ->escapeColumns(['description'])
                ->make(true);
        }
        return view('dproducts.browse');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
