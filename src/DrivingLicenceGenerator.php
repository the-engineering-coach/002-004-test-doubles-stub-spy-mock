<?php
declare(strict_types=1);

namespace Braddle;

class DrivingLicenceGenerator
{
    public function generateNumber(LicenceApplicant $applicant)
    {
        if ($applicant->getAge() < 17) {
            throw new InvalidDriverException(
                "Applicant is too young"
            );
        }

        if ($applicant->holdsLicence()) {
            throw new InvalidDriverException(
                "Cannot hold more than one licence"
            );
        }
    }
}
