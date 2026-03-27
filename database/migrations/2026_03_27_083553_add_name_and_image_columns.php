<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('image')->nullable()->after('description');
            $table->decimal('rating', 2, 1)->default(0)->after('image');
            $table->integer('delivery_minutes')->nullable()->after('rating');
            $table->string('delivery_fee')->nullable()->after('delivery_minutes');
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('image')->nullable()->after('description');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                ->nullable()
                ->after('user_id')
                ->constrained()
                ->cascadeOnDelete();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('total_price');
            $table->foreignId('restaurant_id')
                ->nullable()
                ->after('user_id')
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('restaurant_id');
            $table->dropColumn('status');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropConstrainedForeignId('restaurant_id');
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn(['description', 'image']);
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn(['name', 'image', 'rating', 'delivery_minutes', 'delivery_fee']);
        });
    }
};
