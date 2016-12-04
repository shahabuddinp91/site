<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">

            <!--its for check student kina--> 
            <?php if (!empty($this->session->userdata('current_email'))) { ?>
                <ul class="nav nav-sidebar">
                    <li>
                        <?php echo anchor('Frontpage/studentsProfile', 'Students Profile', array('title' => 'Students Profile', 'class' => 'sameli')); ?>
                    </li>
                    <li>
                        <?php echo anchor('Frontpage/stdClsRoutine', 'Class Routine', array('title' => 'Academic Information', 'class' => 'sameli')); ?>
                    </li>
                    <!--                    <li>
                    <?php echo anchor('Frontpage/stdAcademicInfo', 'Academic Info', array('title' => 'Academic Information', 'class' => 'sameli')); ?>
                                        </li>-->
                    <li>
                        <?php echo anchor('Frontpage/stdExamwiseResult', 'Exam Wise Result', array('title' => 'Exam Wise Result', 'class' => 'sameli')); ?>
                    </li>
                    <li>
                        <?php echo anchor('Frontpage/stdFinancialinfo', 'Financial Information', array('title' => 'Financial Information', 'class' => 'sameli')); ?>
                    </li>
                </ul>
            <?php } else { ?>
                <!--its for check teacher kina-->
                <?php if (!empty($this->session->userdata('current_teacher_email'))) { ?>
                    <ul class="nav nav-sidebar">
                        <li>
                            <?php echo anchor('Frontpage/teachersProfile', 'Profile', array('title' => 'Profile', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Frontpage/editTeacherPro', 'Edit Profile', array('title' => 'Profile', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="nav nav-sidebar">
                        <li class="active">
                            <!--<a href="" class="alwaysactive">Dashboard</a>-->
                            <?php echo anchor('Dashboard/index', 'Dashboard', array('class' => 'alwaysactive')); ?>
                        </li>
                    </ul>
                    <p class="btnteacher btnextra">Teacher</p>
                    <ul class="nav nav-sidebar showteacher">
                        <li>
                            <?php echo anchor('Dashboard/addTeacher', 'Add Teacher', array('title' => 'Add Teacher', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/teachersProfile', 'Teachers Profile', array('title' => 'Teacher Profile', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="btnclass btnextra">Class</p>
                    <ul class="nav nav-sidebar showclass">
                        <li>
                            <?php echo anchor('Dashboard/addSection', 'Add Section', array('title' => 'Add Section', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addclass', 'Add Class', array('title' => 'Add Class', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="btnclassroutine btnextra">Class Routine</p>
                    <ul class="nav nav-sidebar showclassroutine">
                        <li>
                            <?php echo anchor('Dashboard/addManageday', 'Manage Day', array('title' => 'Manage Day', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addManagePeriodTime', 'Manage Period Time', array('title' => 'Manage Period Time', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addManageVenu', 'Manage Venu', array('title' => 'Manage Venu', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addRoutine', 'Create Routine', array('title' => 'Create Routine', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="btnstudent btnextra">Student</p>
                    <ul class="nav nav-sidebar showstd">
                        <li>
                            <?php echo anchor('Dashboard/addstudent', 'Add Student', array('title' => 'Add Student', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/studentsProfile', 'Students Profile', array('title' => 'Students Profile', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="btnsubject btnextra">Subject</p>
                    <ul class="nav nav-sidebar showsubject">
                        <li>
                            <?php echo anchor('Dashboard/addSubject', 'Add Subject', array('title' => 'Add Subject', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="btnexam btnextra">Exam</p>
                    <ul class="nav nav-sidebar showexam">
                        <li>
                            <?php echo anchor('Dashboard/addExam', 'Exam List', array('title' => 'Exam List', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addExamGrade', 'Exam Grade', array('title' => 'Exam Grade', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addmanagemarks', 'Manage Marks', array('title' => 'Manage Marks', 'class' => 'sameli')); ?>
                        </li>
                        <!--                <li>
                        <?php echo anchor('Dashboard/addManageMarksOption', 'Manage Marks Option', array('title' => 'Manage Marks Option', 'class' => 'sameli')); ?>
                                        </li>-->
                    </ul>
                    <p class="btnfees btnextra">Fees Collection</p>
                    <ul class="nav nav-sidebar showfees">
                        <li>
                            <?php echo anchor('Dashboard/addFeesCollection', 'Show Fees Collection', array('title' => 'Fees Collection List', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addFees', 'Show Fees', array('title' => 'Fees List', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <p class="bntgrade btnextra">Manage Grade</p>
                    <ul class="nav nav-sidebar showgrade">
                        <li>
                            <?php echo anchor('Dashboard/addGrade', 'Add Grade', array('title' => 'Add Grade', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addSixClass', 'Class Six'); ?>
                        </li>
                    </ul>



                    <p class="btntestimonial btnextra">Testimonial</p>
                    <ul class="nav nav-sidebar showtstmonial">
                        <li>
                            <?php echo anchor('Dashboard/testimonialList', 'Testimonial List', array('title' => 'Testimonial List', 'class' => 'sameli')); ?>
                        </li>
                    </ul>
                    <ul class="sld">
                        <li>
                            <?php echo anchor('Dashboard/addSlider', 'Slider', array('title' => 'Slider', 'class' => 'btnextra')); ?>
                        </li>
                    </ul>
                    <p class="btnsetting btnextra">Settings</p>
                    <ul class="nav nav-sidebar showsetting">
                        <li>
                            <?php echo anchor('Dashboard/addLogo', 'Add Logo', array('title' => 'Add Logo', 'class' => 'sameli glyphicon glyphicon-plus')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/logoSloganlist', 'Logo & Slogan List', array('title' => 'Logo & Slogan List', 'class' => 'sameli')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Dashboard/addcopyright', 'Add Copyright', array('title' => 'Add Copyright', 'class' => 'sameli glyphicon glyphicon-plus')); ?>
                        </li>
                    </ul>

                <?php
                }
            }
            ?>

        </div>
        <!--    </div>
        </div>-->