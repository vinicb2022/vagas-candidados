<?php

use Illuminate\Database\Seeder;
use App\Models\VagasModel;


class VagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(VagasModel $vaga)
    {
        $vaga->create([
            'nome' => 'Desenvolvedor PHP Pleno',
            'descricao' => 'Estamos buscando pessoas talentosas para fazer parte de nosso time de Produto. Você atuará no desenvolvimento de plataformas utilizadas pelas maiores marcas do varejo da América Latina',
            'remuneracao' => 4000,
            'status' => 1,
            'tipo_id' => 2,
            'local_id' => 1,
        ]);
        $vaga->create([
            'nome' => 'Desenvolvedor PHP/Laravel Sênior',
            'descricao' => 'Buscamos Dev. PHP para atuar projeto em nosso cliente.',
            'remuneracao' => 10000,
            'status' => 1,
            'tipo_id' => 1,
            'local_id' => 2
        ]);
        $vaga->create([
            'nome' => 'Analista de Testes',
            'descricao' => 'Desenvolver e executar testes automatizados',
            'remuneracao' => 3500,
            'status' => 1,
            'tipo_id' => 2,
            'local_id' => 3
        ]);
        $vaga->create([
            'nome' => 'Gerente de Projeto',
            'descricao' => ' gerente de projeto, deve ter sólida experiência em Gerenciamento de Escopo, Custos, Cronograma, Riscos, recursos de projetos, comunicação, e Relacionamento com stakeholders.',
            'remuneracao' => 6300,
            'status' => 1,
            'tipo_id' => 3,
            'local_id' => 1
        ]);
        $vaga->create([
            'nome' => 'Analista de Dados',
            'descricao' => 'O profissional irá atuar na equipe de BizDev Cloud, tendo como principal missão ser referência técnica nos projetos dos produtos TOTVS Cloud.',
            'remuneracao' => 4600,
            'status' => 1,
            'tipo_id' => 2,
            'local_id' => 2
        ]);
        $vaga->create([
            'nome' => 'Desenvolvedor JAVA',
            'descricao' => 'Criar aplicações de software seguindo diretivas e padrões;',
            'remuneracao' => 7800,
            'status' => 1,
            'tipo_id' => 2,
            'local_id' => 2
        ]);
        $vaga->create([
            'nome' => 'Desenvolvedor Angular',
            'descricao' => 'Pessoa Desenvolvedora PHP PL para atuar em um projeto de uma empresa especializada em serviços financeiros. Você realizará constantemente a construção e melhoria de um produto, portanto viverá na prática todas as etapas do ciclo de desenvolvimento de um novo produto. ',
            'remuneracao' => 6200,
            'status' => 1,
            'tipo_id' => 2,
            'local_id' => 2
        ]);
    }
}
