<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('foto')->nullable();

            $table->string('dni');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('cargo');
            $table->string('estado');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user->nombre = 'Admin';
        $user->apellido = 'Admin';
        $user->dni = '12345678';
        $user->telefono = '987654321';
        $user->direccion = 'None';
        $user->email = 'Admin@laravel.com';
        $user->password = Hash::make('12345678');
        $user->cargo = 'Administrador';
        $user->estado = 'Activo';
        $user->Save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
