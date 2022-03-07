<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class ChangeStatusUser extends Command
{
    protected $signature = 'command:status-user';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = Role::where('name', 'user')->first()->users;
        foreach ($users as $user) {
            if ($user->updated_at < Carbon::now()->subDays(30)) {
                $user->update(['status' => '1']);
            }
        }
    }
}
