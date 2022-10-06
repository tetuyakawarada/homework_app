<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // 教科
            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->cascadeOnUpdate('subjects');

            // 状態
            $table->foreignId('state_id')
                ->constrained('states')
                ->cascadeOnUpdate('states');

            // 必要な時間
            $table->time('required_time');

            // 進んだ時間
            $table->time('elapsed_time');

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
        Schema::dropIfExists('works');
    }
}
