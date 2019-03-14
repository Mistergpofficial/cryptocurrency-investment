{{--
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header" style="background-color:#0e92c3;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">Prime Crypto</a>
    </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Joined {{ Auth::user()->created_at->diffForHumans() }} &nbsp; <a  href="javascript:;"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger square-btn-adjust">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</nav>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation" >
    <div class="sidebar-collapse" style="background-color: #0e92c3;">
        <ul class="nav" id="main-menu">
            @if(Auth()->user()->pro_pic == "")
            <li class="text-center">
                <img src="{!! asset('images/find_user.png') !!}" class="user-image img-responsive"/>
                @else
                    <img class="profile-user-img img-responsive img-bordered" src="{!! asset('crypto_images/' . Auth()->user()->pro_pic) !!}" alt="User profile picture" style="width:200px;">
            </li>
            @endif

            @if(Auth::user()->role_id == 2)
            <li>
                <a class="active-menu"  href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard fa-3x"></i><i class="icon-speedometer"></i>User Dashboard</a>
            </li>
            <li>
                <a  href="{{ route('user.transaction') }}"><i class="fa fa-exchange fa-3x"></i>Transaction</a>
            </li>

                <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Fund<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.deposit') }}">Deposit Fund</a>
                    </li>
                    <li>
                        <a href="{{ route('user.withdraw') }}">Withdraw Fund</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user-plus fa-3x"></i>Account<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.profile') }}">User Account</a>
                    </li>
                    <li>
                        <a href="{{ route('user.referrals') }}">Referrals</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Contact<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.message') }}">Write a Message</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out fa-3x"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
                @else
                @if(Auth::user()->role_id == 1)
                    <li>
                        <a class="active-menu"  href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard fa-3x"></i><i class="icon-speedometer"></i>Admin Dashboard</a>
                    </li>
                    <li>
                        <a  href="{{ route('user.transactions') }}"><i class="fa fa-exchange fa-3x"></i>View Transactions</a>
                    </li>

                    <li>
                        <a  href="{{ route('user.withdrawals') }}"><i class="fa fa-exchange fa-3x"></i>View Withdrawals</a>
                    </li>

                    <li>
                        <a  href="{{ route('user.manage-users') }}"><i class="fa fa-user fa-3x"></i>Manage Users</a>
                    </li>

                    <li>
                        <a href="{{ route('user.profile') }}"><i class="fa fa-user-plus fa-3x"></i>Admin Account</a>
                    </li>


                    <li>
                        <a href="javascript:;"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out fa-3x"></i>Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                @endif


        </ul>

    </div>

</nav>--}}
<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="http://themepixels.me/bracket/app/"><span>[</span>bracket<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto ps ps--theme_default ps--active-y" data-ps-id="c5df6fde-6f19-8daa-f46f-08329bea7891">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="http://themepixels.me/bracket/app/index.html" class="br-menu-link active">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="http://themepixels.me/bracket/app/mailbox.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Mailbox</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="http://themepixels.me/bracket/app/card-dashboard.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Cards &amp; Widgets</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">UI Elements</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/accordion.html" class="nav-link">Accordion</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/alerts.html" class="nav-link">Alerts</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/buttons.html" class="nav-link">Buttons</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/cards.html" class="nav-link">Cards</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/icons.html" class="nav-link">Icons</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/modal.html" class="nav-link">Modal</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/pagination.html" class="nav-link">Pagination</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/progress.html" class="nav-link">Progress</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/spinners.html" class="nav-link">Spinners</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/typography.html" class="nav-link">Typography</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
                <span class="menu-item-label">Navigation</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/navigation.html" class="nav-link">Basic Nav</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/navigation-layouts.html" class="nav-link">Nav Layouts</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Charts</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-morris.html" class="nav-link">Morris Charts</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-flot.html" class="nav-link">Flot Charts</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-chartjs.html" class="nav-link">Chart JS</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-chartist.html" class="nav-link">Chartist</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-sparkline.html" class="nav-link">Sparkline</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/chart-peity.html" class="nav-link">Peity</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Forms</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-elements.html" class="nav-link">Form Elements</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-layouts.html" class="nav-link">Form Layouts</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-validation.html" class="nav-link">Form Validation</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-wizards.html" class="nav-link">Form Wizards</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-editor-code.html" class="nav-link">Code Editor</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/form-editor-text.html" class="nav-link">Text Editor</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Tables</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/table-basic.html" class="nav-link">Basic Table</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/table-datatable.html" class="nav-link">Data Table</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Maps</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/map-google.html" class="nav-link">Google Maps</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/map-leaflet.html" class="nav-link">Leaflet Maps</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/map-vector.html" class="nav-link">Vector Maps</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                <span class="menu-item-label">Utilities</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/background.html" class="nav-link">Background</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/border.html" class="nav-link">Border</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/height.html" class="nav-link">Height</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/margin.html" class="nav-link">Margin</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/padding.html" class="nav-link">Padding</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/position.html" class="nav-link">Position</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/typography-util.html" class="nav-link">Typography</a></li>
            <li class="nav-item"><a href="http://themepixels.me/bracket/app/width.html" class="nav-link">Width</a></li>
        </ul>
        <a href="http://themepixels.me/bracket/app/pages.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Apps &amp; Pages</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="http://themepixels.me/bracket/app/layouts.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>
                <span class="menu-item-label">Layouts</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="http://themepixels.me/bracket/app/sitemap.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
                <span class="menu-item-label">Sitemap</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
    </div><!-- br-sideleft-menu -->

    <label class="sidebar-label pd-x-15 mg-t-25 mg-b-20 tx-info op-9">Information Summary</label>

    <div class="info-list">
        <div class="d-flex align-items-center justify-content-between pd-x-15">
            <div>
                <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Memory Usage</p>
                <h5 class="tx-lato tx-white tx-normal mg-b-0">32.3%</h5>
            </div>
            <span class="peity-bar" data-peity="{ &quot;fill&quot;: [&quot;#336490&quot;], &quot;height&quot;: 35, &quot;width&quot;: 60 }" style="display: none;">8,6,5,9,8,4,9,3,5,9</span><svg class="peity" height="35" width="60"><rect fill="#336490" x="0.6" y="3.8888888888888893" width="4.800000000000001" height="31.11111111111111"></rect><rect fill="#336490" x="6.6" y="11.666666666666668" width="4.800000000000001" height="23.333333333333332"></rect><rect fill="#336490" x="12.6" y="15.555555555555554" width="4.799999999999999" height="19.444444444444446"></rect><rect fill="#336490" x="18.6" y="0" width="4.799999999999997" height="35"></rect><rect fill="#336490" x="24.599999999999998" y="3.8888888888888893" width="4.800000000000001" height="31.11111111111111"></rect><rect fill="#336490" x="30.6" y="19.444444444444443" width="4.799999999999997" height="15.555555555555557"></rect><rect fill="#336490" x="36.6" y="0" width="4.799999999999997" height="35"></rect><rect fill="#336490" x="42.6" y="23.333333333333336" width="4.799999999999997" height="11.666666666666664"></rect><rect fill="#336490" x="48.6" y="15.555555555555554" width="4.799999999999997" height="19.444444444444446"></rect><rect fill="#336490" x="54.6" y="0" width="4.799999999999997" height="35"></rect></svg>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
            <div>
                <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">CPU Usage</p>
                <h5 class="tx-lato tx-white tx-normal mg-b-0">140.05</h5>
            </div>
            <span class="peity-bar" data-peity="{ &quot;fill&quot;: [&quot;#1C7973&quot;], &quot;height&quot;: 35, &quot;width&quot;: 60 }" style="display: none;">4,3,5,7,12,10,4,5,11,7</span><svg class="peity" height="35" width="60"><rect fill="#1C7973" x="0.6" y="23.333333333333336" width="4.800000000000001" height="11.666666666666664"></rect><rect fill="#1C7973" x="6.6" y="26.25" width="4.800000000000001" height="8.75"></rect><rect fill="#1C7973" x="12.6" y="20.416666666666664" width="4.799999999999999" height="14.583333333333336"></rect><rect fill="#1C7973" x="18.6" y="14.583333333333332" width="4.799999999999997" height="20.416666666666668"></rect><rect fill="#1C7973" x="24.599999999999998" y="0" width="4.800000000000001" height="35"></rect><rect fill="#1C7973" x="30.6" y="5.833333333333332" width="4.799999999999997" height="29.166666666666668"></rect><rect fill="#1C7973" x="36.6" y="23.333333333333336" width="4.799999999999997" height="11.666666666666664"></rect><rect fill="#1C7973" x="42.6" y="20.416666666666664" width="4.799999999999997" height="14.583333333333336"></rect><rect fill="#1C7973" x="48.6" y="2.9166666666666714" width="4.799999999999997" height="32.08333333333333"></rect><rect fill="#1C7973" x="54.6" y="14.583333333333332" width="4.799999999999997" height="20.416666666666668"></rect></svg>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
            <div>
                <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Disk Usage</p>
                <h5 class="tx-lato tx-white tx-normal mg-b-0">82.02%</h5>
            </div>
            <span class="peity-bar" data-peity="{ &quot;fill&quot;: [&quot;#8E4246&quot;], &quot;height&quot;: 35, &quot;width&quot;: 60 }" style="display: none;">1,2,1,3,2,10,4,12,7</span><svg class="peity" height="35" width="60"><rect fill="#8E4246" x="0.6666666666666666" y="32.083333333333336" width="5.333333333333333" height="2.9166666666666643"></rect><rect fill="#8E4246" x="7.333333333333333" y="29.166666666666668" width="5.333333333333333" height="5.833333333333332"></rect><rect fill="#8E4246" x="14" y="32.083333333333336" width="5.333333333333332" height="2.9166666666666643"></rect><rect fill="#8E4246" x="20.666666666666668" y="26.25" width="5.333333333333332" height="8.75"></rect><rect fill="#8E4246" x="27.33333333333333" y="29.166666666666668" width="5.333333333333336" height="5.833333333333332"></rect><rect fill="#8E4246" x="34" y="5.833333333333332" width="5.333333333333336" height="29.166666666666668"></rect><rect fill="#8E4246" x="40.666666666666664" y="23.333333333333336" width="5.333333333333336" height="11.666666666666664"></rect><rect fill="#8E4246" x="47.333333333333336" y="0" width="5.333333333333329" height="35"></rect><rect fill="#8E4246" x="54" y="14.583333333333332" width="5.333333333333336" height="20.416666666666668"></rect></svg>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
            <div>
                <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Daily Traffic</p>
                <h5 class="tx-lato tx-white tx-normal mg-b-0">62,201</h5>
            </div>
            <span class="peity-bar" data-peity="{ &quot;fill&quot;: [&quot;#9C7846&quot;], &quot;height&quot;: 35, &quot;width&quot;: 60 }" style="display: none;">3,12,7,9,2,3,4,5,2</span><svg class="peity" height="35" width="60"><rect fill="#9C7846" x="0.6666666666666666" y="26.25" width="5.333333333333333" height="8.75"></rect><rect fill="#9C7846" x="7.333333333333333" y="0" width="5.333333333333333" height="35"></rect><rect fill="#9C7846" x="14" y="14.583333333333332" width="5.333333333333332" height="20.416666666666668"></rect><rect fill="#9C7846" x="20.666666666666668" y="8.75" width="5.333333333333332" height="26.25"></rect><rect fill="#9C7846" x="27.33333333333333" y="29.166666666666668" width="5.333333333333336" height="5.833333333333332"></rect><rect fill="#9C7846" x="34" y="26.25" width="5.333333333333336" height="8.75"></rect><rect fill="#9C7846" x="40.666666666666664" y="23.333333333333336" width="5.333333333333336" height="11.666666666666664"></rect><rect fill="#9C7846" x="47.333333333333336" y="20.416666666666664" width="5.333333333333329" height="14.583333333333336"></rect><rect fill="#9C7846" x="54" y="29.166666666666668" width="5.333333333333336" height="5.833333333333332"></rect></svg>
        </div><!-- d-flex -->
    </div><!-- info-lst -->

    <br>
    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; height: 602px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 421px;"></div></div></div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
