<?php
// app/Policies/ContratPolicy.php

namespace App\Policies;

use App\Models\Contrat;
use App\Models\User;

class ContratPolicy
{
    public function view(User $user, Contrat $contrat): bool
    {
        return $contrat->users()->where('users.id', $user->id)->exists();
    }

    public function update(User $user, Contrat $contrat): bool
    {
        return $contrat->users()
            ->where('users.id', $user->id)
            ->wherePivotIn('role', ['proprietaire', 'co_titulaire'])
            ->exists();
    }

    public function delete(User $user, Contrat $contrat): bool
    {
        return $contrat->users()
            ->where('users.id', $user->id)
            ->wherePivot('role', 'proprietaire')
            ->exists();
    }
}