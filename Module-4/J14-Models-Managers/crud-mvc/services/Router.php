<?php


class Router {
    
    public function handleRequest(array $get): void {
      
        $controller = new UserController();

        if (isset($get['route'])) {
            
            switch ($get['route']) {
                case 'show_user':
                    $controller->show();
                    break;

                case 'create_user':
                    $controller->create();
                    break;

                case 'check_create_user':
                    $controller->checkCreate();
                    break;

                case 'update_user':
                    $controller->update();
                    break;

                case 'check_update_user':
                    $controller->checkUpdate();
                    break;

                case 'delete_user':
                    $controller->delete();
                    break;

                
                default:
                    $controller->list();
                    break;
            }

        } else {

            $controller->list();
        }
    }
}