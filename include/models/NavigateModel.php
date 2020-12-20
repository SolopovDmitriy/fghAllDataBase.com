<?php


namespace MyApp;


class NavigateModel extends DBEngine
{
    public function __construct()
    {
        parent::__construct('navigation');
    }

    public function getParentElements()
    {
        return $this->getManyRows([
            'parent_id' => null
        ], 'order_col');
    }

    public function getChilds($id)
    {
        return $this->getManyRows([
            'parent_id' => $id
        ], 'order_col');
    }

    public function getNavigationData()
    {
        $tmp = [];
        $parents = $this->getParentElements();
        for ($i = 0; $i < count($parents); $i++) {
            array_push($tmp, [
                'parent' => $parents[$i],
                'childs' => $this->getChilds($parents[$i]['id'])
            ]);
        }
        return $tmp;
    }
}