<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image">
                @if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' &&
                @file_get_contents('images/user_img/'.Auth::user()['user_img']))
                <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle" alt="">

                @else
                <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="">

                @endif
            </div>
            <div class="info">
                <p>{{ Auth::User()->fname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Online') }}</a>
            </div>
        </div>


        @if(Auth::User()->role == "admin")
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ Nav::isRoute('admin.index') }}">
                <a href="{{route('admin.index')}}" class="item-flex">
                    <i class='bx bxs-dashboard' ></i>
                    <span>{{ __('adminstaticword.Dashboard') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isRoute('user.index') }} {{ Nav::isRoute('user.add') }} {{ Nav::isRoute('user.edit') }}">
                <a href="{{route('user.index')}}" class="item-flex">
                    <i class='bx bx-user' ></i>
                    <span>{{ __('adminstaticword.Users') }}</span>
                </a>
            </li>

            @if(isset($zoom_enable) && $zoom_enable == 1)
            <li class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('meeting.show') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxl-zoom' ></i>
                        <span>{{ __('adminstaticword.ZoomLiveMeetings') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('zoom.setting') }}">
                        <a href="{{route('zoom.setting')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ZoomSettings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}">
                        <a href="{{route('zoom.index')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ZoomDashboard') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('meeting.show') }}">
                        <a href="{{route('meeting.show')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.AllMeetings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            @if(isset($gsetting) && $gsetting->bbl_enable == 1)
            <li class="{{ Nav::isRoute('bbl.setting') }} {{ Nav::isRoute('bbl.all.meeting') }} {{ Nav::isRoute('download.meeting') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-message-square-dots' ></i>
                        <span>{{ __('adminstaticword.BigBlueMeetings') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('bbl.setting') }}">
                        <a href="{{ route('bbl.setting') }}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.BigBlueButtonSettings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('bbl.all.meeting') }}">
                        <a href="{{ route('bbl.all.meeting') }}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ListMeetings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('download.meeting') }}">
                        <a href="{{ route('download.meeting') }}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.MeetingRecordings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            <!-- ======= googlemmet start =============== -->
            @if(isset($gsetting) && $gsetting->googlemeet_enable == 1)
            <li class="{{ Nav::isRoute('googlemeet.setting') }} {{ Nav::isRoute('googlemeet.index') }} {{ Nav::isRoute('googlemeet.allgooglemeeting') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxl-google' ></i>
                        <span>{{ __('Google Meet Meeting') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('googlemeet.setting') }}">
                        <a href="{{route('googlemeet.setting')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('Google Meet Settings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('googlemeet.index') }}">
                        <a href="{{route('googlemeet.index')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('Google Meet Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('googlemeet.allgooglemeeting') }}">
                        <a href="{{route('googlemeet.allgooglemeeting')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.AllMeetings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <!-- ======= googlemeet end ================= -->
            
            <!-- ======= jitsi meeting start =============== -->
            @if(isset($gsetting) && $gsetting->jitsimeet_enable == 1)
            <li class="{{ Nav::isRoute('jitsi.dashboard') }} {{ Nav::isRoute('jitsi.create') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-message-square' ></i>
                        <span>{{ __('Jitsi Meeting') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('jitsi.dashboard') }}">
                        <a href="{{ route('jitsi.dashboard') }}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                </ul>
            <!--</li>-->
            @endif
            <!-- ======= jitsi meeting end ================= -->
            

            
            <li class="{{ Nav::isResource('admin/country') }} {{ Nav::isResource('admin/state') }} {{ Nav::isResource('admin/city') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-map' ></i>
                        <span>{{ __('adminstaticword.Location') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('admin/country') }}">
                        <a href="{{url('admin/country')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Country') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('admin/state') }}">
                        <a href="{{url('admin/state')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.State') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('admin/city') }}">
                        <a href="{{url('admin/city')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.City') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="{{ Nav::isResource('currency') }}">
                <a href="{{url('currency')}}" class="item-flex">
                    <i class='bx bx-coin-stack' ></i>
                    <span>{{ __('adminstaticword.Currency') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::hasSegment('course') }} {{ Nav::isResource('bundle') }} {{ Nav::isResource('courselang') }} {{ Nav::isResource('coursereview') }} {{ Nav::isRoute('assignment.view') }} {{ Nav::isResource('refundpolicy') }} {{ Nav::isResource('batch') }} {{ Nav::isRoute('quiz.review') }} {{ Nav::isRoute('list.assignment') }} {{ Nav::hasSegment('courseinclude') }} {{ Nav::hasSegment('whatlearns') }} {{ Nav::hasSegment('coursechapter') }} {{ Nav::hasSegment('courseclass') }} {{ Nav::hasSegment('relatedcourse') }} {{ Nav::hasSegment('questionanswer') }} {{ Nav::hasSegment('announsment') }} {{ Nav::isRoute('show.quizreport') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-book' ></i>
                        <span>{{ __('adminstaticword.Course') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} treeview">
                        <a href="#" class="flex-between">
                            <div class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.Category') }}</span>
                            </div>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        
                        <ul class="treeview-menu">
                            <li class="{{ Nav::hasSegment('category') }}">
                                <a href="{{url('category')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.Category') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::hasSegment('subcategory') }}">
                                <a href="{{url('subcategory')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.SubCategory') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::hasSegment('childcategory') }}">
                                <a href="{{url('childcategory')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.ChildCategory') }}</span>
                                </a>
                            </li>
                        </ul>

                        <li class="{{ Nav::hasSegment('course') }} {{ Nav::hasSegment('courseinclude') }} {{ Nav::hasSegment('whatlearns') }} {{ Nav::hasSegment('coursechapter') }} {{ Nav::hasSegment('courseclass') }} {{ Nav::hasSegment('relatedcourse') }} {{ Nav::hasSegment('questionanswer') }} {{ Nav::hasSegment('announsment') }}  {{ Nav::isRoute('show.quizreport') }}">
                            <a href="{{url('course')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.Courses') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ Nav::isResource('bundle') }}">
                            <a href="{{url('bundle')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.BundleCourse') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ Nav::isResource('courselang') }}">
                            <a href="{{url('courselang')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.CourseLanguage') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ Nav::isResource('coursereview') }}">
                            <a href="{{url('coursereview')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.CourseReview') }}</span>
                            </a>
                        </li>
                        
                        @if($gsetting->assignment_enable == 1)
                        <li class="{{ Nav::isRoute('assignment.view') }} {{ Nav::isRoute('list.assignment') }}">
                            <a href="{{route('assignment.view')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.Assignment') }}</span>
                            </a>
                        </li>
                        @endif
                        
                        <li class="{{ Nav::isResource('refundpolicy') }}">
                            <a href="{{url('refundpolicy')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.RefundPolicy') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ Nav::isResource('batch') }}">
                            <a href="{{url('batch')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.Batch') }}</span>
                            </a>
                        </li>
                        
                        <li class="{{ Nav::isRoute('quiz.review') }}">
                            <a href="{{route('quiz.review')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.QuizReview') }}</span>
                            </a>
                        </li>
                    </li>
                </ul>
            <li>

            <li class="{{ Nav::isResource('book-categories') }} {{ Nav::isResource('book-sub-categories') }} {{ Nav::isResource('book-child-categories') }} {{ Nav::isResource('books') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-book' ></i>
                        <span>{{ __('adminstaticword.Books') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('book-categories') }} {{ Nav::isResource('book-sub-categories') }} {{ Nav::isResource('book-child-categories') }} treeview">
                        <a href="#" class="flex-between">
                            <div class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.BookCategories') }}</span>
                            </div>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        
                        <ul class="treeview-menu">
                            <li class="{{ Nav::isResource('book-categories') }}">
                                <a href="{{url('book-categories')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.BookCategories') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::isResource('book-sub-categories') }}">
                                <a href="{{url('book-sub-categories')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.BookSubCategories') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::isResource('book-child-categories') }}">
                                <a href="{{url('book-child-categories')}}" class="item-flex">
                                    <i class='bx bx-chevron-left' ></i>
                                    <span>{{ __('adminstaticword.BookChildCategories') }}</span>
                                </a>
                            </li>
                        </ul>

                        <li class="{{ Nav::isResource('books') }}">
                            <a href="{{url('books')}}" class="item-flex">
                                <i class='bx bx-chevron-left' ></i>
                                <span>{{ __('adminstaticword.Books') }}</span>
                            </a>
                        </li>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isRoute('paths.subjects') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-chalkboard' ></i>
                        <span>{{ __('adminstaticword.Paths') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('paths.subjects') }}">
                        <a href="{{route('paths.subjects')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Subjects') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        
            @if(isset($gsetting) && $gsetting->attandance_enable == 1)
            <li class="{{ Nav::isResource('attandance') }} {{ Nav::isRoute('enrolled.users') }}">
                <a href="{{url('attandance')}}" class="item-flex">
                    <i class='bx bx-user-check' ></i>
                    <span>{{ __('adminstaticword.Attandance') }}</span>
                </a>
            </li>
            @endif

            <li class="{{ Nav::isRoute('onesignal.settings') }}">
                <a href="{{route('onesignal.settings')}}" class="item-flex">
                    <i class='bx bx-bell' ></i>
                    <span>{{ __('adminstaticword.PushNotification') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isRoute('allrequestinvolve') }} {{ Nav::isRoute('involve.request.index') }} {{ Nav::isRoute('involve.request') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-chalkboard' ></i>
                        <span>{{ __('adminstaticword.MultipleInstructor') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('allrequestinvolve') }}">
                        <a href="{{route('allrequestinvolve')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.RequestToInvolve') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('involve.request.index') }}">
                        <a href="{{route('involve.request.index')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.InvolvementRequests') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('involve.request') }}">
                        <a href="{{route('involve.request')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.InvolvedInCourse') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isResource('coupon') }}">
                <a href="{{url('coupon')}}" class="item-flex">
                    <i class='bx bxs-coupon' ></i>
                    <span>{{ __('adminstaticword.Coupon') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isRoute('all.instructor') }} {{ Nav::isResource('requestinstructor') }} {{ Nav::isResource('subscription/plan') }} {{ Nav::isResource('orders/subscription') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxs-user-badge' ></i>
                        <span>{{ __('adminstaticword.Instructors') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($gsetting->plan_enable == 1)
                    <li class="{{ Nav::isResource('subscription/plan') }}">
                        <a href="{{url('subscription/plan')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.InstructorPlan') }}</span>
                        </a>
                    </li>
                    
                    <li class="{{ Nav::isResource('orders/subscription') }}">
                        <a href="{{url('orders/subscription')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.SubscribedInstructors') }}</span>
                        </a>
                    </li>
                    
                    @endif
                    
                    <li class="{{ Nav::isRoute('all.instructor') }}">
                        <a href="{{route('all.instructor')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.AllInstructor') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('requestinstructor') }}">
                        <a href="{{url('requestinstructor')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.InstructorRequest') }}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Nav::hasSegment('order') }}">
                <a href="{{url('order')}}" class="item-flex">
                    <i class='bx bx-cart' ></i>
                    <span>{{ __('adminstaticword.Order') }}</span>
                </a>
            </li>

            <li class="{{ Nav::hasSegment('refundorder') }}">
                <a href="{{url('refundorder')}}" class="item-flex">
                    <i class='bx bx-money' ></i>
                    <span>{{ __('adminstaticword.RefundOrder') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isResource('page') }}">
                <a href="{{url('page')}}" class="item-flex">
                    <i class='bx bx-file' ></i>
                    <span>{{ __('adminstaticword.Pages') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isResource('faq') }} {{ Nav::isResource('faqinstructor') }}  treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-conversation' ></i>
                        <span>{{ __('adminstaticword.Faq') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::hasSegment('faq') }}">
                        <a href="{{url('faq')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.FaqStudent') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('faqinstructor') }}">
                        <a href="{{url('faqinstructor')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.FaqInstructor') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isRoute('instructor.settings') }} {{ Nav::isRoute('admin.instructor') }} {{ Nav::isRoute('admin.bending') }} {{ Nav::isRoute('admin.completed') }} {{ Nav::isRoute('admin.pending') }} {{ Nav::isRoute('admin.paid') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-dollar-circle' ></i>
                        <span>{{ __('adminstaticword.InstructorPayout') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('instructor.settings') }}">
                        <a href="{{route('instructor.settings')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.PayoutSettings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('admin.instructor') }} {{ Nav::isRoute('admin.pending') }} {{ Nav::isRoute('admin.paid') }}">
                        <a href="{{route('admin.instructor')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.PendingPayout') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('admin.completed') }}">
                        <a href="{{route('admin.completed')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.CompletedPayout') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isResource('user/course/report') }} {{ Nav::isResource('user/question/report') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxs-flag-alt' ></i>
                        <span>{{ __('adminstaticword.Report') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('user/course/report') }}">
                        <a href="{{url('user/course/report')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Report') }} Course</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('user/question/report') }}">
                        <a href="{{url('user/question/report')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Report') }} Question</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isResource('slider') }} {{ Nav::isResource('facts') }} {{ Nav::isRoute('category.slider') }} {{ Nav::isResource('getstarted') }} {{ Nav::isResource('trusted') }} {{ Nav::isRoute('widget.setting') }} {{ Nav::isRoute('terms') }} {{ Nav::isResource('testimonial') }} {{ Nav::isResource('social_link') }} {{ Nav::isResource('advertisement') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-devices' ></i>
                        <span>{{ __('adminstaticword.FrontSetting') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('slider') }}">
                        <a href="{{url('slider')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Slider') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('facts') }}">
                        <a href="{{url('facts')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.FactsSlider') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('category.slider') }}">
                        <a href="{{route('category.slider')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.CategorySlider') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('getstarted') }}">
                        <a href="{{url('getstarted')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.GetStarted') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('trusted') }}">
                        <a href="{{url('trusted')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.TrustedSlider') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('widget.setting') }}">
                        <a href="{{route('widget.setting')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.WidgetSetting') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('testimonial') }}">
                        <a href="{{url('testimonial')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Testimonial') }}</span>
                        </a>
                    </li>

                    <li class="{{ Nav::isResource('social_link') }}">
                        <a href="{{url('social_link')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.SocialLink') }}</span>
                        </a>
                    </li>

                    {{--<li class="{{ Nav::isResource('advertisement') }}">
                        <a href="{{url('advertisement')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Advertisement') }}</span>
                        </a>
                    </li>--}}
                </ul>
            </li>

            <li class="{{ Nav::isRoute('gen.set') }} {{ Nav::isRoute('api.setApiView') }} {{ Nav::isResource('blog') }} {{ Nav::isRoute('about.page') }} {{ Nav::isRoute('careers.page') }} {{ Nav::isRoute('comingsoon.page') }} {{ Nav::isRoute('termscondition') }} {{ Nav::isRoute('policy') }} {{ Nav::isRoute('bank.transfer') }} {{ Nav::isRoute('show.pwa') }} {{ Nav::isRoute('adsense') }} {{ Nav::isRoute('ipblock.view') }} {{ Nav::isRoute('whatsapp.button') }} {{ Nav::isRoute('coloroption.view') }} {{ Nav::isResource('manualpayment') }} {{ Nav::isRoute('twilio.settings') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-cog' ></i>
                        <span>{{ __('adminstaticword.SiteSetting') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('gen.set') }}">
                        <a href="{{route('gen.set')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Setting') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('api.setApiView') }}">
                        <a href="{{route('api.setApiView')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.APISetting') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('blog') }}">
                        <a href="{{url('blog')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Blog') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('about.page') }}">
                        <a href="{{route('about.page')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.About') }}</span>
                        </a>
                    </li>
                    {{--<li class="{{ Nav::isRoute('careers.page') }}">
                        <a href="{{route('careers.page')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Career') }}</span>
                        </a>
                    </li>--}}
                    <li class="{{ Nav::isRoute('comingsoon.page') }}">
                        <a href="{{route('comingsoon.page')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ComingSoon') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('termscondition') }}">
                        <a href="{{route('termscondition')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Terms&Condition') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('policy') }}">
                        <a href="{{route('policy')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i> 
                            <span>{{ __('adminstaticword.PrivacyPolicy') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('bank.transfer') }}">
                        <a href="{{route('bank.transfer')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.BankDetails') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('show.pwa') }}">
                        <a href="{{route('show.pwa')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.PWASetting') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('adsense') }}">
                        <a href="{{url('/admin/adsensesetting')}}" class="item-flex" title="Adsense Setting">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.AdsenseSetting') }}</span>
                        </a>
                    </li>

                    @if(isset($gsetting) && $gsetting->ipblock_enable == 1)
                    <li class="{{ Nav::isRoute('ipblock.view') }}">
                        <a href="{{url('admin/ipblock')}}" class="item-flex" title="IPBlock Setting">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.IPBlockSettings') }}</span>
                        </a>
                    </li>
                    @endif

                    <li class="{{ Nav::isRoute('whatsapp.button') }}">
                        <a href="{{route('whatsapp.button')}}" class="item-flex" title="Whatsapp Button Setting">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.WhatsappButtonSetting') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('coloroption.view') }}">
                        <a href="{{url('admin/coloroption')}}" class="item-flex" title="Color Options">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ColorSettings') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isResource('manualpayment') }}">
                        <a href="{{url('manualpayment')}}" class="item-flex" title="Manual Payment Gateway">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ManualPaymentGateway') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('twilio.settings') }}">
                        <a href="{{route('twilio.settings')}}" class="item-flex" title="Twilio Settings">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.TwilioSettings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isRoute('player.set') }} {{ Nav::isRoute('ads') }} {{ Nav::isRoute('ad.setting') }} {{ Nav::isRoute('ad.create') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxs-videos' ></i>
                        <span>{{ __('adminstaticword.PlayerSettings') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('player.set') }}">
                        <a href="{{route('player.set')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.PlayerCustomization') }}</span>
                        </a>
                    </li>

                    <li class="{{ Nav::isRoute('ads') }} {{ Nav::isRoute('ad.create') }}">
                        <a href="{{url('admin/ads')}}" class="item-flex" title="Create ad">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.Advertise') }}</span>
                        </a>
                    </li>
                    @php $ads = App\Ads::all(); @endphp
                    @if($ads->count()>0)
                    <li class="{{ Nav::isRoute('ad.setting') }}">
                        <a href="{{url('admin/ads/setting')}}" class="item-flex" title="Ad Settings">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.AdvertiseSettings') }}</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </li>

            <li class="{{ Nav::isRoute('show.lang') }} {{ Nav::isRoute('languages.create') }} {{ Nav::isRoute('languages.edit') }} {{Nav::isRoute('adminstatic.lang')}} {{ Nav::isRoute('flashmsg.lang') }} {{ Nav::isRoute('frontstatic.lang') }}">
                <a href="{{route('show.lang')}}" class="item-flex">
                    <i class='bx bx-globe' ></i>
                    <span>{{ __('adminstaticword.Language') }}</span>
                </a>
            </li>
            <li class="{{ Nav::isResource('usermessage') }}">
                <a href="{{url('usermessage')}}" class="item-flex">
                    <i class='bx bx-envelope' ></i>
                    <span>{{ __('adminstaticword.ContactUs') }}</span>
                </a>
            </li>
            @if(isset($gsetting) && $gsetting->activity_enable == '1')
            <li class="{{ Nav::isRoute('activity.index') }}">
                <a href="{{route('activity.index')}}" class="item-flex">
                    <i class='bx bx-spreadsheet' ></i>
                    <span>{{ __('adminstaticword.ActivityLog') }}</span>
                </a>
            </li>
            @endif
            {{--<li class="{{ Nav::isRoute('show.sitemap') }}">
                <a href="{{route('show.sitemap')}}" class="item-flex">
                    <i class='bx bx-sitemap' ></i>
                    <span>{{ __('adminstaticword.SiteMap') }}</span>
                </a>
            </li>--}}

            {{--<li class="{{ Nav::isRoute('get.api.key') }}">
                <a href="{{route('get.api.key')}}" class="item-flex">
                    <i class='bx bxs-key' ></i>
                    <span>{{ __('adminstaticword.GetAPIKeys') }}</span>
                </a>
            </li>--}}

            {{--<li class="{{ Nav::isRoute('import.view') }} {{ Nav::isRoute('database.backup') }} {{ Nav::isRoute('update.process') }} {{ Nav::isRoute('quick.update') }}  {{ Nav::isRoute('remove.public') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-help-circle' ></i>
                        <span>{{ __('adminstaticword.Help&Support') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('import.view') }}">
                        <a href="{{route('import.view')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.ImportDemo') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('database.backup') }}">
                        <a href="{{route('database.backup')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.DatabaseBackup') }}</span>
                        </a>
                    </li>
                     <li class="{{ Nav::isRoute('update.process') }}">
                        <a href="{{route('update.process')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.UpdateProcess') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('quick.update') }}">
                        <a href="{{route('quick.update')}}" class="item-flex">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.QuickUpdate') }}</span>
                        </a>
                    </li> 
                    <li class="{{ Nav::isRoute('remove.public') }}">
                        <a href="{{route('remove.public')}}" class="item-flex" title="Remove Public">
                            <i class='bx bx-chevron-left' ></i>
                            <span>{{ __('adminstaticword.RemovePublic') }}</span>
                        </a>
                    </li>
                </ul>
            </li>--}}

            {{--<li class="{{ Nav::isResource('directory') }}">
                <a href="{{url('directory')}}" class="item-flex">
                    <i class='bx bx-search' ></i>
                    <span>{{ __('adminstaticword.Seo') }} {{ __('adminstaticword.Directory') }}</span>
                </a>
            </li>--}}

            {{--<li class="{{ Nav::isRoute('clear-cache') }}">
                <a href="{{url('clear-cache')}}" class="item-flex">
                    <i class='bx bxs-brush' ></i>
                    <span>{{ __('adminstaticword.ClearCache') }}</span>
                </a>
            </li>--}}
        </ul>
        @endif


    </section>
    <!-- /.sidebar -->
</aside>