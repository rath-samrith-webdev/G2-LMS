<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'controllers/admin/admin.controller.php',
    '/employees' => 'controllers/employees/employee.controller.php',
    '/companies' => 'controllers/companies/company.controller.php',
    '/calendars' => 'controllers/calendars/calendar.controller.php',
    '/leaves' => 'controllers/leaves/leave.controller.php',
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "layouts/header.php";
require "layouts/navbar.php";
require $page;
require "layouts/footer.php";
