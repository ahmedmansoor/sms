<?php

use App\Models\ItemCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ItemCategory::class);
            $table->string('name');
            $table->string('brand')->nullable();
            $table->unsignedBigInteger('qty');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('status');
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
        Schema::dropIfExists('items');
    }
}