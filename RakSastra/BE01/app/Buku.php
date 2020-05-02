<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    public $timestamps = false;
    protected $fillable = [
        'judul', 'stock', 'penulis_id', 'harga', 'genre_id', 'penerbit', 'deskripsi',
        'tebal_halaman', 'waktu_terbit', 'diskon', 'diskon_exp', 'new', 'promo', 'best_seller',
        'terjual', 'kali_rating', 'nilai_rating', 'rating',
    ];
    public static $rules = [
        'id' => ['nullable'],
        'judul' => ['required', 'max:64'],
        'stock' => ['required', 'integer', 'max:20000'],
        'penulis_id' => ['required', 'integer'],
        'harga' => ['required', 'integer', 'max:20000000'],
        'genre_id' => ['required', 'integer'],
        'penerbit' => ['required', 'max:100'],
        'tebal_halaman' => ['max:10000'],
        'waktu_terbit' => ['required', 'date'],
        'diskon' => ['integer', 'max:100'],
        'diskon_exp' => ['date'],
        'terjual' => ['integer', 'max:11'],
        'kali_rating' => ['integer', 'max:5'],
        'nilai_rating' => ['integer', 'max:5'],
    ];
    public static $filters = [
        'judul' => 'capitalize',
        'penerbit' => 'capitalize',
    ];
}
