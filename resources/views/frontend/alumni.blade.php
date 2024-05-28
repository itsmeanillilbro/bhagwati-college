@extends ('frontend.layouts.main')
@section ('main-container')
        
        <!-- Breadcrumb Start -->
        <div class="all-title-box">
            <div class="container text-center">
                <h1>Alumni<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="{{url('/alumni')}}">Alumni</a></span></h1>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <section class="alumni-page">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Job Placement
                </div>
                <div class="tools">
                    <a href="#" class="collapse"></a><a href="#portlet-config" data-toggle="modal" class="config"></a><a
                        href="#" class="reload"></a><a href="#" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action=""
                    data-recaptcha-sitekey="6LdC6mkpAAAAAISP2nUArcGorRZgCznPCysxMxfM">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Office :</label>
                            <div class="col-md-10">
                                <div class="input-group" style="width: 100%;">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input name="OfficeName" type="text" id="MainContent_txtOfficeName" class="form-control"
                                        placeholder="Enter Name of Office" required>
                                </div>
                                <label for="MainContent_txtOfficeName" class="error" style="display: none;">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Designation :</label>
                            <div class="col-md-10">
                                <div class="input-group" style="width: 100%;">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="Designation" type="text" id="MainContent_txtDesignation"
                                        class="form-control" placeholder="Enter Your Designation" required>
                                </div>
                                <label for="MainContent_txtDesignation" class="error" style="display: none;">
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="datepicker">
    
                            <label class="col-md-2 control-label">
                                Appoint Date :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="AppointDate" type="date" id="dateAD"
                                        class="form-control hasDatepicker" placeholder="Enter Date of Your Appointment "
                                        onchange="ChangeDate(this.value,'n',this);">
                                </div>
                                <label for="MainContent_txtAppointDate" class="error" style="display: none;">
                                </label>
                            </div>
                            <label class="col-md-2 control-label">
                                Miti :</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="AppointDate_Nep" type="text" id="np-datepicker"
                                        class="form-control is-calendarsPicker" placeholder="Enter Appointed Miti">
                                </div>
                                
                            </div>
    
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Terminate Date :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="TerminateDate" type="date" id="MainContent_txtTerminateDate"
                                        class="form-control hasDatepicker" placeholder="Enter Date of Your Termination"
                                        onchange="ChangeDate(this.value,'n',this);">
                                </div>
                                <label for="MainContent_txtTerminateDate" class="error" style="display: none;">
                                </label>
                            </div>
                            <label class="col-md-2 control-label">
                                Miti :</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="TerminateDate_Nep" type="text" id="nepali-datepicker"
                                        class="form-control is-calendarsPicker" placeholder="Enter Terminated Miti">
                                </div>
                                <label for="MainContent_txtTerminateDate_Nep" class="error" style="display: none;">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Organization Type :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <select name="OrganizationType" id="MainContent_dropdownOrganizationType"
                                        class="form-control">
                                        <option value="Private">Private</option>
                                        <option value="Public">Public</option>
                                        <option value="NGO/INGO">NGO/INGO</option>
                                        <option value="Government">Government</option>
                                        <option value="Abroad">Abroad</option>
                                    </select>
                                </div>
                            </div>
                            <label class="col-md-2 control-label">
                                Work Type :</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <select name="WorkType" id="MainContent_dropdownWorkType" class="form-control">
                                        <option value="Teaching">Teaching</option>
                                        <option value="Business and Finance">Business and Finance</option>
                                        <option value="Administration">Administration</option>
                                        <option value="Other">Other</option>
    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Is in Study :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                    <select name="IsinStudy" id="MainContent_dropdownIsinStudy" class="form-control">
                                        <option selected="selected" value="yes">Yes</option>
                                        <option value="no">NO</option>
    
                                    </select>
                                </div>
                            </div>
                            <label class="col-md-2 control-label">
                                Satisfaction Level :</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <select name="SatisfactionLevel" id="MainContent_dropdownSatisfactionLevel"
                                        class="form-control">
                                        <option selected="selected" value="">-- Select --</option>
                                        <option value="Satisfied">Satisfied</option>
                                        <option value="Unsatisfied">Unsatisfied</option>
                                        <option value="UnKnown">UnKnown</option>
    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                Other Involvement :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select name="otherActivities" id="MainContent_dropdownInvolvedinotherActivities"
                                        class="form-control">
                                        <option selected="selected" value="yes">Yes</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div>
                            </div>
                            <!-- </div>
                        <div class="form-group"> -->
                            <label class="col-md-2 control-label">
                                Verify Captcha :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="g-recaptcha" data-sitekey="6Leln2opAAAAAOCMeBNmO0-GOsJHfBkbHMMPle1h"></div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" name="btnSubmitjob" value="Submit" id="MainContent_btnSubmit"
                                        class="btn purple" style="color: #fff;">
                                    <input type="reset" name="" value="Cancel" id="MainContent_btnCancel"
                                        class="btn default" style="color: #fff;">
                                    <input type="button" name="ctl00$MainContent$btnBackToStudentInfo" value="Back"
                                        onclick="go_back()" id="MainContent_btnBackToStudentInfo" class="btn blue"
                                        style="color: #fff;">
                                </div>
                            </div>
                        </center>
                </form>
            </div>
            <div class="tab-pane fade" id="tab_1_2">
                <div id="MainContent_listData"></div>
            </div>
        </section>
        @endsection