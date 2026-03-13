<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->text('description');
            $table->string('food_type');
            $table->string('tags')->nullable();
            $table->timestamps();
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->text('ingredients');
            $table->text('allergies')->nullable();
            $table->integer('price');

            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('details')->nullable();
            $table->timestamp('placed_at')->nullable();
            $table->integer('total_price');

            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('rating');
            $table->text('message');

            $table->timestamps();
        });

        Schema::create('dish_order', function (Blueprint $table) {
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('dish_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['order_id', 'dish_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dish_order');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('restaurants');
    }
};