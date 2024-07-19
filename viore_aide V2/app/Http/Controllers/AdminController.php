<?php
namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage; 
class AdminController extends Controller
{
    public function create(): View
    {
        return view('admin.loginadmin');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $employe = Employe::where('Email', $credentials['email'])->first();

        if (!$employe) {
            return redirect()->route('logine.create')->with('error', 'Adresse e-mail incorrecte.');
        }

        if (!Hash::check($credentials['password'], $employe->password)) {
            return redirect()->route('logine.create')->with('error', 'Mot de passe incorrect.');
        }

        Auth::guard('employee')->login($employe);

        $request->session()->regenerate();

        if ($employe->Rôle === 'admin') {
            $request->session()->put('Nom', $employe->Nom);
            $request->session()->put('nomrestau', $employe->nomrestau);
            $request->session()->put('Rôle', $employe->Rôle);
            $request->session()->put('pays', $employe->pays);
            return redirect()->route('admin.index');
        } elseif ($employe->Rôle === 'Caissier') {
            $request->session()->put('Nom', $employe->Nom);
            $request->session()->put('Rôle', $employe->Rôle);
            return redirect()->route('admin.caisse');
        } elseif ($employe->Rôle === 'Cuisinier') {
            $request->session()->put('Nom', $employe->Nom);
            $request->session()->put('Rôle', $employe->Rôle);
            return redirect()->route('admin.cuisine');
        } elseif ($employe->Rôle === 'Serveur') {
            $request->session()->put('Nom', $employe->Nom);
            $request->session()->put('Rôle', $employe->Rôle);
            return redirect()->route('menu.create');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('logine.create');
    }
  // Display the profile page
  public function showProfile()
  {
      // Vérifiez si l'utilisateur est authentifié
      if (Auth::guard('employee')->check()) {
          // Récupérez l'ID de l'employé connecté
          $employeId = Auth::guard('employee')->id();
          // Récupérez les détails de l'employé à partir de la base de données en utilisant son ID
          $employe = Employe::findOrFail($employeId);
          // Passez les détails à la vue
          return view('admin.profil', compact('employe'));
      } else {
          // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
          return redirect()->route('logine.create')->with('error', 'Vous devez vous connecter pour accéder à votre profil.');
      }}

  // Display the update profile form
  public function showUpdateProfileForm()
  {
      $employe = Auth::guard('employee')->user();
      $id = $employe->id; // Récupérer l'ID de l'employé
      return view('admin.editprofil', compact('employe', 'id'));
  }
  

  public function updateProfile(Request $request)
  {
      $request->validate([
          'Nom' => 'required|string|max:255',
          'Email' => 'required|email|max:255',
          'nomrestau' => 'required|string|max:255',
          'numero_de_téléphone' => 'required|string|max:20',
          'customerAddress1' => 'required|string|max:255',
          'pays' => 'required|string|max:255',
          'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
  
      try {
          // Get the authenticated employee
          $employe = Auth::guard('employee')->user();
  
          // Update the employee's information
          $employe->Nom = $request->Nom;
          $employe->Email = $request->Email;
          $employe->nomrestau = $request->nomrestau;
          $employe->numero_de_téléphone = $request->numero_de_téléphone;
          $employe->customerAddress1 = $request->customerAddress1;
          $employe->pays = $request->pays;
  
          // If a new photo is uploaded, handle it
          if ($request->hasFile('photo')) {
              // Delete the old photo if it exists
              if ($employe->photo) {
                  Storage::delete('public/' . $employe->photo);
              }
              // Store the new photo
              $photoPath = $request->file('photo')->store('photos', 'public');
              $employe->photo = $photoPath;
          }
  
          $employe->save();
  
          return redirect()->route('admin.profil')->with('success', 'Profil mis à jour avec succès.');
      } catch (\Exception $e) {
          // Log the error or handle it accordingly
          return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du profil.');
      }
  }
  
  
}
