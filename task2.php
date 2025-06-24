<!-- Short Description -->

=> User can borrow many books, and book can be borrowed by many users → Many-to-Many relation.

=> Borrow info needs: borrow_date, return_date, status

 <!-- Tables -->
1) users  default

2) books  book_details_table

3) book_user pivot table

<!-- book_user table fields -->
=> user_id, book_id (foreign keys)

=> borrow_date, return_date, status (borrowed, returned, overdue)

<!-- for Make relationship in two tables (users and books) -->
Use withPivot() to access extra fields in the pivot table.



<!-- Create Fisrt table users Details -->

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});

<!-- Create second table Book Details -->

Schema::create('books', function (Blueprint $table) {
    $table->id();
    $table->string('book_name');
    $table->string('books_author_name');
    $table->boolean('status')->default(1)->comment('1 = Available, 0 = Not Available');
    $table->timestamps();
});

<!-- Create Third table for make relation between users and books tables -->

Schema::create('book_user',function(Blueprint $table){
    $table->id();
    $table->unsignedBigInteger('book_id');
    $table->unsignedBigInteger('user_id');
    $table->foreign('book_id')->references('id')->on('books');
    $table->foreign('user_id')->references('id')->on('users');
    $table->date('borrow_date');
    $table->date('return_date')->nullable();
    $table->enum('status', ['borrowed', 'returned', 'overdue']);
    $table->timestamps();
});

<!-- This code is add on Users.php which is locate in App\Models\Users.php -->
public function books() {
    return $this->belongsToMany(Book::class)
            ->withPivot('borrow_date', 'return_date', 'status')
            ->withTimestamps();
}

<!-- This code is add on Books.php which is locate in App\Models\Books.php -->
public function users() {
    return $this->belongsToMany(User::class)
                ->withPivot('borrow_date', 'return_date', 'status')
                ->withTimestamps();
}



