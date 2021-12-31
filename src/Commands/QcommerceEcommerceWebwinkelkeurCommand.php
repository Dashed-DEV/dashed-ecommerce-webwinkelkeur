<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Commands;

use Illuminate\Console\Command;

class QcommerceEcommerceWebwinkelkeurCommand extends Command
{
    public $signature = 'qcommerce-ecommerce-webwinkelkeur';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
