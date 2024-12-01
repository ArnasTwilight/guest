<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class JwtCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-jwt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns a JWT authorization token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = 'jwt@mail.com';
        $password = 'password';

        $workerQuery = User::query()->where('email', $email)->get()->toArray();

        if (!empty($workerQuery)) {
            echo auth()->attempt(['email' => $email, 'password' => $password]) . PHP_EOL;
            return 0;
        }

        User::create([
            'name' => 'Token',
            'email' => $email,
            'password' => $password,
        ]);

        echo auth()->attempt(['email' => $email, 'password' => $password]) . PHP_EOL;
        return 0;
    }
}
