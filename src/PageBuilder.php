<?php

declare(strict_types=1);

namespace aspirantzhang\octopusPageBuilder;

class PageBuilder extends Common
{
    public $page = [];
    public $layout = [];

    public function page(string $name, string $title)
    {
        $this->page['name'] = $name;
        $this->page['title'] = $title;

        // eg: admin-layout.admin-add
        if (strpos($name, '.')) {
            $nameId = explode('.', $name, 2);
            $this->page['name'] = $nameId[1];   //admin-add
            if ($title === '') {
                $this->page['title'] = __($name);   //Admin Add
            }
            // add revision = false in page option when adding records
            if (strpos($nameId[1], '-add')) {
                $this->page['options']['revision'] = false;
            }
        }

        return $this;
    }

    public function type(string $type)
    {
        $this->page['type'] = $type;

        return $this;
    }

    public function tableToolBar(array $tableToolBar)
    {
        $this->layout['tableToolBar'] = $tableToolBar;

        return $this;
    }

    public function batchToolBar(array $batchToolBar)
    {
        $this->layout['batchToolBar'] = $batchToolBar;

        return $this;
    }

    public function tableColumn(array $tableColumn)
    {
        $this->layout['tableColumn'] = $tableColumn;

        return $this;
    }

    // Page or Modal
    public function tab(string $name = 'basic', array $data = [], string $title = '')
    {
        $tab = [
            'name' => $name,
            'title' => $title,
            'data' => $this->cleanChildrenEmptyValues($data),
        ];

        if ($title === '') {
            $tab['title'] = __($name);
        }

        if (strpos($name, '.')) {
            $nameId = explode('.', $name, 2);
            $tab['name'] = $nameId[1];
            if ($title === '') {
                $tab['title'] = __($name);
            }
        }

        $this->layout['tabs'][] = $tab;

        return $this;
    }

    public function sidebar(string $name = 'sidebar', array $data = [], string $title = '')
    {
        $sidebar = [
            'name' => $name,
            'title' => $title,
            'data' => $this->cleanChildrenEmptyValues($data),
        ];

        if ($title === '') {
            $sidebar['title'] = __($name);
        }

        if (strpos($name, '.')) {
            $nameId = explode('.', $name, 2);
            $sidebar['name'] = $nameId[1];
            if ($title === '') {
                $sidebar['title'] = __($name);
            }
        }

        $this->layout['sidebars'][] = $sidebar;

        return $this;
    }

    public function action(string $name = 'actions', array $data = [], string $title = '')
    {
        $action = [
            'name' => $name,
            'title' => $title,
            'data' => $this->cleanChildrenEmptyValues($data),
        ];

        if ($title === '') {
            $action['title'] = __($name);
        }

        if (strpos($name, '.')) {
            $nameId = explode('.', $name, 2);
            $action['name'] = $nameId[1];
            if ($title === '') {
                $action['title'] = __($name);
            }
        }

        $this->layout['actions'][] = $action;

        return $this;
    }

    public function options(array $options)
    {
        $this->page['options'] = $options;
        return $this;
    }
}
