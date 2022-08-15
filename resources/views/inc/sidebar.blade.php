      <!--  BEGIN SIDEBAR  -->
      <div class="sidebar-wrapper sidebar-theme">
        @if($category_name != null)
        <nav id="sidebar">
            <div class="profile-info">
                <figure class="user-cover-image"></figure>
                    <img src="{{ asset('assets/img/logo.png') }}" style=" margin-right: auto;height: 100px;width: 100%;margin-top: -28%;" alt="image">
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                
            <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                <a href="{{ url('/home') }}"
                    aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="home"></i>
                        <span>Admin Dashboard</span>
                    </div>
                </a>
            </li>
                
                {{-- Equity --}}
                <li class="menu {{ ($category_name === 'equity') ? 'active' : '' }}" >

                    <a href="#equity" data-toggle="collapse" aria-expanded="{{ ($category_name === 'equity') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Equity</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'equity') ? 'show' : '' }}" id="equity" data-parent="#accordionExample">
                        <li class="{{($page_name === 'create_equity') ? 'active' : '' }}">
                            <a href="{{url('/equity/create')}}"> Add Equity </a>
                        </li>
                        <li class="{{($page_name === 'manage_equity') ? 'active' : '' }}">
                            <a href="{{url('/manage/equity')}}"> Manage Equity </a>
                        </li>
                        <li class="{{($page_name === 'create_partner') ? 'active' : '' }}">
                            <a href="{{url('/partner/create')}}"> Add Partner Account </a>
                        </li>
                        <li class="{{($page_name === 'manage_partners') ? 'active' : '' }}">
                            <a href="{{url('/manage/partners')}}"> Manage Partner Account </a>
                        </li>
                    </ul>
                </li>
                
                {{-- End Equity --}}
                {{-- Employee --}}
                    <li class="menu {{ ($category_name === 'employee') ? 'active' : '' }}" >

                    <a href="#dashboard" data-toggle="collapse" aria-expanded="{{ ($category_name === 'employee') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Employee</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'employee') ? 'show' : '' }}" id="dashboard" data-parent="#accordionExample">
                        {{-- <li class="{{ ($page_name === 'create_employee') ? 'active' : '' }}">
                            <a href="{{url("/employee/create")}}">Add Employee </a>
                        </li> --}}
                        <li class="{{ ($page_name === 'manage_employee') ? 'active' : '' }}">
                            <a href="{{url('/manage/employee')}}">Manage Employee </a>
                        </li>
                        <li class="{{ ($page_name === 'manage_employee_attendance') ? 'active' : '' }}">
                            <a href="{{url('/manage/employee_attendance')}}">Employee Attendance </a>
                        </li>
                        <li class="{{ ($page_name === 'manage_employee_attendancereport') ? 'active' : '' }}">
                            <a href="{{url('/manage/employee_attendancereport')}}">Attendance Report</a>
                        </li>
                        <li class="{{($page_name === 'manage_employee_salaries') ? 'active' : '' }}">
                            <a href="{{url("/manage/employee_salary")}}">Pay Employee </a>
                        </li>
                        <li class="{{($page_name === 'manage_salaries_record') ? 'active' : '' }}">
                            <a href="{{url("/manage/salary_record")}}">Salary Records </a>
                        </li>
                    </ul>
                </li>
                {{-- End Employee --}}

                {{-- Project --}}
                <li class="menu {{ ($category_name === 'project') ? 'active' : '' }}">
                    <a href="#project" data-toggle="collapse" aria-expanded="{{ ($category_name === 'project') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Project</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'project') ? 'show' : '' }}" id="project" data-parent="#accordionExample">
                        <li class="{{($page_name === 'create_project') ? 'active' : '' }}">
                            <a href="{{url("/project/create")}}">Add Project </a>
                        </li>
                        <li class="{{($page_name === 'manage_project') ? 'active' : '' }}">
                            <a href="{{url("/manage/project")}}">Manage Project </a>
                        </li>
                    </ul>
                </li>

                
                {{-- End Project --}}
                {{-- Contractor --}}
                <li class="menu {{ ($category_name === 'contractor') ? 'active' : '' }}">
                    <a href="#contractor" data-toggle="collapse" aria-expanded="{{ ($category_name === 'contractor') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Contractor</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'contractor') ? 'show' : '' }}" id="contractor" data-parent="#accordionExample">
                        <li class="{{($page_name === 'create_contractor') ? 'active' : '' }}">
                            <a href="{{url("/contractor/create")}}">Add Contractor </a>
                        </li>
                        <li class="{{($page_name === 'manage_contractor') ? 'active' : '' }}">
                            <a href="{{url("/manage/contractor")}}">Manage Contractor </a>
                        </li>
                        <li class="{{($page_name === 'manage_contractorpayment') ? 'active' : '' }}">
                            <a href="{{url("/manage/contractorpay")}}">Contractor Payments </a>
                        </li>
                        
                        
                    </ul>
                </li>

                {{-- End Contractor --}}

                {{-- Material --}}
                <li class="menu {{ ($category_name === 'material') ? 'active' : '' }}">
                    <a href="#material" data-toggle="collapse" aria-expanded="{{ ($category_name === 'material') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Purchases</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'material') ? 'show' : '' }}" id="material" data-parent="#accordionExample">
                        <li class="{{($page_name === 'manage_material_order') ? 'active' : '' }}">
                            <a href="{{url("/manage/materialorder")}}">Material Purchases </a>
                        </li>
                        <li class="{{($page_name === 'manage_purchases') ? 'active' : '' }}">
                            <a href="{{url("/manage/purchases")}}">Other Purchases </a>
                        </li>
                        {{-- <li class="{{($page_name === 'create_material') ? 'active' : '' }}">
                            <a href="{{url("/material/create")}}">Add Material Type </a>
                        </li> --}}
                        <li class="{{($page_name === 'manage_material') ? 'active' : '' }}">
                            <a href="{{url("/manage/material")}}">Manage Material Type </a>
                        </li>
                        
                    </ul>
                </li>

                {{-- End Material --}}

                {{-- Supplier--}}
                <li class="menu {{ ($category_name === 'smaterial') ? 'active' : '' }}">
                    <a href="#supplier" data-toggle="collapse" aria-expanded="{{ ($category_name === 'smaterial') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Supplier</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'smaterial') ? 'show' : '' }}" id="supplier" data-parent="#accordionExample">
                        {{-- <li class="{{($page_name === 'create_supplier') ? 'active' : '' }}">
                            <a href="{{url("/supplier/create")}}">Add Supplier </a>
                        </li> --}}
                        <li class="{{($page_name === 'manage_supplier') ? 'active' : '' }}">
                            <a href="{{url("/manage/supplier")}}">Manage Supplier </a>
                        </li>
                        <li class="{{($page_name === 'manage_supplier_payments') ? 'active' : '' }}">
                            <a href="{{url("/manage/supplierpay")}}">Supplier Payments </a>
                        </li>
                    </ul>
                </li>

                {{-- End Supplier --}}


                                {{-- Booking Form--}}
                                <li class="menu {{ ($category_name === 'booking_form') ? 'active' : '' }}">
                                    <a href="#booking" data-toggle="collapse" aria-expanded="{{ ($category_name === 'booking_form') ? 'true' : 'false' }}" class="dropdown-toggle">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            <span>Booking Form</span>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                        </div>
                                    </a>
                                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'booking_form') ? 'show' : '' }}" id="booking" data-parent="#accordionExample">
                                        <li class="{{($page_name === 'manage_client') ? 'active' : '' }}">
                                            <a href="{{url("/manage/client")}}">Manage Client </a>
                                        </li>
                                        <li class="{{($page_name === 'create_booking') ? 'active' : '' }}">
                                            <a href="{{url("/booking/create")}}">Booking Form </a>
                                        </li>
                                        <li class="{{($page_name === 'manage_bookings') ? 'active' : '' }}">
                                            <a href="{{url("/manage/booking")}}">Manage Bookings </a>
                                        </li>
                                    </ul>
                                </li>
                
                                {{-- End Booking Form --}}

                {{-- Accounts --}}
                <li class="menu {{ ($category_name === 'accounts') ? 'active' : '' }}">
                    <a href="#accounts" data-toggle="collapse" aria-expanded="{{ ($category_name === 'accounts') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Accounts</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'accounts') ? 'show' : '' }}" id="accounts" data-parent="#accordionExample">
                        <li class="{{($page_name === 'manage_chartaccount') ? 'active' : '' }}">
                            <a href="{{url("/manage/chartaccount")}}">Account Payable </a>
                        </li>
                        <li class="{{($page_name === 'create_chartaccount') ? 'active' : '' }}">
                            <a href="{{url("/chartaccount/create")}}">Add Account Category</a>
                        </li>
                    </ul>
                </li>
            {{-- Accounts closed --}}
            {{-- Trash Box --}}
            <li class="menu {{ ($category_name === 'trashbox') ? 'active' : '' }}">
                <a href="#trashbox" data-toggle="collapse" aria-expanded="{{ ($category_name === 'trashbox') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Trash Box</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'trashbox') ? 'show' : '' }}" id="trashbox" data-parent="#accordionExample">
                    <li class="{{($page_name === 'trashproject') ? 'active' : '' }}">
                        <a href="{{url("/manage/trashproject")}}">Project </a>
                    </li>
                    <li class="{{($page_name === 'trash_supplier') ? 'active' : '' }}">
                        <a href="{{url("/manage/trashsupplier")}}">Supplier </a>
                    </li>
                    <li class="{{($page_name === 'trash_contractor') ? 'active' : '' }}">
                        <a href="{{url("/manage/trashcontractor")}}">Contractor </a>
                    </li>
                    <li class="{{($page_name === 'trash_employee') ? 'active' : '' }}">
                        <a href="{{url("/manage/trashemployee")}}">Employee </a>
                    </li>
                </ul>
            </li>
            {{-- Trash Box End --}}
            </ul>
        </nav>
        @endif
    </div>
    <!--  END SIDEBAR  -->