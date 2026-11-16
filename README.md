# DZ Tutor: Tutoring Classes Management System

A web platform for running a tutoring school: an **administration portal** for managing classes, teachers, students and payments, and a **student portal** for following attendance, fees and learning resources. Built by a student team using **Scrum**, with PHP, MySQL and an MVC architecture.

## Features

**Administration portal**
- Dashboard with statistics and charts
- Classes: create and edit classes, and assign students to them
- Sessions: schedule class sessions, with a calendar view
- People: manage students, teachers and supervisors
- Subjects and learning resources
- Fees: record and track payments
- Absences: record and review attendance
- Accounts: login, and password reset by email

**Student portal**
- Personal dashboard
- Attendance and absence history
- Fee and payment status
- Access to learning resources shared by teachers
- Account management, including password reset by email

## Tech stack

| Layer | Technologies |
|---|---|
| Backend | PHP, organized in an MVC structure (modules, views, shared libraries) |
| Database | MySQL |
| Frontend | HTML, CSS, JavaScript, Bootstrap, FullCalendar, ApexCharts |
| Email | PHPMailer over SMTP |
| Local server | XAMPP |

## Architecture

Each portal follows the same MVC layout:

```
MVC_admin/ or MVC_student/
├── index.php        Front controller: routes requests to modules
├── init.php         Configuration and database connection
├── modules/         Business logic (class, session, student, fees, absence…)
├── view/            Page templates for each module
├── lib/             Database access and user/email helpers
└── lang/            Interface text
```

The database (`db_tutoring_classes`) models schools, classes, sessions, modules (subjects), students, teachers, supervisors, enrollments, fees, absences, resources and password reset tokens.

## Team and process

Built by a team of six developers over several **Scrum sprints**, with feature branches for each part of the system (admin dashboard, student pages, password recovery, documentation) merged into `master`.

## Running it locally

1. Install **XAMPP** and copy `xampp/htdocs/DzTutor` into your XAMPP `htdocs` folder.
2. Start Apache and MySQL, then create a database named `db_tutoring_classes` and import `db_tutoring_classes (8).sql`.
3. Check the database settings in `MVC_admin/init.php` and `MVC_student/init.php`.
4. To enable password-reset emails, set your SMTP email and app password in `lib/func.user.php` (both portals).
5. Open `http://localhost/DzTutor/MVC_SE/MVC_admin/` for the admin portal, or `http://localhost/DzTutor/MVC_SE/MVC_student/` for the student portal.
