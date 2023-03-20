<?php
namespace App\Console\Commands;

use App\Http\Controllers\CachingController;
use Illuminate\Console\Command;


class RefreshStatistics extends Command {
	protected $signature = 'reload:statistics';
	protected $description = 'Reload the Statistics via cron';
	public function __construct() { parent::__construct(); }

	public function handle() {
		CachingController::refreshStatistics();
	}
}
