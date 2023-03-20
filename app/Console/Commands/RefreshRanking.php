<?php
namespace App\Console\Commands;

use App\Http\Controllers\CachingController;
use Illuminate\Console\Command;

class RefreshRanking extends Command {
	protected $signature = 'refresh:ranking';
	protected $description = 'Reload the ranking via cron';
	public function __construct() { parent::__construct(); }

	public function handle() {
        CachingController::refreshRanking();
	}
}
