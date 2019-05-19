<?php

namespace Braddle;

interface LicenceApplicant
{
    public function getAge() : int;
    public function holdsLicence() : bool;
    public function getId(): int;
}
