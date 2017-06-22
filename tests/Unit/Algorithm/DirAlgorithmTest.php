<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2017 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Test\Unit\Algorithm;

use Base64Url\Base64Url;
use Jose\Component\Encryption\Algorithm\KeyEncryption\Dir;
use Jose\Object\JWK;
use Jose\Test\TestCase;

/**
 * final class DirAlgorithmTest.
 *
 * @group Unit
 */
final class DirAlgorithmTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Wrong key type.
     */
    public function testInvalidKey()
    {
        $key = new JWK([
            'kty' => 'EC',
        ]);

        $dir = new Dir();

        $dir->getCEK($key);
    }

    public function testValidCEK()
    {
        $key = new JWK([
            'kty' => 'oct',
            'k'   => Base64Url::encode('ABCD'),
        ]);

        $dir = new Dir();

        $this->assertEquals('ABCD', $dir->getCEK($key));
    }
}
