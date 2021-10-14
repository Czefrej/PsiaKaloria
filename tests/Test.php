<?php

namespace Tests;

use App\Models\Order;
use Tests\TestCase;

class Test extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_checkAllPackagesHasTheSameStatus()
    {
        $packages = Order::find(12288137)->packages;
        foreach ($packages as $package) {
            $this->assertTrue($package->allPackagesHasTheSameStatus());
        }
    }
}
