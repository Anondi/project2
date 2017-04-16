<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createManufacturer()
    {
        return view('admin.manufacture.createManufacture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeManufacturer(Request $request)
    {
        $this->validate($request,[
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
            'publicationStatus'=>'required',
        ]);
       $manufacturer = new Manufacturer();
       $manufacturer->manufacturerName=$request->manufacturerName;
       $manufacturer->manufacturerDescription=$request->manufacturerDescription;
       $manufacturer->publicationStatus=$request->publicationStatus;
       $manufacturer->save();
       return redirect('add-manufacturer')->with('message','Manufacturer Info Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showManufacturer()
    {
      $manufacturers = Manufacturer::all();
      return view('admin.manufacture.manageManufacturer',['manufacture'=>$manufacturers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editManufacturer($id)
    {
        $manufacturers = Manufacturer::where('id',$id)->first();
        return view('admin.manufacture.editManufacturer',['manufacturers'=>$manufacturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateManufacturer(Request $request)
    {
        $manufacturers=Manufacturer::find($request->manufacturerId);
        $manufacturers->manufacturerName=$request->manufacturerName;
        $manufacturers->manufacturerDescription=$request->manufacturerDescription;
        $manufacturers->publicationStatus=$request->publicationStatus;
        $manufacturers->save();
        return redirect('/manage-manufacturer')->with('message','Manufacturer Successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteManufacturer($id)
    {
        $manufacturers=Manufacturer::find($id);
        $manufacturers->delete();
        return redirect('/manage-manufacturer')->with('message','Manufacturer Deleted Successfully');
    }
}
