<?php
/**
 * All right reserved by Perfect Team
 * Author class: Forbs
 * Contacts: http://mcperfects.com/
 */

namespace Engine\Core\Navigation;


class Navigation
{

    protected $di;
    protected $pages = [];

    public function __construct($di)
    {
        $this->di = $di;
        $this->pages = require_once(ROOT_DIR .'/app/navigation.php');
    }

    /**
     * @param array $pages
     */
    public function setNavigation(array $pages)
    {
        if (is_array($pages) && sizeof($pages)) {
            $this->pages = array_merge($this->pages, $pages);
        }

        return;
    }

    /**
     * @return array|mixed
     */
    public function make()
    {
        $pages = $this->pages;

        usort($pages, function($a, $b){
            return ($a['priority'] > $b['priority']);
        });

        return $pages;
    }
}