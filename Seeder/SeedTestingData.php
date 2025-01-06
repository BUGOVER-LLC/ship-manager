<?php

declare(strict_types=1);

namespace Ship\Seeder;

use Ship\Parent\Seeder\Seeder;

class SeedTestingData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Nucleus
     * This is a special seeder which can be called by "nucleus:seed-test" command
     * It is useful for seeding testing data.
     */
    public function run(): void
    {
        // Create Testing data for live tests
    }
}
