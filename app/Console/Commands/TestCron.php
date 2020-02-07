<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCron extends Command
{
  protected $signature = "test:cron";

  protected $description = "Teste para criar um cron job";

  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    print("This is my cron job running");
  }
}
