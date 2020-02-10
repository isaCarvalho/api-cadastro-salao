<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ServicoController;
use App\Model\Servico;
use Illuminate\Http\Request;

class PriceUpdateCron extends Command
{
  protected $signature = "price:update";

  protected $description = "Updates the price of a service when the billing day is today";

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $serv = new ServicoController(new Servico());

    echo $serv->updatePrice();
  }
}
