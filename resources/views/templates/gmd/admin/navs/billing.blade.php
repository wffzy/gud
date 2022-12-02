<li class="header">Billing Module</li>
<li class="{{ ! starts_with(Route::currentRouteName(), 'admin.billing') ?: 'active' }}">
    <a href="{{ route('admin.billing') }}">
        <i class="fa fa-cog"></i> <span>General</span>
    </a>
</li>



