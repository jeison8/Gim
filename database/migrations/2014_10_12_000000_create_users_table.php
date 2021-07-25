 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email');
            $table->string('document')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('img')->nullable();
            $table->integer('is_admin')->nullable();
            $table->integer('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
