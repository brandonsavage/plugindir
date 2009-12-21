<?php
/**
 * Search controller
 *
 * @package    PluginDir
 * @subpackage controllers
 * @author     l.m.orchard <lorchard@mozilla.com>
 */
class Search_Controller extends Local_Controller {

    /**
     * Home page action
     */
    function index()
    {

    }

    /**
     *
     */
    function results()
    {
        $release = ORM::factory('pluginrelease');

        if ($p_id = $this->input->get('platform_id')) {
            $release->where('platform_id', $p_id);
        }
        if ($os_id = $this->input->get('os_id')) {
            $release->where('os_id', $os_id);
        }

        $rows =  $release->find_all();

        $releases = array();
        foreach ($rows as $release) {
            $releases[] = $release->as_array();
        }
        $this->view->releases = $releases;

    }

    /**
     *
     */
    function api()
    {
        $this->auto_render = FALSE;

    }

}