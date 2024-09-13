<?php

namespace ChrisSantiago82\DhlParcel\Tests;

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use Mvdnbrk\DhlParcel\Client;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        try {
            (Dotenv::createUnsafeImmutable(__DIR__.'/..'))->load();
        } catch (InvalidPathException $e) {
            //
        } catch (InvalidFileException $e) {
            dd('The environment file is invalid');
        }

        $this->client = (new Client)->setUserId(
            getenv('DHLPARCEL_ID')
        )->setApiKey(
            getenv('DHLPARCEL_SECRET')
        );

        parent::setUp();
    }
}
