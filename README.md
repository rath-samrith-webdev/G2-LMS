# G2-LMS (Leave Management System)

G2-LMS is a custom PHP-based Leave Management System that provides a comprehensive platform for managing employees, leave requests, and performance reviews within an organization. It utilizes a custom MVC architecture, a SQLite database, and can be containerized using Docker.

## Key Features
- **Role-Based Access Control**: Different access levels for Administrators, Managers, and Employees.
- **HR & Employee Management**: Manage companies, departments, job positions, and employee profiles.
- **Leave Management**: 
  - Define custom leave types and allowances.
  - Employees can submit leave requests.
  - Managers can approve or reject leave requests.
  - Automated tracking of used and remaining leave days.
- **Notifications**: Automated notifications for leave request updates.
- **Performance & Project Reviews**: Assign and track performance or project-based reviews between employees.

## Tech Stack
- **Backend/Frontend**: PHP (Custom MVC framework)
- **Database**: SQLite
- **Dependencies**: Composer (PHPMailer)
- **Deployment**: Docker & Docker Compose

## Getting Started

### Using Docker
You can easily spin up the application using Docker Compose:
```bash
docker-compose up -d
```
The application will be accessible at `http://localhost:8080`.

## Access Credentials

**Administrator Level**
- **Email**: `admin@mail.com`
- **Password**: `adminpass`

**Manager Level**
- **Email**: `manager@mail.com`
- **Password**: `managerpass`
