<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use config\admin\Admin;

use function PHPUnit\Framework\throwException;

if(Admin::$login === "" or Admin::$password === "")
{
    throw new Exception("УБЕДИТЕСЬ ЧТО В config/admin.php УКАЗАЛИ ЛОГИН И ПАРОЛЬ АДМИНА");
    Schema::drop();

}

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
            $table->string('login')->unique();
            $table->string('password');
            $table->rememberToken();
        });

        User::create([
            'login' => Admin::$login,
            'password' => Hash::make(Admin::$password),
        ]);



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
