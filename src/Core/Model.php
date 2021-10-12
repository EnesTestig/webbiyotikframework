<?php

namespace Framework\Core;

/**
 * Webbiyotik model class
 *
 * 
 * @package Webbiyotik
 * @license MIT
 * @copyright 2018
 */
abstract class Model
{
    /**
     * Keep database object.
     *
     * @var object $db
     */
    protected $db;

    /**
     * Keep current language id for site
     *
     * @var int $langId
     */
    protected $langId;

    /**
     * Keep database prefix
     *
     * @var string $prefix
     */
    protected $prefix = DB_PREFIX;

    /**
     * Set database object.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Registry::get('Framework\Core\Db');

        /* Set current language id */
        if (is_admin_folder()) {
            $this->langId = CONFIG['general']['site_lang'];
        } else {
            $this->langId = get_lang_id_in_cookie();
        }
    }
}
