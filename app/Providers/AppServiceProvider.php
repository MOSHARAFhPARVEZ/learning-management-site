<?php

namespace App\Providers;

use App\Models\Smtpsetting;
use Config;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
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
        // if (\Schema::hasTable('smtpsettings')) {

        //     $smtp = Smtpsetting::first();
        //     if ($smtp) {
        //         $data = [
        //             'driver' => $smtp->mailer,
        //             'host' => $smtp->host,
        //             'port' => $smtp->port,
        //             'username' => $smtp->username,
        //             'password' => $smtp->password,
        //             'encryption' => $smtp->encryption,
        //             'encryption' => [
        //                 'address' =>$smtp->from_address,
        //             ]

        //             ];

        //         Config::set('mail', $data);

        //     } //end if
        // } //end if
    }
}
