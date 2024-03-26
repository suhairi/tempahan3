<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patterns = ['/Ahmad/', '/Mohd/', '/Mohd /', '/Muhammad/', '/Mohd./', '/Mohamad/', '/Abdul/', '/Bin/', '/bin/', '/Abu/', '/Nor/'];

        $driver = Driver::create(['name'  => strtoupper('Mohd Zuhdi Bin Jamaludin'), 'phone' => '0194455237', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '3703']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Zakaria Ahmad'), 'phone' => '0103933172', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '2750']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Ahmad Fahmi Ibrahim'), 'phone' => '0194562510', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '2760']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd. Aizam Azmi'), 'phone' => '0125784960', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '2969']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohamad Zakaria Yop'), 'phone' => '0194269905', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '4015']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Abu Seman Ishak'), 'phone' => '01164452398', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3301']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Hamzah Ishak'), 'phone' => '0133461134', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3299']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Zulhanim Hashim'), 'phone' => '0175055186', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3670']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Muhammad Hafdzi Husni'), 'phone' => '01126862742', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3730']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Suhardi Bin Idrus'), 'phone' => '0166784734', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3724']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Andalan Azali'), 'phone' => '0125131900', 'bahagian_id' => 7, 'type' => 'Dalam', 'staffid' => '2758']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohamad Akmal Zikri'), 'phone' => '0175483136', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3733']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Muhammad Akmal Hassan'), 'phone' => '0174180384', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3738']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd Najme Shahbani'), 'phone' => '0124766464', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3347']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd. Azwat Mohd. Azlan'), 'phone' => '0136682357', 'bahagian_id' => 7, 'type' => 'VIP', 'staffid' => '3311']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Abdul Quyyum Syafiq Hasnan'), 'phone' => '0137797204', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3741']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd Shahrul Akmal Mohd Latiff'), 'phone' => '0195022407', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '4013']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Rozainizam Bin Azmi'), 'phone' => '0124131207', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '2566']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Hasrull Nizam Bin Ahmad'), 'phone' => '01136161264', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3736']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd Nor Hafifi Bin Hakir @ Hakim'), 'phone' => '0195430729', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '3726']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Nazrin bin Rus'), 'phone' => '0184041083', 'bahagian_id' => 7, 'type' => 'Bebas', 'staffid' => '4029']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd Hazril Azuan'), 'phone' => '0195001013', 'bahagian_id' => 7, 'type' => 'Dalam', 'staffid' => '3737']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Yusof Azam Mohd Muhsin'), 'phone' => '0194561121', 'bahagian_id' => 7, 'type' => 'Dalam', 'staffid' => '2968']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Mohd Nazri Bin Mat'), 'phone' => '0166756300', 'bahagian_id' => 7, 'type' => 'Dalam', 'staffid' => '3348']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Zulkeflee Zainol Abidin'), 'phone' => '0105699727', 'bahagian_id' => 7, 'type' => 'Sakit', 'staffid' => '2970']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();

        $driver = Driver::create(['name'  => strtoupper('Azahar Ibrahim'), 'phone' => '0195570066', 'bahagian_id' => 7, 'type' => 'Sakit', 'staffid' => '3319']);
        $driver->slug = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $driver->name))));
        $driver->slug = strtolower($driver->slug[0]);
        $driver->save();
    }
}
