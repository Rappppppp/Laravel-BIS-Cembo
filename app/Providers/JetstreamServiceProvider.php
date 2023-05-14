<?php

namespace App\Providers;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use App\Models\User;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();
        Jetstream::deleteUsersUsing(DeleteUser::class);
        
        Fortify::authenticateUsing(function (LoginRequest $request) 
        {
            // Barangay ID for Login page
            $user = User::where('barangay_id', $request->auth)->first();

            if ($user &&Hash::check($request->password, $user->password)) 
            {
                return $user;
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
