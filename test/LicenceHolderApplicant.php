<?php
declare(strict_types=1);

namespace Braddle\Test;

use Braddle\LicenceApplicant;

class LicenceHolderApplicant implements LicenceApplicant
{
    public function getAge(): int
    {
        return 18;
    }

    public function holdsLicence(): bool
    {
        return true;
    }
}
