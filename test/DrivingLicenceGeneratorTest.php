<?php
declare(strict_types=1);

namespace Braddle\Test;

use Braddle\DrivingLicenceGenerator;
use Braddle\InvalidDriverException;
use PHPUnit\Framework\TestCase;

class DrivingLicenceGeneratorTest extends TestCase
{
    public function testUnderAgeApplicantCannotGenerateLicence()
    {
        $this->expectException(InvalidDriverException::class);
        $this->expectExceptionMessage("Applicant is too young");

        $applicant = new UnderAgeApplicant();

        $generator = new DrivingLicenceGenerator();
        $generator->generateNumber($applicant);
    }

    public function testLicenceHolderCannotGenerateLicence()
    {
        $this->expectException(InvalidDriverException::class);
        $this->expectExceptionMessage("Cannot hold more than one licence");

        $applicant = new LicenceHolderApplicant();

        $generator = new DrivingLicenceGenerator();
        $generator->generateNumber($applicant);
    }

    public function testValidApplicantCanGenerateLicence()
    {
        $applicant = new ValidApplicant();

        $generator = new DrivingLicenceGenerator();
        $generator->generateNumber($applicant);
    }
}
