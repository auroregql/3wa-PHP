<?php

class Router
{
    public function handleRequest(): void
    {
        $ctrl = new PageController();

        if (isset($_GET["route"])) {

            if ($_GET["route"] === "a-propos") {
                $ctrl->about();
            }

            elseif ($_GET["route"] === "contact") {
                $ctrl->contact();
            }

            else {
                $ctrl->notFound();
            }

        } else {
            $ctrl->home();
        }
    }
}

?>