<div class="sidebar-inner slimscroll">

    <div id="sidebar-menu" class="sidebar-menu">

        @php
            $userId = Auth::id();

            $get_user_data = \Helper::get_user_data($userId);

            $get_permission_data = Helper::get_permission_data($get_user_data->role_id);

            $permission1 = [];

            if (
                is_object($get_permission_data) &&
                property_exists($get_permission_data, 'permission') &&
                $get_permission_data->permission !== ''
            ) {
                $permission1 = $get_permission_data->permission;
                $permission1 = explode(',', $permission1);
            } else {
                echo '';
                // Handle the case where $get_permission_data is not an object or 'permission' property is empty.
            }
        @endphp


        <ul>

            @if (in_array('1', $permission1))
                <li class="{{ request()->segment(1) == '' || request()->segment(1) == 'dashboard' ? 'active' : '' }}">

                    <a href="{{ url('/admin') }}"><i data-feather="home"></i> <span>Dashboard</span></a>

                </li>
            @endif

            @if (in_array('4', $permission1) ||
                    in_array('5', $permission1) ||
                    in_array('6', $permission1) ||
                    in_array('7', $permission1) ||
                    in_array('8', $permission1))

                @if (in_array('6', $permission1))
                    <li class="{{ request()->segment(2) == 'banner' ? 'active' : '' }}">
                        <a href="{{ route('banner.index') }}"
                            class="{{ request()->segment(2) == 'banner' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Banner</span></a>
                    </li>
                @endif

                @if (in_array('4', $permission1))
                    <li class="{{ request()->segment(2) == 'category' ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}"
                            class="{{ request()->segment(2) == 'category' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Category</span></a>
                    </li>
                @endif

                @if (in_array('5', $permission1))
                    <li class="{{ request()->segment(2) == 'popularproducts' ? 'active' : '' }}">
                        <a href="{{ route('popularproducts.index') }}"
                            class="{{ request()->segment(2) == 'popularproducts' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Popular Products</span></a>
                    </li>
                @endif

                @if (in_array('7', $permission1))
                    <li class="{{ request()->segment(2) == 'product' ? 'active' : '' }}">
                        <a href="{{ route('product.index') }}"
                            class="{{ request()->segment(2) == 'product' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Product</span></a>
                    </li>
                @endif

                @if (in_array('8', $permission1))
                    <li class="{{ request()->segment(2) == 'enquiries' ? 'active' : '' }}">
                        <a href="{{ route('enquiries.index') }}"
                            class="{{ request()->segment(2) == 'enquiries' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Enquiry Now</span></a>
                    </li>
                @endif
                @if (in_array('9', $permission1))
                    <li class="{{ request()->segment(2) == 'contact-us' ? 'active' : '' }}">
                        <a href="{{ route('contact-us.index') }}"
                            class="{{ request()->segment(2) == 'contact-us' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Contact Us</span></a>
                    </li>
                @endif
                @if (in_array('10', $permission1))
                    <li class="{{ request()->segment(2) == 'system' ? 'active' : '' }}">
                        <a href="{{ route('system.edit', 1) }}"
                            class="{{ request()->segment(2) == 'system' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>System</span></a>
                    </li>
                @endif
                @if (in_array('11', $permission1))
                    <li class="{{ request()->segment(2) == 'testimonial' ? 'active' : '' }}">
                        <a href="{{ route('testimonial.index') }}"
                            class="{{ request()->segment(2) == 'testimonial' ? 'active' : '' }}"><i
                                class="fa fa-file"></i><span>Testimonial</span></a>
                    </li>
                @endif
            @endif
            @if (in_array('2', $permission1) || in_array('3', $permission1))
                <li class="submenu">
                    <a href="#"
                        class="{{ request()->segment(1) == 'userpermission' || request()->segment(1) == 'adminuser' ? 'active' : '' }}"><i
                            data-feather="user"></i> <span> User Management</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        @if (in_array('2', $permission1))
                            <li class="{{ request()->segment(1) == 'userpermission' ? 'active' : '' }}">
                                <a href="{{ route('userpermission.index') }}">
                                    <i class="fa fa-hand-o-up"></i> User Permission
                                </a>
                            </li>
                        @endif
                        @if (in_array('3', $permission1))
                            <li class="{{ request()->segment(1) == 'adminuser' ? 'active' : '' }}">
                                <a href="{{ route('adminuser.index') }}"><i data-feather="lock"></i> Admin User
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


        </ul>

    </div>

</div>
