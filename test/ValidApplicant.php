<?php
declare(strict_types=1);

namespace Braddle\Test;

use Braddle\LicenceApplicant;

class ValidApplicant implements LicenceApplicant
{
    public function getAge(): int
    {
        return 21;
    }

    public function holdsLicence(): bool
    {
        return false;
    }

    public function getId(): int
    {
        return 123;
    }
}
