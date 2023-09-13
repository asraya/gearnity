<li
class="sidebar-item  has-sub">
<a href="#" class='sidebar-link'>
    <i class="bi bi-stack"></i>
    <span>Master</span>
</a>
<ul class="submenu ">
    <li class="submenu-item ">
        <a href="{{ route('backend.master.blog.index') }}">{{ __('sidebar.blog') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.master.category.index') }}">{{ __('sidebar.category') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.master.user.index') }}">{{ __('sidebar.user') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.master.reward.index') }}">{{ __('sidebar.reward') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.master.voucher.index') }}">{{ __('sidebar.voucher') }}</a>
    </li>
</ul>
</li>