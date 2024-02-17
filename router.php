<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'controllers/log.controll/login.controll.php',
    '/loginAdmin' => 'controllers/log.controll/login_admin.controll.php',
    '/admin' => 'controllers/admin/admin.controller.php',
    '/createEmployee' => 'controllers/admin/create.employee.controller.php',
    '/employees' => 'controllers/employees/employee.controller.php',
    '/createuser' => 'controllers/users/user.create.controll.php',
    '/companies' => 'controllers/companies/company.controller.php',
    '/calendars' => 'controllers/calendars/calendar.controller.php',
    '/leaves' => 'controllers/leaves/leave.controller.php',
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/leaveReports' => 'controllers/reports/report.controller.php',
    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',
    '/profileImage' => 'controllers/profiles/profile.upload.controller.php'
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}
require $page;
