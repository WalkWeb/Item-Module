<?php

declare(strict_types=1);

namespace Item\Translator;

interface TranslatorInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function trans(string $string): string;
}
