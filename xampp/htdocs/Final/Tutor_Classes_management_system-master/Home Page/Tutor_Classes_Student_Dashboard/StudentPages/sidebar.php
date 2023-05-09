<?php 
$id = $_SESSION["Student_Id"];
?>

<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php?s_id=<?php echo $id; ?>">Student Dashboard</a></li>
                            </ul>
                        </li>
                        

                        <li class="menu-title">
                            <span>Management</span>
                        </li>

                        <li >
                            <a href="event.php"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                        </li>
                        <li >
                            <a href="Absence.php"><i class="fas fa-calendar-day"></i> <span>Absence</span></a>
                        </li>
                        <li >
                            <a href="Resources.php"><i class="fas fa-calendar-day"></i> <span>Resources</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
