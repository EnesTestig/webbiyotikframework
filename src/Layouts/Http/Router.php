<?php

namespace Framework\Layouts\Http;

interface Router
{
    /**
     * Start router.
     *
     * @param  boolean $type
     * @return void
     */
    public function __construct(Bool $type = false);
}
