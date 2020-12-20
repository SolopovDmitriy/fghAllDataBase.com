<?php

namespace MyAdmApp {

    use MyApp\MethodExecuter as Mexec;
    use MyApp\NavigateModel;

    class AjaxAdminController extends Mexec
    {

        function index()
        {
            // TODO: Implement index() method.
        }

        public function getnavigatealldata()
        {
            $navM = new NavigateModel();
            $result = $navM->getManyRows([], 'id', 'ASC', 100);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        }
    }
}