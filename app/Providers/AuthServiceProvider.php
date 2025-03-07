<?php

namespace App\Providers;

use App\Models\Document;
use App\Policies\DocumentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les politiques d'autorisation pour l'application.
     *
     * @var array
     */
    protected $policies = [
        Document::class => DocumentPolicy::class,
    ];

    /**
     * Enregistrez toute la logique d'autorisation pour l'application.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
