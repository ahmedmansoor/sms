<?php

use App\Models\Item;
use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class);
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('requested_by');
            $table->unsignedBigInteger('authorised_by')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->foreignIdFor(Section::class);
            $table->string('remarks');
            $table->unsignedBigInteger('status');
            $table->dateTime('authorised_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}