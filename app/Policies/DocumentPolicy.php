<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Détermine si l'utilisateur peut voir le document.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Document  $document
     * @return bool
     */
    public function view(User $user, Document $document)
    {
        // Exemple : L'utilisateur peut voir un document s'il en est le propriétaire
        return $user->id === $document->user_id;
    }
}
