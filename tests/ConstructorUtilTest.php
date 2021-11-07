<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Utils\ConstructorUtil;
use PHPUnit\Framework\TestCase;

final class ConstructorUtilTest extends TestCase
{
    public function test1(): void
    {
        $data = ConstructorUtil::toConstructorArray([1, 2, 3], ['r', 'g', 'b']);

        $this->assertEquals([
            'r' => 1,
            'g' => 2,
            'b' => 3,
        ], $data);
    }

    public function test2(): void
    {
        $data = ConstructorUtil::toConstructorArray(['r' => 1, 'g' => 2, 'b' => 3], ['r', 'g', 'b']);

        $this->assertEquals([
            'r' => 1,
            'g' => 2,
            'b' => 3,
        ], $data);
    }
}
