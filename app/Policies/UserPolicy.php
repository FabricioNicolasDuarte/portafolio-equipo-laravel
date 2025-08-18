<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede ver la lista de perfiles.
     *
     * @param  \App\Models\User  $usuarioActual
     * @return bool
     */
    public function viewAny(User $usuarioActual): bool
    {
        // Solo los administradores pueden ver la lista.
        return $usuarioActual->is_admin;
    }

    /**
     * Determina si el usuario puede actualizar un perfil específico.
     *
     * @param  \App\Models\User  $usuarioActual El usuario que está logueado y quiere hacer la acción.
     * @param  \App\Models\User  $perfil El perfil que se intenta modificar.
     * @return bool
     */
    public function update(User $usuarioActual, User $perfil): bool
    {
        // La acción se permite si:
        // 1. El usuario logueado es administrador.
        // O
        // 2. El ID del usuario logueado es el mismo que el del perfil que quiere editar.
        return $usuarioActual->is_admin || $usuarioActual->id === $perfil->id;
    }
}