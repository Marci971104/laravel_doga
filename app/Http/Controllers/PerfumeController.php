<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Perfume;



class PerfumeController extends Controller
{

    public function insertPerfumes(){

     //   DB::insert("INSERT INTO perfumes (name,type,price) VALUES (?,?,?)",["Boss", "férfi", "250000"]);
        // DB::insert("INSERT INTO perfumes (name,type,price) VALUES (?,?,?)",["Avon", "noi", "15000"]);
    //    DB::insert("INSERT INTO perfumes (name,type,price) VALUES (?,?,?)",["Zara", "férfi", "300000"]);
    //    DB::insert("INSERT INTO perfumes (name,type,price) VALUES (?,?,?)",["Nike", "noi", "8900"]);
    
     }


    public function getPerfumes() {

        $perfume = DB::select( "SELECT * FROM perfumes" );
 
        foreach( $perfume as $perfume ) {
     
            print_r( $perfume->name . "<br>" );
            print_r( $perfume->type . "<br>" );
            print_r( $perfume->price . "<br>" );
        }
    }

    public function newPerfume() { 
        if( $request->isMethod( "post" )) {
 
        $request->validate([
            "name" => "required|min:4|max:20",
            "type" => "required",
            "price" => "required|digits_between:1,11"
        ]);
    
    return view( "new_perfume" ) ;
        }
    }


    

    public function storePerfume( Request $request ) {

        $perfume = new Perfume;

        $perfume->name = $request->name;
        $perfume->type = $request->type;
        $perfume->price = (int)$request->price;

        $perfume->save();

        return redirect( "/new-perfume" );
    }

    public function editPerfume( $id ) {

        $perfume = Perfume::find( $id );

        return view( "edit_perfume", [
            "perfume" => $perfume
        ]);
    }

    public function updatePerfume( Request $request ) {
        $perfume = Perfume::find( $request[ "id" ]);
 
    $perfume->name = $request[ "name" ];
    $perfume->type = $request[ "type" ];
    $perfume->price = $request[ "price" ];
 
    $perfume->save();
 
    session()->flash( "success", "Sikeres frissítés" );

    }

    public function deletePerfume( $id ) {

        $perfume = Perfume::find( $id );
        $perfume->delete();

        return redirect( "/perfumes" );
    }

}
