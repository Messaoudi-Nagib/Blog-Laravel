<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
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
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => "required|min:1|max:191",
            "lastname" => "required|min:1|max:191",
            "email" => "required|min:1|max:191|email|unique:users", //unique sur la table "user"
            "password" => "required|min:8|confirmed",

        ]);
        //Le role par défault est "user".
        $role = Role::where("name", "=", "user")->first();


        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password), //on hache le password pour qu'il soit masqué dans la bdd.

            'role_id' => $role->id
        ]);

        return redirect(route("users.login"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /*
 * @param $request
 */

    public function login(): View
    {
        return view('users.login');

    }

    /*Verifie les données soumises
     *
     * @param $request
     * @param RedirectResponse
     */

    public function doLogin(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = User::where("email", "=", $request->email)->first();

        if ($user) {
            //on a trouvé un utilisateur
            if (Hash::check($password, $user->password)) {
                //Bon mot de passe !


                //on ajoute l'instance du User dans la Session :
                Session::put("user", $user);



                return redirect("/");
            }

            //mauvaise adresse email
            return back()->withErrors("Mail/ Mot de passe invalide ");


        }
    }

    public function logout(){
        // Supprime l'utilisateur de la session
        Session::forget("user");

        // Redirige l'utilisateur sur le login
        return redirect(route("users.login"));
    }

}
