<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PerfilUsuarioController extends Controller
{
    use AuthorizesRequests;

    /**
     * Muestra la lista de todos los usuarios (el equipo).
     */
    public function listar()
    {
        $this->authorize('viewAny', User::class);

        $usuarios = User::all();
        return view('usuarios.listar', ['usuarios' => $usuarios]);
    }

    /**
     * Muestra el perfil de un solo usuario.
     */
    public function ver(User $usuario)
    {
        return view('usuarios.ver', ['usuario' => $usuario]);
    }

    // --- MÉTODOS DE ADMINISTRACIÓN ---

    /**
     * Muestra el formulario para que un admin edite un perfil.
     */
    public function editar(User $usuario)
    {
        // Usamos la Policy para asegurar que solo un admin pueda llegar aquí
        $this->authorize('update', $usuario);
        return view('admin.usuarios.editar', ['usuario' => $usuario]);
    }

    /**
     * Actualiza el perfil de un usuario desde el panel de admin.
     */
    public function actualizar(Request $request, User $usuario)
    {
        // Usamos la Policy de nuevo para la seguridad
        $this->authorize('update', $usuario);

        // Validamos los datos que vienen del formulario
        $datosValidados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($usuario->id)],
            'career' => ['nullable', 'string', 'max:255'],
            'university' => ['nullable', 'string', 'max:255'],
            'about_me' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Lógica para subir la foto (igual que en ProfileController)
        if ($request->hasFile('photo')) {
            if ($usuario->photo_path) {
                Storage::disk('public')->delete($usuario->photo_path);
            }
            $path = $request->file('photo')->store('fotos-perfil', 'public');
            $datosValidados['photo_path'] = $path;
        }

        // Actualizamos al usuario con los datos validados
        $usuario->update($datosValidados);

        // Redirigimos de vuelta al perfil del usuario con un mensaje de éxito
        return redirect()->route('equipo.ver', $usuario)->with('status', '¡Perfil actualizado con éxito!');
    }

    /**
     * Elimina el perfil de un usuario desde el panel de admin.
     */
    public function eliminar(User $usuario)
    {
        // Usamos la Policy para asegurar que solo un admin autorizado pueda eliminar
        $this->authorize('delete', $usuario);

        // Opcional: Si el usuario tiene una foto, la borramos del almacenamiento
        if ($usuario->photo_path) {
            Storage::disk('public')->delete($usuario->photo_path);
        }

        // Eliminamos el usuario de la base de datos
        $usuario->delete();

        // Redirigimos a la lista del equipo con un mensaje de éxito
        return redirect()->route('equipo.listar')->with('status', '¡Usuario eliminado con éxito!');
    }
}