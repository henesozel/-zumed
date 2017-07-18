<?php

namespace App\Providers;
use Form;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name','placeholder','value'=>null,'attributes'=>[]]);
        Form::component('bsPassword', 'components.form.password', ['name','value'=>null, 'attributes'=>[] ]);
        Form::component('bsEmail', 'components.form.email', ['name','placeholder','value'=>null,'attributes'=>[]]);
        Form::component('bsTextArea', 'components.form.textarea', ['name','placeholder','value'=>null, 'attributes'=>[] ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
