<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('order_id', 45);
            $table->integer('user_id');
            $table->string('title', 45);
            $table->string('details', 450);
            $table->timestamp('placed_at');
            $table->integer('total_price');
            $table->primary(['user_id', 'order_id']);
            $table->unique('user_id', 'user_id_UNIQUE');
            $table->unique('order_id', 'order_id_UNIQUE');
        });

        Schema::create('review', function (Blueprint $table) {
            $table->integer('user_id')->primary();
            $table->integer('rating');
            $table->string('message', 450);
            $table->unique('user_id', 'review_user_id_UNIQUE');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('name', 45);
            $table->string('password', 45);
            $table->string('email', 45);
            $table->timestamp('created_at');
            $table->unique('user_id', 'user_user_id_UNIQUE');
            $table->unique('email', 'email_UNIQUE');
            $table->foreign('user_id', 'fk_user_order')
                ->references('user_id')->on('order')
                ->onDelete('no action')->onUpdate('no action');
            $table->foreign('user_id', 'fk_user_review1')
                ->references('user_id')->on('review')
                ->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('dish', function (Blueprint $table) {
            $table->integer('dish_id', true);
            $table->integer('restaurant_id');
            $table->string('name', 45);
            $table->string('ingredients', 450);
            $table->string('allergies', 45)->nullable();
            $table->integer('price');
            $table->primary(['dish_id', 'restaurant_id']);
            $table->unique('restaurant_id', 'restaurant_id_UNIQUE');
        });

        Schema::create('restaurant', function (Blueprint $table) {
            $table->integer('restaurant_id', true);
            $table->string('location', 45);
            $table->string('description', 450);
            $table->string('food_type', 45);
            $table->string('tags', 450);
            $table->foreign('restaurant_id', 'fk_restaurant_dish1')
                ->references('restaurant_id')->on('dish')
                ->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('order_has_dish', function (Blueprint $table) {
            $table->integer('order_user_id');
            $table->string('order_order_id', 45);
            $table->integer('dish_dish_id');
            $table->integer('dish_restaurant_id');
            $table->primary(['order_user_id', 'order_order_id', 'dish_dish_id', 'dish_restaurant_id']);
            $table->index(['dish_dish_id', 'dish_restaurant_id'], 'fk_order_has_dish_dish1_idx');
            $table->index(['order_user_id', 'order_order_id'], 'fk_order_has_dish_order1_idx');
            $table->foreign(['order_user_id', 'order_order_id'], 'fk_order_has_dish_order1')
                ->references(['user_id', 'order_id'])->on('order')
                ->onDelete('no action')->onUpdate('no action');
            $table->foreign(['dish_dish_id', 'dish_restaurant_id'], 'fk_order_has_dish_dish1')
                ->references(['dish_id', 'restaurant_id'])->on('dish')
                ->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_has_dish');
        Schema::dropIfExists('restaurant');
        Schema::dropIfExists('dish');
        Schema::dropIfExists('user');
        Schema::dropIfExists('review');
        Schema::dropIfExists('order');
    }
};
