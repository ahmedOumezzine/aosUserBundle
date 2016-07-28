<?php

namespace aos\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class aosUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}