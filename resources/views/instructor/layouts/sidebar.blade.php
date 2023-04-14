<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
                <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle" alt="User Image">

                @else
                <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="User Image">

                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::User()->fname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Instructor') }}</a>
            </div>
        </div>


        @if(Auth::User()->role == "instructor")
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Nav::isRoute('instructor.index') }}">
                <a href="{{route('instructor.index')}}" class="item-flex">
                    <i class='bx bxs-dashboard'></i>
                    <span>{{ __('adminstaticword.Dashboard') }}</span>
                </a>
            </li>

            <li
                class="{{ Nav::isRoute('assignment.view') }} {{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-book'></i>
                        <span>{{ __('adminstaticword.Course') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li
                        class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} treeview">

                        @if($gsetting->cat_enable == 1)
                        <a href="#" class="flex-between">
                            <div class="item-flex">
                                <i class='bx bx-chevron-left'></i>
                                <span>{{ __('adminstaticword.Category') }}</span>
                            </div>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                            <li class="{{ Nav::isResource('category') }}">
                                <a href="{{url('category')}}" class="item-flex">
                                    <i class='bx bx-chevron-left'></i>
                                    <span>{{ __('adminstaticword.Category') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::isResource('subcategory') }}">
                                <a href="{{url('subcategory')}}" class="item-flex">
                                    <i class='bx bx-chevron-left'></i>
                                    <span>{{ __('adminstaticword.SubCategory') }}</span>
                                </a>
                            </li>
                            <li class="{{ Nav::isResource('childcategory') }}">
                                <a href="{{url('childcategory')}}" class="item-flex">
                                    <i class='bx bx-chevron-left'></i>
                                    <span>{{ __('adminstaticword.ChildCategory') }}</span>
                                </a>
                            </li>
                        </ul>
                        @endif


                        <li class="{{ Nav::hasSegment('course') }}">
                            <a href="{{url('course')}}" class="item-flex">
                                <i class='bx bx-chevron-left'></i>
                                <span>{{ __('adminstaticword.Course') }}</span>
                            </a>
                        </li>


                        <li class="{{ Nav::isRoute('courses.reject') }}">
                            <a href="{{route('courses.reject')}}" class="item-flex">
                                <i class='bx bx-chevron-left'></i>
                                <span>{{ __('adminstaticword.RejectedCourses') }}</span>
                            </a>
                        </li>

                        <li class="{{ Nav::isResource('courselang') }}">
                            <a href="{{url('courselang')}}" class="item-flex">
                                <i class='bx bx-chevron-left'></i>
                                <span>{{ __('adminstaticword.Course') }} {{ __('adminstaticword.Language') }}</span>
                            </a>
                        </li>

                        @if($gsetting->assignment_enable == 1)
                        <li class="{{ Nav::isRoute('assignment.view') }}">
                            <a href="{{route('assignment.view')}}" class="item-flex">
                                <i class='bx bx-chevron-left'></i>
                                <span>{{ __('adminstaticword.Assignment') }}</span>
                            </a>
                        </li>
                        @endif

                    </li>
                </ul>
            </li>


            <li
                class="{{ Nav::isRoute('allrequestinvolve') }} {{ Nav::isRoute('involve.request.index') }} {{ Nav::isRoute('involve.request') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-chalkboard'></i>
                        <span>{{ __('adminstaticword.MultipleInstructor') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('allrequestinvolve') }}">
                        <a href="{{route('allrequestinvolve')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.RequestToInvolve') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('involve.request.index') }}">
                        <a href="{{route('involve.request.index')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.InvolvementRequests') }}</span>
                        </a>
                    </li>
                    <li class="{{ Nav::isRoute('involve.request') }}">
                        <a href="{{route('involve.request')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.InvolvedInCourse') }}</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="{{ Nav::isResource('userenroll') }}">
                <a href="{{url('userenroll')}}" class="item-flex">
                    <i class='bx bx-user'></i>
                    <span> {{ __('adminstaticword.User') }} {{ __('adminstaticword.Enrolled') }}</span>
                </a>
            </li>


            <li class="{{ Nav::isResource('instructorquestion') }} {{ Nav::isResource('instructoranswer') }} treeview">
                <a href="#">
                    <div class="item-flex">
                        <i class='bx bx-conversation'></i>
                        <span>{{ __('adminstaticword.Question') }} / {{ __('adminstaticword.Answer') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Nav::isResource('instructorquestion') }}">
                        <a href="{{url('instructorquestion')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.Question') }}</span>
                        </a>
                    </li>

                    <li class="{{ Nav::isResource('instructoranswer') }}">
                        <a href="{{url('instructoranswer')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.Answer') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Nav::isResource('instructor/announcement') }}">
                <a href="{{url('instructor/announcement')}}" class="item-flex">
                    <i class='bx bxs-megaphone'></i>
                    <span>{{ __('adminstaticword.Announcement') }}</span>
                </a>
            </li>

            <li class="{{ Nav::isResource('blog') }}">
                <a href="{{url('blog')}}" class="item-flex">
                    <i class='bx bx-book-content'></i>
                    <span>{{ __('adminstaticword.Blog') }}</span>
                </a>
            </li>



            @if(isset($gsetting->feature_amount))
            <li class="{{ Nav::isResource('featurecourse') }}">
                <a href="{{url('featurecourse')}}" class="item-flex">
                    <i class='bx bx-star'></i>
                    <span> {{ __('adminstaticword.Featured') }} {{ __('adminstaticword.Course') }}</span>
                </a>
            </li>
            @endif

            @if(isset($zoom_enable) && $zoom_enable == 1)
            <li
                class="{{ Nav::isRoute('meeting.create') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('zoom.setting') }} {{ Nav::isRoute('zoom.index') }}  treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bxl-zoom'></i>
                        <span>{{ __('adminstaticword.ZoomLiveMeetings') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('zoom.setting') }}">
                        <a href="{{route('zoom.setting')}}">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.ZoomSettings') }}</span>
                        </a>
                    </li>
                    <li
                        class="{{ Nav::isRoute('zoom.index') }} {{ Nav::isRoute('zoom.show') }} {{ Nav::isRoute('zoom.edit') }} {{ Nav::isRoute('meeting.create') }}">
                        <a href="{{route('zoom.index')}}">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.ZoomDashboard') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(isset($gsetting) && $gsetting->bbl_enable == 1)
            <li class="{{ Nav::isRoute('bbl.all.meeting') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-message-square-dots'></i>
                        <span>{{ __('adminstaticword.BigBlueMeetings') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('bbl.all.meeting') }}">
                        <a href="{{ route('bbl.all.meeting') }}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.ListMeetings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            <li class="{{ Nav::isRoute('pending.payout') }} {{ Nav::isRoute('admin.completed') }} treeview">
                <a href="#" class="flex-between">
                    <div class="item-flex">
                        <i class='bx bx-dollar-circle'></i>
                        <span>{{ __('adminstaticword.MyRevenue') }}</span>
                    </div>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Nav::isRoute('pending.payout') }}">
                        <a href="{{route('pending.payout')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.PendingPayout') }}</span>
                        </a>
                    </li>

                    <li class="{{ Nav::isRoute('admin.completed') }}">
                        <a href="{{route('admin.completed')}}" class="item-flex">
                            <i class='bx bx-chevron-left'></i>
                            <span>{{ __('adminstaticword.CompletedPayout') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if(isset($isetting))

            <li class="{{ Nav::isRoute('instructor.pay') }}">
                <a href="{{route('instructor.pay')}}" class="item-flex">
                    <i class='bx bx-money'></i>
                    <span>{{ __('adminstaticword.PayoutSettings') }}</span>
                </a>
            </li>

            @endif
        <ul>
        @endif
    </section>
    <!-- /.sidebar -->
</aside>