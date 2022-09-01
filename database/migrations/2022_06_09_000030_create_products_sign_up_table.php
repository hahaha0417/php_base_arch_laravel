<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    const TABLE = "products_sign_up";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        // --------------------------------------------------------- 
        //  不使用自動產生的字串 
        // --------------------------------------------------------- 
        Schema::create(self::TABLE, function (Blueprint $table) {
            // ----------------------------- 
            //  1 - 5
            // ----------------------------- 
            // 識別項
            $table->id()
            ->comment('識別項')
            ;
            // 產品id
            $table->unsignedBigInteger('products_id')
                ->comment('產品id')
            ;
          
            // 名稱
            $table->string('name')
                ->comment('名稱')
            ;
            // 信箱
            $table->string('email')
                ->comment('信箱')
            ;
            // 電話
            $table->string('phone')
                ->comment('電話')
            ;
            // ----------------------------- 
            //  6 - 10
            // ----------------------------- 
            // 項目
            $table->string('item')
                ->comment('項目')
            ;
            // 時戳
            $table->timestamps()
            ;
            
            
            // ----------------------------- 
            //  6 - 10
            // ----------------------------- 

            // ----------------------------- 
            //  外鍵
            // ----------------------------- 
            $table->foreign('products_id')
                ->references('id')
                ->on('products')
            ;

            
        });

        // --------------------------------------------------------- 
        //  
        // --------------------------------------------------------- 


        $table = self::TABLE;
        DB::statement("ALTER TABLE `{$table}` comment '產品 - 報名'");
        // --------------------------------------------------------- 
        //  
        // --------------------------------------------------------- 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
};
