<?php


namespace smsquery;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Migrations
{
    static function up($id)
    {
        Schema::create($id . '_messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('message');
            $table->boolean('end');
            $table->timestamps();
        });

        Schema::create($id . '_replies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('message_id');
            $table->string('reply');
            $table->json('keywords');
            $table->boolean('end');
            $table->integer('next_message');
            $table->timestamps();
        });

        Schema::create($id . '_datatags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('response_id');
            $table->boolean('raw');
            $table->text('value');
            $table->timestamps();
        });

        Schema::create($id . '_conversations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('respondent_id');
            $table->integer('last_message_id');
            $table->boolean('done');
            $table->timestamps();
        });
    }
}