<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kolom yang disembunyikan saat serialisasi (misalnya JSON response)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast untuk tipe data
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi many-to-many ke tabel books (bookmark)
     * Menggunakan tabel pivot book_user
     */
    public function bookmarks()
    {
        return $this->belongsToMany(Book::class, 'book_user', 'user_id', 'book_id')->withTimestamps();
    }

    /**
     * Relasi one-to-many ke tabel notes (catatan pribadi)
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Relasi one-to-many ke tabel recommendations (rekomendasi buku)
     */
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
