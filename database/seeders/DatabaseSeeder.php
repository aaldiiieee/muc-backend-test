<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $employee1 = Employee::create([
            'id' => 1,
            'name' => 'Nafsirudin',
            'position' => 'Developer'
        ]);
        
        $employee2 = Employee::create([
            'id' => 2,
            'name' => 'Putri',
            'position' => 'Designer'
        ]);
        
        Task::create([
            'id' => 1,
            'employees_id' => 1,
            'task_name' => 'Mengerjakan API',
            'due_date' => '2024-09-15'
        ]);
        
        Task::create([
            'id' => 2,
            'employees_id' => 2,
            'task_name' => 'Membuat desain UI halaman create',
            'due_date' => '2024-09-20'
        ]);
        
        Task::create([
            'id' => 3,
            'employees_id' => 1,
            'task_name' => 'Slicing HTML',
            'due_date' => '2024-08-02'
        ]);
        
        Task::create([
            'id' => 4,
            'employees_id' => 2,
            'task_name' => 'Membuat icon',
            'due_date' => '2024-10-03'
        ]);
        
        Task::create([
            'id' => 5,
            'employees_id' => 2,
            'task_name' => 'Mengubah ukuran gambar',
            'due_date' => '2024-10-03'
        ]);
    }
}