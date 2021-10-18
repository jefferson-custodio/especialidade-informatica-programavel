<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EspecialidadeCategoria; 

class EspecialidadeCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EspecialidadeCategoria::create([
            'nome'=>'ADRA - AD',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Atividades Recreativas – AR',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Artes e Habilidades Manuais - AM',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Ciência e Saúde – CS',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Atividades Agrícolas e Afins - AA',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Atividades Missionárias e Comunitárias - AM',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Estudo da Natureza – EN',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Atividades Profissionais - AP',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Habilidades Domésticas - HD',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Atividades Recreativas - AR',
        ]);
         EspecialidadeCategoria::create([
            'nome'=>'Mestrados – ME',
        ]);
    }
}
