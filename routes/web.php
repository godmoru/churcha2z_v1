<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
    // return redirect('https://a2z.church/dunamis/login');
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    return 'DONE'; //Return anything
});


Route::get('/home/{id?}', 'HomeController@index')->name('home');
Route::post('/post-new-attendance', 'LocationController@submitAttendance')->name('location.submitAttendance');


//\\*** Document Module ***//\\
Route::get('/documents/one/{id?}', 'DocumentController@one')->name('documents.one');


//\\*** Location Module ***//\\
Route::get('/locations/index/{id?}', 'LocationController@index')->name('locations.index');
Route::get('/locations/planting-info-index/{id?}', 'LocationController@plantingInfo')->name('locations.plantingInfo');
Route::get('/locations/print-planting-info/{id?}', 'LocationController@printPlantingInfo')->name('locations.printplantingInfo');
Route::get('/locations/foreign-index/{id?}', 'LocationController@foreignlocations')->name('locations.findex');
Route::post('/locations/index/{id?}', 'LocationController@new')->name('locations.new');
Route::get('/locations/view-data/{id?}', 'LocationController@oneLocation')->name('locations.one');
Route::post('/locations/update-planting-information/', 'LocationController@editPlantingInfo')->name('location.updateplantinginfo');
Route::post('/locations/delete-data/{id?}', 'LocationController@deleteLoc')->name('locations.one.delete');
Route::post('/locations/edit-data/', 'LocationController@editLocation')->name('location.edit');
Route::get('/locations/view-attendance-data/{id?}', 'LocationController@showAttendance')->name('locations.show-attendance');
Route::get('/location/add-attendance-data/{id?}', 'LocationController@donew')->name('location.add-attendance');
Route::get('/location/add-vehicle-attendance-data/{id?}', 'LocationController@addvattendance')->name('location.add-vehicle-attendance');
Route::post('/location/add-vehicle-attendance-data/{id?}', 'LocationController@submitVAttendance')->name('location.doadd-vehicle-attendance');

Route::get('/location/add-vehicle-attendance-data/{id?}', 'LocationController@addvattendance')->name('location.add-vehicle-attendance');

Route::get('/locations/view-attendance-count-areas/{id?}', 'LocationController@countAreas')->name('locations.show-attendance-count-areas');

/*Reports*/
Route::get('/locations/weekly-reports/{id?}', 'LocationController@WKReports')->name('locations.weekly-reports');
Route::post('/locations/get-reports-by-date/{id?}', 'LocationController@getReportByDate')->name('locations.get-reports-by-date');

Route::get('/locations/weekly-reports/2/{id?}', 'LocationController@WKReports2')->name('locations.weekly-reports2');
Route::get('/locations/submit-weekly-reports/{id?}', 'LocationController@newWklReport')->name('locations.weekly-reports-submit');

Route::get('/locations/print-week-reports/{id?}', 'LocationController@printWeekReport')->name('locations.week-reports-print');
Route::get('/locations/yearly-reports/{id?}', 'LocationController@LocYearlyReport')->name('locations.yearly-reports');
Route::get('/locations/yearly-reports-print/{id?}', 'LocationController@printLocYearReport')->name('locations.yearly-reports-print');
Route::get('/locations/monthly-reports/{id?}', 'LocationController@LocMonthlyReport')->name('locations.monthly-reports');
Route::get('/locations/monthly-reports-print/{id?}', 'LocationController@printLocMonthReport')->name('locations.monthly-reports-prints');


