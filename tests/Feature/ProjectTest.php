<?php

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Membuat akun admin dan non-admin
    $this->admin = User::create([
        'name' => 'admin',
        'email' => 'admin123@gmail.com',
        'password' => bcrypt('admin123'),
        'usertype' => 'admin',
    ]);

    $this->nonAdmin = User::create([
        'name' => 'user',
        'email' => 'user123@gmail.com',
        'password' => bcrypt('user123'),
        'usertype' => 'user',
    ]);
});

test('admin dapat mengakses halaman proyek', function () {
    // Login sebagai admin
    $this->actingAs($this->admin);

    $response = $this->get(route('projects.index'));

    $response->assertStatus(200);
    $response->assertViewHas('projects');
});

test('admin dapat membuat proyek', function () {
    // Login sebagai admin
    $this->actingAs($this->admin);

    // Menambahkan status yang valid
    $data = [
        'customer_name' => 'John Doe',
        'laptop_brand' => 'Dell',
        'issue_description' => 'Laptop tidak menyala',
        'total_price' => 5000000,
        'status' => 'not_started', // Tambahkan status yang valid
    ];

    // Melakukan request POST untuk membuat proyek baru
    $response = $this->post(route('projects.store'), $data);

    // Memastikan redireksi ke halaman index proyek setelah berhasil
    $response->assertRedirect(route('projects.index'));

    // Memastikan ada session success
    $response->assertSessionHas('success', 'Proyek berhasil dibuat.');

    // Memastikan proyek ada di database
    $this->assertDatabaseHas('projects', $data);
});



test('admin dapat menghapus proyek', function () {
    // Login sebagai admin
    $this->actingAs($this->admin);

    // Membuat proyek dengan status yang valid
    $project = Project::factory()->create([
        'status' => 'not_started',  // Pastikan status yang valid dimasukkan
    ]);

    // Menghapus proyek
    $response = $this->delete(route('projects.destroy', $project->id));

    // Memastikan proyek dihapus dengan benar
    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('success', 'Proyek berhasil dihapus.');

    // Memastikan proyek sudah dihapus dari database
    $this->assertDatabaseMissing('projects', [
        'id' => $project->id,
    ]);
});



test('non-admin dapat mengakses halaman proyek', function () {
    // Login sebagai non-admin
    $this->actingAs($this->nonAdmin);

    $response = $this->get(route('projects.index'));

    $response->assertStatus(200); // Memastikan status OK
    $response->assertViewHas('projects'); // Memastikan ada data proyek yang dikirim ke view
});

test('non-admin tidak dapat melihat tombol aksi', function () {
    // Login sebagai non-admin
    $this->actingAs($this->nonAdmin);

    // Mengunjungi halaman proyek
    $response = $this->get(route('projects.index'));

    // Memastikan tombol aksi (Edit dan Delete) tidak ada untuk non-admin
    $response->assertDontSee('Edit');
    $response->assertDontSee('Delete');
});
