<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        // Lunch Boxes Table
        Schema::create('lunch_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->text('ingredients')->nullable();
            $table->text('nutritional_info')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        // Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('author');
            $table->timestamps();
        });

        // Insert default admin user
        DB::table('users')->insert([
            'name' => 'School Lunch Box Admin',
            'email' => 'admin@schoollunchbox.com',
            'password' => Hash::make('SchoolLunchAdmin2024!'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Insert sample lunch boxes
        $lunchBoxes = [
            [
                'name' => 'Classic Lunch Box',
                'description' => 'Traditional balanced lunch with fresh ingredients',
                'price' => 8.99,
                'ingredients' => 'Whole grain bread, grilled chicken, mixed vegetables',
                'nutritional_info' => 'Calories: 450, Protein: 25g, Carbs: 40g',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gourmet Lunch Box',
                'description' => 'Premium lunch with exotic and nutritious ingredients',
                'price' => 12.99,
                'ingredients' => 'Avocado rolls, quinoa, organic chicken, fresh herbs',
                'nutritional_info' => 'Calories: 550, Protein: 35g, Carbs: 45g',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('lunch_boxes')->insert($lunchBoxes);

        // Insert sample testimonials
        $testimonials = [
            [
                'content' => 'The lunch boxes are fresh, delicious, and always delivered on time. My kids love the variety!',
                'author' => 'Sarah Johnson',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'content' => 'As a busy parent, School Lunch Boxes has been a game-changer. Nutritious meals with zero hassle!',
                'author' => 'Michael Rodriguez',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('testimonials')->insert($testimonials);
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('lunch_boxes');
        Schema::dropIfExists('testimonials');
    }
};