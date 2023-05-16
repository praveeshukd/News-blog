<?php

namespace App\Services;

/**
 * Summary of Newsletter
 */
interface Newsletter
{
/**
 * Summary of subscribe
 * @param string $email
 * @param string|null $list
 * @return void
 */
public function subscribe(string $email, string $list = null);
}