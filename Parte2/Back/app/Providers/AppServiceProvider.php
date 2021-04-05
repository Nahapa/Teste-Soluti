<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Utilizar padrão tamanho de string 191 para bancos de dados com versão antiga, MySQL < 5.7.7 ou MariaDB < 10.2.2 
        Schema::defaultStringLength(191);
    }
}
