<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('stocks', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignIdFor(Item::class);
        //     $table->unsignedBigInteger('received_by')->nullable();
        //     $table->string('remarks')->nullable();
        //     $table->unsignedBigInteger('status');
        //     $table->unsignedBigInteger('qty');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}