Route::get('/locations/weekly-reports-summary/{id?}', ['uses'=>'LocationController@GenWKReports', 'as'=>'locations.weekly-reports-summary', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|resident-pastor']);

Route::get('/locations/all-weekly-reports/{id?}', ['uses'=>'LocationController@getLocationReport', 'as'=>'locations.all-weekly-reports', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|resident-pastor']);
Route::any('/locations/edit-weekly-reports/{id?}', ['uses'=>'LocationController@editeeklyReport', 'as'=>'locations.edit-weekly-reports', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|resident-pastor']);
Route::any('/location/edit-income-report/{id?}', ['uses'=>'AccountController@editLociReport', 'as'=>'location.edit-income-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|resident-pastor|auditor|hq-accountant']);
Route::any('/location/delete-income-report/this/{id?}', ['uses'=>'AccountController@deleteLociReport', 'as'=>'location.delete-income-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|resident-pastor|auditor|hq-accountant']);

Route::get('/locations/weekly-reports-print/{id?}', 'LocationController@printWeeklyReport')->name('locations.weekly-reports-print');
Route::get('/locations/summarized-weekly-reports-print/{id?}', 'LocationController@printGenWeeklyReport')->name('locations.summarized-weekly-reports-print');
Route::get('/locations/summarized-yaerly-reports-print/{id?}', 'LocationController@printYearlyReport')->name('locations.summarized-yearly-reports-print');
Route::post('/locations/weekly-reports-add/{id?}', 'LocationController@submitweeklyReport')->name('locations.weekly-reports-add');

//NEW PRINT REPORT AREAS\\
Route::get('/locations/print-this-week-reports/{id?}', ['uses'=>'LocationController@printWeekGenReport', 'as'=>'locations.this-week-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-this-month-reports/{id?}', ['uses'=>'LocationController@printMonthGenReport', 'as'=>'locations.this-month-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-this-quarterly-reports/{id?}', ['uses'=>'LocationController@printQuarterGenReport', 'as'=>'locations.quarterly-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-this-yearly-reports/{id?}', ['uses'=>'LocationController@printYearGenReport', 'as'=>'locations.this-yearly-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-jan-to-march-report/{id?}', ['uses'=>'LocationController@printJantoMarchReport', 'as'=>'locations.jan-to-march-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-april-to-june-report/{id?}', ['uses'=>'LocationController@printApriltoJuneReport', 'as'=>'locations.april-to-june-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-july-to-september-report/{id?}', ['uses'=>'LocationController@printJulytoSeptemberReport', 'as'=>'locations.july-to-sept-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);
Route::get('/locations/print-october-to-december-report/{id?}', ['uses'=>'LocationController@printOctobertoDecemberReport', 'as'=>'locations.oct-to-dec-report', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);

/* Galleries*/
Route::get('/location/add-under-gallery-attendance-data/{id?}', 'LocationController@showunderGalleryAtt')->name('location.add-under-gallery-attendance');
Route::get('/location/add-gallery-1-attendance-data/{id?}', 'LocationController@showGalleryIAtt')->name('location.add-gallery-1-attendance');
Route::get('/location/add-gallery-2-attendance-data/{id?}', 'LocationController@showGalleryIIAtt')->name('location.add-gallery-2-attendance');


Route::get('/location/add-overflows-attendance-data/{id?}', 'LocationController@showOverflowAtt')->name('location.add-overflows-attendance');
Route::get('/location/add-special-attendance-data/{id?}', 'LocationController@specialAttendnce')->name('location.add-special-attendance');
Route::get('/location/add-additional-attendance-data/{id?}', 'LocationController@showAdditionalAtt')->name('location.add-additional-attendance');
Route::get('/locations/view-attendance-details/{id?}', 'LocationController@showCountAreas')->name('locations.show-attendance-details');
Route::any('/locations/update-attendance-details/{id?}', 'LocationController@updateAttRecord')->name('locations.attdata.update');
Route::any('/locations/delete-attendance-details/{id?}', 'LocationController@deleteAttRecord')->name('locations.attdata.delete');
Route::any('/locations/view-attendance-details-for-selected-date/{service_date?}', 'LocationController@showCountAreasByDate')->name('locations.show-attendance-details-date');
Route::any('/locations/update-attendance-details/x/{id?}/{service_id?}/{date?}', 'LocationController@updateAttRecordX')->name('locations.att-data.doupdatex');



Route::get('/location/add-special-attendance-data/again_again', 'LocationController@doSpecialAttendance')->name('location.do-special-attendance');
Route::post('/location/add-attendance-data/special-details', 'LocationController@doSpecialAttendance')->name('location.doadd-special-attendance');
Route::post('/location/add-special-attendance/data', 'LocationController@doSpecialAttendance')->name('location.specialAtt');

Route::get('/locations/show-attendance-data/{id?}', 'LocationController@showprint')->name('attendance.showprint');
Route::get('/locations/print-attendance-people/{id?}', 'LocationController@printReport')->name('attendance.printpeople');
Route::get('/locations/print-attendance-people-service-summary/{id?}', 'LocationController@printServiceSummary')->name('attendance.printpeopleservicesummary');
Route::post('/locations/print-attendance-people-service-summary/{id?}', 'LocationController@printCustomDates')->name('attendance.printpeopleservicesummarybydate');

Route::get('/locations/print-attendance-people-summary/{id?}', 'LocationController@printSummary')->name('attendance.printpeoplesummary');
Route::get('/locations/print-attendance-vehicle/{id?}', 'LocationController@printVReport')->name('attendance.printvehicle');
Route::post('/locations/new-count-area/', 'LocationController@newCountArea')->name('locations.newCountArea');
Route::any('/locations/count-area-edit/', 'LocationController@updateCountArea')->name('locations.updateCountArea');
Route::any('/locations/count-area-delete/', 'LocationController@deleteCountArea')->name('locations.deleteCountArea');
Route::post('/locations/new-car-park/', 'LocationController@newCarPark')->name('locations.newCarPark');
Route::post('/locations/new-service-types/', 'LocationController@newServiceType')->name('locations.newServiceType');


//\\ *** Members Module ***//\\
Route::get('/converts/index/{id?}', 'ConvertsController@converts')->name('converts.index');
Route::get('/converts/daily-summary/{id?}', 'ConvertsController@dailysummary')->name('converts.dailysummary');
Route::get('/converts/add-new/{id?}', 'ConvertsController@showReg')->name('converts.reg');
Route::get('/converts/global-index/{id?}', 'ConvertsController@allconverts')->name('converts.global-index');
Route::post('/converts/index/{id?}', 'ConvertsController@converts')->name('converts.search');
Route::post('/converts-search/index/{id?}', 'ConvertsController@searchconverts')->name('converts.searched');
Route::get('/converts/shearch/{id?}', 'ConvertsController@showsearch')->name('converts.showsearch');
Route::get('/converts-search/copyphoneno/{id?}', 'ConvertsController@copyphonenos')->name('converts.copyphones');
Route::get('/converts/first-timers/index/{id?}', 'ConvertsController@firsttimers')->name('converts.firsttimers');
Route::get('/converts/new-converts/index/{id?}', 'ConvertsController@newconverts')->name('converts.newconverts');
Route::get('/converts/one/{id?}', 'ConvertsController@oneConvert')->name('converts.one');
Route::post('/converts/one/{id?}', 'ConvertsController@updateconvert')->name('converts.updateinfo');
Route::get('/converts/print/todays/{id?}', 'ConvertsController@printTodayConverts')->name('converts.printtodays');
Route::get('/converts/print/todays/firsttimers/{id?}', 'ConvertsController@printTodayFirstTimers')->name('converts.printtodays');
Route::get('/converts/bulksms/{id?}', 'ConvertsController@getBulkSMS')->name('converts.getBulkSMS');
Route::post('/converts/bulksms/{id?}', 'ConvertsController@grabContacts')->name('converts.grabcontacts');
Route::get('/converts/print/all/{id?}', 'ConvertsController@printConverts')->name('converts.print');
Route::post('/converts/new/', 'ConvertsController@newconvert')->name('converts.new');
Route::post('/members/new/', 'MembersController@store')->name('members.new');
Route::get('/members/index/{id?}', 'MembersController@index')->name('members.index');
Route::get('/members/add-new/{id?}', 'MembersController@create')->name('members.reg');
Route::get('/member/profile/{id?}', 'MembersController@memberprofile')->name('members.one');
Route::post('/member/profile/post-to-new-department/', 'MembersController@mbrPosting')->name('member.posting');
Route::post('/converts/find', array('uses'=>'ConvertsController@findConvert','as'=>'findConvert'));
Route::get('/people/categories/all/{id?}', array('uses'=>'ConvertsController@categories','as'=>'peoplecategories'));
Route::get('/people/categories/view-one/{id?}', array('uses'=>'ConvertsController@oneCat','as'=>'peoplecategories.one'));
Route::post('/people/categories/view-one/{id?}', array('uses'=>'ConvertsController@editcategory','as'=>'peoplecategories.editone'));
Route::post('/people/categories/delete-one/{id?}', array('uses'=>'ConvertsController@deleteCat','as'=>'peoplecategories.deleteone'));
Route::post('/people/categories/all/{id?}', array('uses'=>'ConvertsController@newcategory','as'=>'peoplecategories.new'));

Route::post('/converts/get-by-criterias/', 'ConvertsController@get_by_criterias')->name('converts.get_by_criterias');





//\\ *** Pastors Module ***//\\
Route::get('/hr/pastors/index/{id?}', 'HRController@pastors')->name('pastors.index');
Route::get('/hr/resident-pastors/{id?}', 'HRController@pastors2index')->name('pastors.2index');
Route::get('/hr/pastors/print-list/{id?}', 'HRController@printPastors')->name('pastors.printlist');
Route::get('/hr/pastors/new/{id?}', 'HRController@newpastorS')->name('pastors.createnew');
Route::post('/hr/pastors/index/{id?}', 'HRController@newpastor')->name('pastors.new');
Route::get('/hr/pastors/one/{id?}', 'HRController@onepastor')->name('pastors.one');
Route::post('/hr/pastors/one/assign-location/', 'HRController@assignLoc')->name('pastor.assignLoc');
Route::post('/hr/pastors/one/post-location/', 'HRController@postPastor')->name('pastor.postLoc');
Route::post('/hr/pastor/one/modify-responsibility/', 'HRController@modifyResponsibility')->name('pastor.modifyResponsibility');
Route::post('/hr/pastor/one/modify-category/', 'HRController@modifyCategory')->name('pastor.modifycategory');



Route::get('/hr/pastors/posting-history/dataset/print-posting-histories-pastors/{id?}', 'HRController@printpostingHistory')->name('pastor.printpostinghistory');

Route::get('/hr/pastors/posting-histories/{id?}', 'HRController@pstPostings')->name('pastor.postinghistory');
Route::post('/hr/pastors/one/update-posting-info', 'HRController@updatePostingInfo')->name('pastor.updatepostinginfo');

Route::post('/hr/pastors/one/edit/{id?}', 'HRController@editPastorContactInfo')->name('pastors.one.editContactInfo');

Route::post('/hr/pastors/one/delete/{id?}', 'HRController@deetePst')->name('pastor.delete');
Route::post('/hr/pastors/change-location/{id?}', 'LocationController@changePastor')->name('pastor.change-location');


//\\ *** Establishment Classes Module ***//\\
Route::get('/classes/index/{id?}', 'ClassesController@getclasses')->name('classes.index');
Route::get('/classes/one/{id?}', 'ClassesController@oneclass')->name('classes.one');
Route::post('/classes/one/{id?}', 'ClassesController@deleteBatch')->name('classes.deleteone');
Route::get('/classes/one/{id?}/start-class/', 'ClassesController@startclass')->name('classes.start');
Route::get('/foundation-classes-batches/{id?}/', 'ClassesController@batches')->name('classes.foundation-classes');
Route::post('/foundation-classes-batches/new/', 'ClassesController@newBatch')->name('fclassbatch.new');
Route::get('/foundation-classes-batches/one/{id?}/', 'ClassesController@onebatch')->name('classes.class.batches');
Route::post('/foundation-classes-batches/one/{id?}/', 'ClassesController@assignCounselor')->name('class.batches.assign');
Route::get('/class/start/{id?}', 'ClassesController@addfclass')->name('classes.fclass.start');
Route::get('/class/get-attendance/{id?}', 'ClassesController@showAttendance')->name('classes.fclass.start');
Route::post('/class/start/add-new-student', 'ClassesController@doAddtoClass')->name('classes.fclass.addtoClass');
Route::get('/class/start/new/{id?}', 'ClassesController@startNewClass')->name('classes.fclass.startNewClass');
Route::post('/class/start/new/{id?}', 'ClassesController@addFClass1')->name('classes.fclass.addFClass1');
Route::get('/class/print/class1/{id?}', 'ClassesController@printClass')->name('classes.fclass.printClass1');

Route::post('/class/submit-attendance/{id?}', 'ClassesController@submitAttendance')->name('classes.fclass.submitAttendance');
Route::get('/class/get-class-2-present-attendance/{id?}', 'ClassesController@printC2Present')->name('classes.fclass.getclass2presents');
Route::get('/class/get-class-2-absent-attendance/{id?}', 'ClassesController@printC2Absent')->name('classes.fclass.getclass2absents');

Route::get('/class/get-class-3-present-attendance/{id?}', 'ClassesController@printC3Present')->name('classes.fclass.getclass3presents');
Route::get('/class/get-class-3-absent-attendance/{id?}', 'ClassesController@printC3Absent')->name('classes.fclass.getclass3absents');

Route::get('/class/get-class-4-present-attendance/{id?}', 'ClassesController@printC4Present')->name('classes.fclass.getclass4presents');
Route::get('/class/get-class-4-absent-attendance/{id?}', 'ClassesController@printC4Absent')->name('classes.fclass.getclass4absents');

Route::get('/class/get-class-5-present-attendance/{id?}', 'ClassesController@printC5Present')->name('classes.fclass.getclass5presents');
Route::get('/class/get-class-5-absent-attendance/{id?}', 'ClassesController@printC5Absent')->name('classes.fclass.getclass5absents');

Route::get('/class/get-class-6-present-attendance/{id?}', 'ClassesController@printC6Present')->name('classes.fclass.getclass6presents');
Route::get('/class/get-class-6-absent-attendance/{id?}', 'ClassesController@printC6Absent')->name('classes.fclass.getclass6absents');



 //\\ *** Counselors' Module ***//\\
Route::get('/counselors/index/{id?}', 'CounselorsController@counselors')->name('counselors.index');
Route::post('/counselors/new/', 'CounselorsController@newcounselor')->name('counselors.new');
Route::post('/counselors/one/edit/{id?}', 'CounselorsController@edit')->name('counselor.edit');
Route::post('/counselors/one/assign-class-batch/{id?}', 'CounselorsController@assignbatch')->name('counselor.batches.assign');
Route::get('/counselors/one/{id?}', 'CounselorsController@oneprofile')->name('counselors.one');
Route::post('/counselors/one/upload-passport', 'CounselorsController@uploadImage')->name('counselors.uploadImage');
Route::post('/counselors/one/delete', 'CounselorsController@delete')->name('counselor.delete');
// Route::post('/counselors/start/new/{id?}', 'CounselorsController@addFClass1')->name('classes.fclass.addFClass1');


 //\\ *** Accountants' Module ***//\\
Route::get('/hr/accountants/index/{id?}', 'HRController@accountants')->name('accountants.index');
Route::post('/hr/accountants/new/', 'HRController@newaccountant')->name('accountants.new');
Route::post('/hr/accountants/one/edit/{id?}', 'HRController@edit')->name('accountant.edit');
Route::get('/hr/accountants/one/{id?}', 'HRController@oneprofile')->name('accountants.one');
Route::post('/hr/accountants/one/upload-passport', 'HRController@uploadImage')->name('accountants.uploadImage');
Route::post('/hr/accountants/one/delete', 'HRController@delete')->name('accountant.delete');
Route::post('/hr/accountants/one/assign-location/', 'HRController@assignAcctLoc')->name('accountant.assignLoc');
Route::post('/hr/accountant/one/post-location/', 'HRController@postAccountant')->name('accountant.postLoc');


Route::get('/workforce/departments/{id?}', 'HRController@workforcedept')->name('workforce.depts');
Route::post('/workforce/departments/{id?}', 'HRController@newworkforcedept')->name('workforce.depts.new');
Route::get('/workforce/departments/one/{id?}', 'HRController@onedept')->name('workforce.depts.one');
Route::get('/workforce/hods/{id?}', 'HRController@hods')->name('workforce.depts.hods');
Route::post('/workforce/hods/{id?}', 'HRController@newhod')->name('workforce.depts.hods-new');


//Home Church Module
Route::get('/home-church/districts/{id?}', 'HomeChurchController@districts')->name('dhc.districts');
Route::post('/home-church/districts/create-new/{id?}', 'HomeChurchController@newDistrict')->name('dhc.new.district');
Route::get('/home-church/district/view-data/{id?}', 'HomeChurchController@oneDistrict')->name('dhc.districts.one');
Route::get('/home-church/zone/view-data/{id?}', 'HomeChurchController@oneZone')->name('dhc.zone.one');
Route::get('/home-church/zone/area/view-data/{id?}', 'HomeChurchController@oneArea')->name('dhc.area.one');
Route::post('/home-church/districts/zones/new{id?}', 'HomeChurchController@newZone')->name('dhc.districts-zone-new');
Route::post('/home-church/districts/zones/area/new{id?}', 'HomeChurchController@newArea')->name('dhc.area-new');

Route::get('/home-church/district/converts/print/todays/{id?}', 'HomeChurchController@printDistrictConverts')->name('dhc.converts.printtodays');
Route::get('/home-church/district/firsttimers/print/todays/{id?}', 'HomeChurchController@printDistrictFirstTimers')->name('dhc.firsttimers.printtodays');
Route::get('/home-church/district/daily-evangelism-souls-won/print/todays/{id?}', 'HomeChurchController@printDailyEvangelism')->name('dhc.dailyevangelism.printtodays');
Route::post('/home-church/districts/zones/area/home-church/new{id?}', 'HomeChurchController@newHomecell')->name('dhc.homecell-new');
Route::get('/home-church/districts/zones/area/home-church/datails/{id?}', 'HomeChurchController@oneHomecell')->name('dhc.homecell.one');

Route::get('/test-sms', 'ConvertsController@sendSMS')->name('sms.send');

// System Preference/Roles/Permissions
Route::get('/system/preferences/{id?}', ['uses'=>'SystemController@systemPreference', 'as'=>'preferences.index', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin']);


Route::get('/system/users/{id?}', ['uses'=>'SystemController@users', 'as'=>'users.index', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin||auditor|hq-accountant|account-officer|resident-pastor']);
Route::get('/system/users/all/{id?}', ['uses'=>'SystemController@allusers', 'as'=>'users.index.all', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin||auditor|hq-accountant|account-officer|resident-pastor']);

Route::post('/system/users', array('uses'=>'SystemController@newUser', 'as'=>'users.new' ));
Route::get('/system/user/profile/{id?}', ['uses'=>'SystemController@viewOne', 'as'=>'user.profile', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|snr-pastor|maintenance-admin|fd-supervisor|front-desk|auditor|hq-accountant|account-officer|location_admin']);
Route::post('/system/users/profile/{id?}', ['uses'=>'SystemController@updateRec', 'as'=>'user.edit', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|senior-management|maintenance-admin|employee|auditor|hq-accountant']);
Route::post('/system/users/addrole/{id?}', ['uses'=>'SystemController@addRole', 'as'=>'user.addrole', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|senior-management|maintenance-admin|employee|auditor|hq-accountant']);
Route::post('/system/users/revokerole/{id?}', ['uses'=>'SystemController@revokeRole', 'as'=>'user.revokerole', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|senior-management|maintenance-admin|employee|auditor|hq-accountant']);
Route::get('/system/user/myaccount/update_password/{id}', ['uses'=>'SystemController@updatePassword', 'as'=>'cPassword', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|fc-coordinator|counselor-hod|counters-hod|counter-desk-officer|fd-supervsisor|front-desk|senior-management|resident-pastor|maintenance-admin|report-only|center-cordinator|fc-coordinator|auditor|hq-accountant|account-officer|mobile-church|assistant-pastor|hq-minister|location_admin']);
Route::post('/system/user/myaccount/update_password/{id}', ['uses'=>'SystemController@doUpdatePassword', 'as'=>'cPassword', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|fc-coordinator|counselor-hod|counters-hod|counter-desk-officer|fd-supervsisor|front-desk|senior-management|resident-pastor|maintenance-admin|report-only|center-cordinator|fc-coordinator|auditor|hq-accountant|account-officer|mobile-church|assistant-pastor|hq-minister|location_admin']);
Route::post('/system/users/profile/upload-passport/{id}', ['uses'=>'SystemController@uploadImage', 'as'=>'cPassport', 'middleware' => ['auth', 'acl'], 'is' => 'administrator|admin|senior-management|maintenance-admin|employee|report-only|front-end-user|center-cordinator|auditor|hq-accountant|account-officer|location_admin']);
// User verification
Route::get('/system/user/account/verification/{id?}', function () {
	$param['msg'] = "";
    $param['pageName'] = "User Verification";
    return view('systems.users.verify', $param);
});

Route::post('/system/user/account/verification/{id?}', array('uses'=>'SystemController@verifyUser', 'as'=>'usVerify' ));
Route::post('/system/user/account/add-location-admin/{id?}', array('uses'=>'LocationController@enablelogin', 'as'=>'locationadmin' ));
Route::get('/sendCode/', array('uses'=>'SystemController@resendCode','as'=>'sCode'));
Route::post('/system/user/send-details/', array('uses'=>'SystemController@resendAccountDetails','as'=>'resendAccountDetails'));
//Delete User
Route::post('system/user/destroy', ['as'=>'user.destroy', 'uses'=>'SystemController@destroyuser']);
/*** System Role Based Acess Control ***/
Route::get('/system/rbac/roles/{id?}', array('uses'=>'SystemController@roles', 'as'=>'sysroles.index' ));
Route::get('/system/rbac/role/data/{id?}', array('uses'=>'SystemController@viewOneR', 'as'=>'role.profile' ));
Route::post('/system/rbac/roles', array('uses'=>'SystemController@newRole', 'as'=>'roles.new' ));
Route::post('/system/rbac/roles/edit', array('uses'=>'SystemController@editRole', 'as'=>'role.edit' ));


// ACCOUNT ROUTES\\
Route::get('/accounts/dashboards/{id?}', ['uses'=>'AccountController@dashboard', 'as'=>'accounts.dashboard', 'middleware' => ['auth', 'acl'], 'is' => 'auditor|hq-accountant|administrator|resident-pastor']);
Route::get('/accounts/location/report/{id?}', ['uses'=>'AccountController@onelocationx', 'as'=>'accounts.locationReport', 'middleware' => ['auth', 'acl'], 'is' => 'auditor|hq-accountant|administrator']);
Route::get('/accounts/income/statements/{id?}', array('uses'=>'AccountController@incomestatement', 'as'=>'income.statement', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::get('/accounts/income/monthly-statements/{id?}', array('uses'=>'AccountController@monthincomesummary', 'as'=>'income.locationmonthlysummary', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::get('/accounts/income/monthly-statements-general/{type?}', array('uses'=>'AccountController@monthincomesummary2', 'as'=>'income.locationmonthlysummary2', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::post('/accounts/income/monthly-statements-general/{type?}', array('uses'=>'AccountController@monthincomesummary2', 'as'=>'income.post.locationmonthlysummary2', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::post('/accounts/income/export/monthly-statements-general/{type?}', array('uses'=>'AccountController@exportmonthincomesummary2', 'as'=>'income.export.locationmonthlysummary2', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::any('/accounts/locations-statements-general/{id?}', array('uses'=>'AccountController@locationsgeneral', 'as'=>'locationgeneralstatement', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::get('/accounts/export-locations-statements-general', array('uses'=>'AccountController@exportlocationsgeneral', 'as'=>'locationgeneralstatement.export', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));
Route::get('/accounts/locations-statements-general-print/{id?}', array('uses'=>'AccountController@printlocationsgeneral', 'as'=>'printlocationgeneralstatement', 'middleware'=>['auth', 'acl'], 'is', 'administrator|auditor|hq-accountant|resident-pastor' ));


Route::get('/accounts/income/statements/yearly-reports/{id?}', array('uses'=>'AccountController@cummulativesummary', 'as'=>'income.cummulativestatement' ));
Route::post('/accounts/income/statements/get-yearly-reports/{id?}', array('uses'=>'AccountController@getYcummulativesummary', 'as'=>'income.get-yearly-reports' ));
Route::post('/accounts/income/statements/export-yearly-reports/{id?}', array('uses'=>'AccountController@exportgetYcummulativesummary', 'as'=>'export.get-yearly-reports' ));
Route::get('/accounts/income/by-years-reports/{id?}', array('uses'=>'AccountController@cummulativeYearssummary', 'as'=>'income.by-years-reports' ));
Route::get('/accounts/income/loc-years-reports/{id?}', array('uses'=>'AccountController@cummulativeYearssummary', 'as'=>'income.loc-years-reports' ));
Route::post('/accounts/income/statements/get-month-reports/{id?}', array('uses'=>'AccountController@getMcummulativesummary', 'as'=>'income.get-monthly-reports' ));
Route::get('/accounts/income/statements/my-location-month-reports/{id?}', array('uses'=>'AccountController@getmyMonthIncomeSummary', 'as'=>'income.my-location-monthly-reports' ));
Route::post('/accounts/income/statements/my-location-month-reports/{id?}', array('uses'=>'AccountController@getmyMonthIncomeSummary', 'as'=>'income.post.my-location-monthly-reports' ));
Route::get('/accounts/income/statements/my-location-daily-reports/{id?}', array('uses'=>'AccountController@getmyDailyIncomeSummary', 'as'=>'income.my-location-daily-reports' ));
Route::post('/accounts/income/statements/my-location-daily-reports/{id?}', array('uses'=>'AccountController@getmyDailyIncomeSummary', 'as'=>'income.post.my-location-daily-reports' ));

Route::get('/accounts/income-statements/download-this-month/{id?}',  array('uses' => 'AccountController@downloadthismonth', 'as' => 'downloadthismonth' ));

Route::get('/accounts/location-income/{id?}', array('uses'=>'AccountController@newWklIncome', 'as'=>'income.bylocations' ));
Route::get('/accounts/income/location-summary/{type?}', array('uses'=>'AccountController@incomesummary', 'as'=>'income.location-summary' ));
Route::post('/accounts/income/location-summary/{type}', array('uses'=>'AccountController@incomesummary', 'as'=>'income.post.location-summary' ));
Route::post('/accounts/location-income/{id?}', array('uses'=>'AccountController@submitIncomeReport', 'as'=>'income.submit' ));

Route::get('/accounts/location-balance-sheet/{id?}', array('uses'=>'AccountController@balanceSheet', 'as'=>'balance.bylocations' ));
//PRINTS\\

Route::get('/accounts/location-print-monthly-income/{id?}', array('uses'=>'AccountController@printmonthincomesummary', 'as'=>'income.printlocationsmonthly' ));

Route::get('/accounts/expenditure-categories/{id?}', array('uses'=>'AccountController@expenditureCats', 'as'=>'expenditure.categories' ));
Route::get('/accounts/expenditure-types/{id?}', array('uses'=>'AccountController@expenditureTypes', 'as'=>'expenditure.types' ));


Route::get('/accounts/expenditure/capital/by-locations/{id?}', array('uses'=>'AccountController@loccapex', 'as'=>'expenditure.bylocations.capital' )); //done
Route::get('/accounts/print_locations_capital_expenditure/{id?}', array('uses'=>'AccountController@printloccapex', 'as'=>'expenditure.print-locationsyearcapex' )); //done

Route::get('/accounts/expenditure/location-capex/{id?}', array('uses'=>'AccountController@locmonthlycapexp', 'as'=>'expenditure.locations.capital' ));
Route::get('/accounts/expenditure/location-recurrent/{id?}', array('uses'=>'AccountController@locmonthlyrecurrentexp', 'as'=>'expenditure.locations.recurrent' ));

Route::get('/accounts/expenditure/recurrent/by-locations/{id?}', array('uses'=>'AccountController@locrecurrentex', 'as'=>'expenditure.bylocations.recurrent' ));//done
Route::get('/accounts/yearly-expenditure-by-locations/{id?}', array('uses'=>'AccountController@cummulativeYearExp', 'as'=>'expenditure.locations.yearly' )); //done
Route::get('/accounts/print-locations-year-expenditures/{id?}', array('uses'=>'AccountController@printYearExp', 'as'=>'expenditure.printlocationsyear' )); //done

// Route::get('/accounts/expenditure/recurrent/by-locations/{id?}', array('uses'=>'AccountController@locrecurrentex', 'as'=>'expenditure.bylocations' ));
Route::post('/accounts/expenditure-types/{id?}', array('uses'=>'AccountController@newExpType', 'as'=>'expenditure.types.new' ));
Route::get('/accounts/expenditure/recurrent/{id?}', array('uses'=>'AccountController@recurrentexp', 'as'=>'expenditure.recurrent.location.yearly' )); //done
Route::get('/accounts/expenditure/capital/{id?}', array('uses'=>'AccountController@capexp', 'as'=>'expenditure.capex.location.yearly' ));
Route::post('/accounts/expenditure/submit/{id?}', array('uses'=>'AccountController@submitExpenditure', 'as'=>'expenditure.submit' ));
Route::post('/accounts/expenditure/uncategorised/submit/{id?}', array('uses'=>'AccountController@submitUncatExpenditure', 'as'=>'expenditure.submit.uncategorised' ));

//Disbursement
Route::post('/disbursement/store', array('uses'=>'DisbursementController@create', 'as'=>'disbursement.store' ));

//Expenditure
Route::post('/expenditure/store', array('uses'=>'ExpenditureController@store', 'as'=>'expenditure.store' ));
Route::get('/expenditures/{location_id?}', array('uses'=>'ExpenditureController@getLocationExpenses', 'as'=>'expenditure.getbylocation' ));
Route::get('/expenditure/{id?}', array('uses'=>'ExpenditureController@approve', 'as'=>'expenditure.approve' ));

// ASSET MANAGEMENT\\
Route::get('/asset-management/index/{id?}', array('uses'=>'AccountController@assets', 'as'=>'assets.index' ));
Route::get('/asset-management/delete/{id?}', array('uses'=>'AccountController@assetDelete', 'as'=>'assets.delete' ));
Route::get('/asset-management/location/assets/{id?}', array('uses'=>'AccountController@locassets', 'as'=>'assets.location.index' ));
Route::post('/asset-management/index/{id?}', array('uses'=>'AccountController@newAsset', 'as'=>'assets.new' ));
Route::any('/asset-management/index/edit-data/do-update/{id?}', array('uses'=>'AccountController@editAsset', 'as'=>'assets.one.edit' ));
Route::get('/asset-management/categories/{id?}', array('uses'=>'AccountController@assetcat', 'as'=>'assets.categories.index' ));
Route::post('/asset-management/categories/new/{id?}', array('uses'=>'AccountController@newcat', 'as'=>'assets.categories.new' ));
Route::get('/asset-management/type/{id?}', array('uses'=>'AccountController@assetTypes', 'as'=>'assets.types' ));
Route::post('/asset-management/type/new/{id?}', array('uses'=>'AccountController@newType', 'as'=>'assets.type.new' ));
Route::get('/asset-management/index/{id?}', array('uses'=>'AccountController@assets', 'as'=>'assets.assets' ));

// Account Reconcile\\
Route::get('/accounts/reconcile/{id?}', array('uses'=>'AccountController@accountreconcile', 'as'=>'accounts.reconcile' ));
Route::post('/accounts/reconcile-submit/', array('uses'=>'AccountController@doaccountreconcile', 'as'=>'accounts.do-reconcile' ));



// END ACCOUNT ROUTES\\



// System Preference - Settings.
Route::get('/system/preference/{id?}', array('uses'=>'SystemController@systemPreference', 'as'=>'prefIndex' ));
// System Preference - Settings.
Route::get('/system/audit/logs/{id?}', array('uses'=>'SystemController@logs', 'as'=>'auditLogs' ));
Route::get('/system/db-backup', array('uses'=>'SystemController@dBbackup', 'as'=>'backup' ));


// Ticketing System
Route::get('/system/tickets/{id?}', ['uses'=>'SystemController@tickets', 'as'=>'prefIndex', 'middleware' => ['auth', 'acl'], 'is' => 'maintenance-admin|hr-admin|administrator']);
Route::get('/system/tickets/view/{id?}', array('uses'=>'SystemController@oneTicket', 'as'=>'viewticket' ));
Route::post('/system/tickets/{id?}/assign', array('uses'=>'SystemController@assignTicket', 'as'=>'assignTicket' ));
Route::post('/system/tickets/{id?}/add-stakeholder', array('uses'=>'SystemController@newTicketStakeholder', 'as'=>'newTicketStakeholder' ));
Route::post('/system/tickets/{id?}/process', array('uses'=>'SystemController@processTicket', 'as'=>'processticket' ));
Route::post('/system/tickets/{id?}/close', array('uses'=>'SystemController@closeTicket', 'as'=>'closeTicket' ));
// Route::post('/system/tickets/edit/{id?}', array('uses'=>'SystemController@editTicket', 'as'=>'editticket' ));
Route::get('/system/ticket/new', array('uses'=>'SystemController@newticket', 'as'=>'nticket' ));
Route::post('/system/tickets/new', array('uses'=>'SystemController@createticket', 'as'=>'createticket' ));


// well, the following routes where created by Vikthur(d43m0n_c0d3r)

Route::get('/accounts-reconsilation', 'AccountController@accountReconsilation')->name('accounts-reconsilation');

Route::post('/accounts-reconsilation', 'AccountController@SaveAccReconsilation');

Route::get('/accounts-hq-remitance', 'AccountController@hqRemitance')->name('accounts-hq-remitance');

Route::post('/accounts-hq-remitance', 'AccountController@hqRemitancePaid');

Route::get('/recurrent-disburstments', 'DisburstmentsController@recurrent')->name('recurrent-disburstments');

Route::get('/location-disburstments', 'DisburstmentsController@location')->name('location-disburstments');

Route::post('/location-reconsilation', 'DisburstmentsController@updateLocation');



