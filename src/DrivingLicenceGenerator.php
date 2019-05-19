<?php
declare(strict_types=1);

namespace Braddle;

use Psr\Log\LoggerInterface;

class DrivingLicenceGenerator
{

    private $logger;


    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function generateNumber(LicenceApplicant $applicant)
    {
        if ($applicant->getAge() < 17) {
            $this->logger->notice("Under age application user: " . $applicant->getId());
            throw new InvalidDriverException(
                "Applicant is too young"
            );
        }

        if ($applicant->holdsLicence()) {
            $this->logger->notice("duplicate application user: " . $applicant->getId());
            throw new InvalidDriverException(
                "Cannot hold more than one licence"
            );
        }
    }
}
