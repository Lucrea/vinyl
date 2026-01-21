<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vinyl;

class VinylSeeder extends Seeder
{
    public function run(): void
    {
        Vinyl::insert([
            [
                'titel' => 'Abbey Road',
                'artiest' => 'The Beatles',
                'genre' => 'Rock',
                'prijs' => 29.99,
                'beschrijving' => 'Een klassiek album van The Beatles.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Dark Side of the Moon',
                'artiest' => 'Pink Floyd',
                'genre' => 'Progressive Rock',
                'prijs' => 34.99,
                'beschrijving' => 'Iconisch album met diepe thema’s.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Thriller',
                'artiest' => 'Michael Jackson',
                'genre' => 'Pop',
                'prijs' => 27.50,
                'beschrijving' => 'Het best verkochte album aller tijden.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Back in Black',
                'artiest' => 'AC/DC',
                'genre' => 'Rock',
                'prijs' => 26.99,
                'beschrijving' => 'Een van de grootste hardrock albums ooit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Rumours',
                'artiest' => 'Fleetwood Mac',
                'genre' => 'Rock',
                'prijs' => 28.50,
                'beschrijving' => 'Klassieker uit de jaren 70.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Led Zeppelin IV',
                'artiest' => 'Led Zeppelin',
                'genre' => 'Rock',
                'prijs' => 32.00,
                'beschrijving' => 'Met het iconische "Stairway to Heaven".',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Hotel California',
                'artiest' => 'Eagles',
                'genre' => 'Rock',
                'prijs' => 25.99,
                'beschrijving' => 'Een van de meest populaire albums van de Eagles.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Sgt. Pepper\'s Lonely Hearts Club Band',
                'artiest' => 'The Beatles',
                'genre' => 'Rock',
                'prijs' => 31.50,
                'beschrijving' => 'Innovatief album van The Beatles.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'The Wall',
                'artiest' => 'Pink Floyd',
                'genre' => 'Progressive Rock',
                'prijs' => 33.99,
                'beschrijving' => 'Conceptalbum met een verhaal over isolatie.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Nevermind',
                'artiest' => 'Nirvana',
                'genre' => 'Grunge',
                'prijs' => 29.50,
                'beschrijving' => 'Album dat grunge populair maakte.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Born in the U.S.A.',
                'artiest' => 'Bruce Springsteen',
                'genre' => 'Rock',
                'prijs' => 27.99,
                'beschrijving' => 'Populair album met maatschappelijk thema.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Appetite for Destruction',
                'artiest' => 'Guns N\' Roses',
                'genre' => 'Hard Rock',
                'prijs' => 30.00,
                'beschrijving' => 'Debuutalbum met wereldhits.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
