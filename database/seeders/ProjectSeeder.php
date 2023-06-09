<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        Schema::disableForeignKeyConstraints();  //per poter svuotare la tabella devo prima disabilito la key
        Project::truncate(); // svuota la tabella prima di ripopolarla
        Schema::enableForeignKeyConstraints(); //riabilito la key

        for ($i = 0; $i < 10; $i++) {

            $type = Type::inRandomOrder()->first(); //prende un'istanza random all'interno di Type
            $project = new Project();
            $project->name = $faker->sentence(3);
            $project->content = $faker->text(600);
            $project->slug = Str::slug($project->name);
            $project->type_id = $type->id; //associo al project type_id proprio il type id
            $project->save();
        }
    }
}
