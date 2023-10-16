<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\sekolah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'Munggaran',
            'username'=>'munggaran252',
            'email'=>'riksamunggaran252@gmail.com',
            'password'=> bcrypt('riksa252')
        ]);

        sekolah::create([
            'nama_sekolah'=>'taam nurul falaah ',
            'alamat_sekolah'=>'Dusun Sukasari, RT.32/RW.09, Margamulya, Kec. Kawali, Kabupaten Ciamis, Jawa Barat 46253',
            'telepone_sekolah'=>'0852-2305-4738',
            'email_sekolah'=>'taamnurulfalaah@gmail.com',
            'nama_kepala'=>'Maman Racing',
            'sambutan_kepala'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam blanditiis possimus nobis! Perspiciatis in amet corporis esse tenetur modi delectus.',
            'visi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam blanditiis possimus nobis! Perspiciatis in amet corporis esse tenetur modi delectus.',
            'misi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam blanditiis possimus nobis! Perspiciatis in amet corporis esse tenetur modi delectus.',
            'sejarah'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam blanditiis possimus nobis! Perspiciatis in amet corporis esse tenetur modi delectus.',
            'logo_sekolah'=>'logo.png'
        ]);
    }
}
