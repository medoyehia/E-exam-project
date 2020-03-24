<?php

function lang($phrase){
    
    static $lang=array(
    
        
        'WEBSIT_NAME' =>'Student Affairs <br> Faculty of Arts,<br>KFS University',
        'MANAGESTAFF' => 'Manage Staff',
        'MANAGESTUDENT' => 'Manage Student',
        'ADDPAGE' => 'Add Page',
        'DASHOARD'=>'Dashboard',
        'EDITPAGE' =>'Edit Page',
        'NEWS_Faculty' =>' News Faculty',
        'SEARCH' => 'Search',
        'EDIT_PROFILE' => 'Edit profile',
        'SETTING' => 'Setting',
        'LOGOUT' => 'Logout',
        
    //Staff.php Or Staff.php?do=Manage
        
        /* Abbreviation 
        ** T To Table
        ** B To Button 
        */
        'MANAGE_STAFF_TITLE' =>'Manage Staff',
        'STAFF_ID_T' =>'Staff_ID',
        'USERNAME_T' =>'Username',
        'EMAILE_T' =>'E-mail',
        'PHONE_T' =>'Phone',
        'REGISTERED_DATE_T' =>'Registered Date',
        'ACTION_T' =>'Action',
        'ADD_NEW_STAFF_B' =>'Add New Staff',
        'EDIT_T' =>'Edit',
        'DELETE_T' =>'Delete',
        'ACTIVE_T' =>'Active',
        
    //Staff.php?do=ManageStudent
        'MANAGE_STUDENT_TITLE' =>'Manage Student',
        'STUDENT_ID_T'         =>'Student_ID',
        'STUDENT_CODE_T'       =>'Student Code',
        'STUDENT_LEVEL_ID_T'   =>'Student Level',
        
    //Staff.php?do=Add
        'ADD_STAFF_TITLE' => 'Add New Staff',
        'PASSWORD_SSN'    => 'Password(SSN)',
        'STUDENT_CODE'    => 'Student Code',
        'ADDRESS'         => 'Address',
        'GPA'             => 'GPA',
        'GANDER'          => 'Gender',
        'E_PASSWORD'      => 'Enter Password',
        'E_USERNAME'      => 'Enter Username',
        'E_EMAIL'         => 'Enter E-mail',
        'E_PHONE'         => 'Enter Phone',
        'E_STUDENT_CODE'  => 'Enter Student Code',
        'E_ADDRESS'       => 'Enter Address',
        'S_TYPE'          => 'Select Type',
        'S_LEVELS'        => 'Select Levels',
        'S_GANDER'        => 'Select Gender',
        'E_GPA'           => 'Enter GPA',
        'MALE'            => 'Male',
        'FEMALE'          => 'Female',
        'STAFF_TYPE'      => 'Staff Type',
        'ADMIN'           => 'Admin',
        'MANAGER'         => 'Manager',
        'STUDENT'         => 'Student',
        'STUDY_LEVELS'    => 'Study Levels',
        'FIRST_LEVEL'     => 'First Level',
        'SECOUND_LEVEL'   => 'Secound Level',
        'THIRD_LEVEL'     => 'Third Level',
        'FOURTH_LEVEL'    => 'Fourth Level',
        'NOTHING'         =>'Nothing',
        'CHOOSE_IMAGE'    => 'Choose Image',
        
    
    );
    
    return $lang[$phrase];
}

?>