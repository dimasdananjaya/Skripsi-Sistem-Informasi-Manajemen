<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;
use Validator;
use Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('PetugasDinas.KelolaUser')
        ->with('user',$user);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan=new User;
        $simpan->name=$request->input('name');
        $simpan->email=$request->input('email');
        $simpan->role=$request->input('role');
        $simpan->no_kontak=$request->input('no_kontak');
        $simpan->alamat=$request->input('alamat');
        $simpan->status='aktif';
        
        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        
        $simpan->pwd=$request->input('password');
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);



        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Gunakan Email Yang Berbeda !');
            return back()
                        ;

        }

        else{
            $simpan->save();
            alert()->success('Success !', '');
            return back();

        }
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
        $simpan=User::find($id);
        $simpan->status=$request->input('status');
        $simpan->name=$request->input('name');
        $simpan->email=$request->input('email');
        $simpan->no_kontak=$request->input('no_kontak');
        $simpan->alamat=$request->input('alamat');
        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        $simpan->pwd=$request->input('password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,'.$simpan->id_user.',id_user'
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Email sudah dipakai');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Success !', '');
            return back();
        }

        
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
