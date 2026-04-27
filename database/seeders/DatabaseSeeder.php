<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => '1',
            'password' => bcrypt('test@example.com'),
        ]);

        Kategori::create([
            'nama_kategori' => 'Kategori 1',
        ]);

        Berita::create([
            'judul_berita' => 'Lorem Ipsum',
            'isi_berita' => 'Lorem Ipsum',
            'gambar_berita' => 'Jordan.jpg',
            'id_kategori' => '1',
        ]);

        Page::create([
            'judul_page' => 'Lorem Ipsum',
            'isi_page' => 'Lorem Ipsum',
            'status_page' => 1,
        ]);

        $cloudStorage = Menu::create([
            'nama_menu' => 'Cloud Storage',
            'jenis_menu' => 'url',
            'url_menu' => '#',
            'target_menu' => '_self',
            'urutan_menu' => 3,
        ]);

        Menu::create([
            'nama_menu' => 'GCP',
            'jenis_menu' => 'url',
            'url_menu' => 'https://cloud.google.com/',
            'target_menu' => '_blank',
            'urutan_menu' => 1,
            'parent_menu' => $cloudStorage->id_menu,
        ]);

        Menu::create([
            'nama_menu' => 'AWS',
            'jenis_menu' => 'url',
            'url_menu' => 'https://aws.amazon.com/',
            'target_menu' => '_self',
            'urutan_menu' => 2,
            'parent_menu' => $cloudStorage->id_menu,
        ]);

        Menu::create([
            'nama_menu' => 'test',
            'jenis_menu' => 'url',
            'url_menu' => 'https://cloud.google.com/',
            'target_menu' => '_blank',
            'urutan_menu' => 1,
            'parent_menu' => null,
        ]);
    }
}
