<?php

namespace JWWS\WPPF\Traits;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Var_Dump_R\Var_Dump_R,
    Traits\Var_Export_R\Var_Export_R,
};

// Security::stop_direct_access();

/**
 * Undocumented trait.
 */
trait Variable_Handler {
    use Var_Dump_R;
    use Var_Export_R;
}
