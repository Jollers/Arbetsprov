<?php

namespace App\Http\Controllers;

use App\Models\Norris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;

class APIController extends Controller
{
    public function getNorris(){

        //Hämtar 5 ramdom skämt från publikt API
        $response = Http::get('http://api.icndb.com/jokes/random/5');

        //Loopar och sparar skämten i en array
        foreach($response->json() as $item){
            $jokeArray = $item;
        }
        //Skickar arrayn till view sidan
        return view('/norris', ['norris' => $jokeArray]);
    }

    public function postNorris(Request $request)

    {
        //sparar requesten till en variabel
        $input = $request->all();

        //skapar en array med hjälp av $key
        $jokes = [];
        foreach($input as $key =>$value){
            $jokes[$key] = [
              'joke' => $value,
            ];
        }
        //Tar bort csrf token från arrayn innan den sparas till databasen
        unset($jokes['_token']);

        //Sparar till databasen
        foreach($jokes as $key =>$joke){
          //  $norrisJoke = new Norris;
          //  $norrisJoke->id = $key
         //   $norrisJoke->joke = $joke;
         //   $norrisJoke->save();
        }

        return response()->json($jokes);
    }
}