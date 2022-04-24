Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Price');
            $table->string('description');
            $table->unsignedInteger('categoriesID');
            $table->unsignedInteger('reviewID');
            $table->timestamps();
            $table->foreign('categoriesID')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('reviewID')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade');
        });
        Schema::create('categories',function(Blueprint $table){
            $table->id();
            $table->string('name');
        });
        Schema::create('reviews',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->unsignedInteger('accountID');
            $table->string('comment');
            $table->integer('star');
        });