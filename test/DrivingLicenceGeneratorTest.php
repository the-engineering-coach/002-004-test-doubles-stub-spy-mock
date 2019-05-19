<?php
declare(strict_types=1);

namespace Braddle\Test;

use Braddle\DrivingLicenceGenerator;
use Braddle\InvalidDriverException;
use PHPUnit\Framework\TestCase;

class DrivingLicenceGeneratorTest extends TestCase
{

    private $logger;

    protected function setUp()
    {
        parent::setUp();

        $this->logger = new SpyLogger();

        $this->generator = new DrivingLicenceGenerator($this->logger);
    }

    public function testUnderAgeApplicantCannotGenerateLicence()
    {
        $this->expectException(InvalidDriverException::class);
        $this->expectExceptionMessage("Applicant is too young");

        $applicant = new UnderAgeApplicant();

        $this->generator->generateNumber($applicant);
    }

    public function testUnderAgeApplicationsAreLogged()
    {
        $applicant = new UnderAgeApplicant();

        try {
            $this->generator->generateNumber($applicant);
        } catch (InvalidDriverException $e) {

        }

        $this->assertEquals(1, $this->logger->noticeCalledCount);
        $this->assertEquals("Under age application user: 123", $this->logger->noticeLastMessage);
    }

    public function testLicenceHolderCannotGenerateLicence()
    {
        $this->expectException(InvalidDriverException::class);
        $this->expectExceptionMessage("Cannot hold more than one licence");

        $applicant = new LicenceHolderApplicant();

        $this->generator->generateNumber($applicant);
    }

    public function testLicenceHolderAttemtsLogged()
    {
        $applicant = new LicenceHolderApplicant();

        try {
            $this->generator->generateNumber($applicant);
        } catch (InvalidDriverException $e) {

        }

        $this->assertEquals(1, $this->logger->noticeCalledCount);
        $this->assertEquals("duplicate application user: 123", $this->logger->noticeLastMessage);
    }

//    public function testValidApplicantCanGenerateLicence()
//    {
//        $applicant = new ValidApplicant();
//
//        $generator = new DrivingLicenceGenerator();
//        $generator->generateNumber($applicant);
//    }
}
