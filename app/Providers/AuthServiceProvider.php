<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => 'App\Policies\AdminPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }

	/**
	 * The model to policy mappings for the application.
	 * 
	 * @param array<class-string, class-string> $policies The model to policy mappings for the application.
	 * @return self
	 */
	public function setPolicies($policies): self {
		$this->policies = $policies;
		return $this;
	}
}
