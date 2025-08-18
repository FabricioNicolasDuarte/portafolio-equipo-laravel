<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage; // <-- IMPORTANTE: Añadir esta línea

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Rellenamos los datos validados del formulario
        $user->fill($request->validated());

        // Si el email ha cambiado, reseteamos la verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // --- INICIO: LÓGICA PARA SUBIR LA FOTO DE PERFIL ---
        if ($request->hasFile('photo')) {
            // Opcional: Borra la foto anterior si existe para no acumular basura
            if ($user->photo_path) {
                Storage::disk('public')->delete($user->photo_path);
            }
            // Guarda la nueva foto en 'storage/app/public/fotos-perfil' y obtiene la ruta
            $path = $request->file('photo')->store('fotos-perfil', 'public');
            $user->photo_path = $path;
        }
        // --- FIN DE LA LÓGICA DE LA FOTO ---

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}