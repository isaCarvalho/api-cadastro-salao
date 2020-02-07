<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PessoaController;
use App\Model\Pessoa;
use Illuminate\Http\Request;

class InsertCron extends Command
{
  protected $signature = "insert:cron {pessoa*}";

  protected $description = "This cronjob inserts a person on the database";

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $pessoa = $this->argument('pessoa');

    $request = new Request([
      "primeiro_nome" => $pessoa[0],
      "sobrenome" => $pessoa[1],
      "email" => $pessoa[2],
      "senha" => $pessoa[3]
    ]);

    $pessoa = (new PessoaController(new Pessoa()))->insert($request);

    print($pessoa);
  }
}
