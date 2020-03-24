<?php

function lang($phrase){
    
    static $lang=array(
        //navbar
        'WEBSIT_NAME' =>'  شئون الطلاب<br> كلية اداب<br> جامعة كفر الشيخ ',
        'MANAGEPAGE' => ' ادارة الموظفين ',
        'ADDPAGE' => ' اضافة موظف ',
        'DASHOARD'=>' لوحة التحكم ',
        'EDITPAGE' =>'  تعديل البيانات الموظفين ',
        'NEWS_Faculty' => ' اخبار الكلية ',
        'SEARCH' => 'بحث',
        'EDIT_PROFILE' => 'تحرير الملف الشخصي ',
        'SETTING' => 'الاعدادت',
        'LOGOUT' => 'تسجيل الخروج',
        
        //Staff.php Or Staff.php?do=Manage
        
        /* Abbreviation 
        ** T To Table
        ** B To Button 
        ** E TO Enter
        ** S To Select
        */
        'MANAGE_STAFF_TITLE' =>' إدارة الموظفين ',
        'MANAGE_STUDENT_TITLE' =>' إدارة الطلاب ',
        'MANAGESTAFF'        => 'ادارة الموظفين ',
        'MANAGESTUDENT'      => 'ادارة الطلاب',
        'STAFF_ID_T'         =>'رقم الهوية الشخصية ',
        'USERNAME_T'         =>' اسم المستخدم ',
        'EMAILE_T'           =>' البريد الالكتروني ',
        'PHONE_T'            =>' رقم الهاتف ',
        'REGISTERED_DATE_T'  =>' تاريخ التسجيل ',
        'ACTION_T'           =>' الاجراء المتخذ ',
        'ADD_NEW_STAFF_B'    =>' اضافة موظف جديد ',
        'EDIT_T'             =>' تعديل ',
        'DELETE_T'           =>' مسح ',
        'ACTIVE_T'           =>' نشاط ',
        
        //Staff.php?do=Add
        'ADD_STAFF_TITLE' => ' اضافة موظف جديد ',
        'PASSWORD_SSN'    => ' كلمة السر(الرقم القومي) ',
        'STUDENT_CODE'    => 'كود الطالب',
        'ADDRESS'         => 'العنوان',
        'GPA'             => 'المعدل التراكمي',
        'GANDER'          => 'الجنس',
        'E_PASSWORD'      => ' الرجاء ادخال الرقم القومي ',
        'E_USERNAME'      => 'الرجاء ادخال اسم المستخدم',
        'E_EMAIL'         => 'الرجاء ادخال البريد الالكتروني',
        'E_PHONE'         => ' الرجاء ادخال رقم الهاتف',
        'E_STUDENT_CODE'  => 'الرجاء ادخال كود الطالب',
        'E_ADDRESS'       => 'الرجاء ادخال العنوان',
        'S_TYPE'          => ' اختار النوع',
        'S_LEVELS'        => ' اختار المستوي',
        'STAFF_TYPE'      => ' الصلاحيات الممنوحة ',
        'S_GANDER'        => 'اختار الجنس',
        'E_GPA'           => 'الرجاء ادخال المعدل التراكمي',
        'MALE'            => 'ذكر',
        'FEMALE'          => 'انثي',
        'ADMIN'           => ' مشرف ',
        'MANAGER'         => ' مدير ',
        'STUDENT'         => 'طالب',
        'STUDY_LEVELS'    => ' مشرف علي ',
        'FIRST_LEVEL'     => ' المستوي الاول ',
        'SECOUND_LEVEL'   => ' المستوي الثاني ',
        'THIRD_LEVEL'     => ' المستوي الثالث ',
        'FOURTH_LEVEL'    => ' المستوي الرابع ',
        'NOTHING'         => 'لاشئ',
        'CHOOSE_IMAGE'    => ' اختار صورة شخصية '
    
    );
    
     return $lang[$phrase];
}

?>