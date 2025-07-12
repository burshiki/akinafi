<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-wifi"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->


    @if (!tenant())
        <x-partials.nav-item route='admin.dashboard' label='Dashboard' icon='fas fa-fw fa-tachometer-alt' />
        <x-partials.nav-item route='admin.config' label='Config' icon='fas fa-fw fa-cog' />
    @else
        <x-partials.nav-item route='client.dashboard' label='Dashboard' icon='fas fa-fw fa-tachometer-alt' />
        {{-- <x-partials.nav-item route='client.balance' label='Balance' icon='fas fa-fw fa-wallet' /> --}}
        {{-- <x-partials.nav-item route='client.vouchers' label='Vouchers' icon='fas fa-fw fa-ticket-alt' /> --}}
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Hotspot
        </div>
        <x-partials.nav-tree label="Vouchers" icon='fas fa-fw fa-ticket-alt' route="client.vouchers">
            <x-partials.nav-tree-item route='client.vouchers.list' label='Generated' />
            <x-partials.nav-tree-item route='client.vouchers.active' label='Active' />
            <x-partials.nav-tree-item route='client.vouchers.used' label='Used' />
            <x-partials.nav-tree-item route='client.vouchers.profiles' label='Profile' />
        </x-partials.nav-tree>
        <x-partials.nav-tree label="Reseller" icon='fas fa-fw fa-users' route="client.reseller">
            <x-partials.nav-tree-item route='client.reseller.list' label='List' />
        </x-partials.nav-tree>
        <x-partials.nav-item route='client.voucher.template' label='Templates' icon='fas fa-fw fa-ticket-alt' />
        <x-partials.nav-item route='client.fairuse.list' label='Fair Use Policy' icon='fas fa-fw fa-list-ol' />
        <hr class="sidebar-divider">
        <x-partials.nav-item route='client.sales' label='Sales' icon='fas fa-fw fa-money-bill-alt' />
        <x-partials.nav-item route='client.gcash' label='GCash' icon='fas fa-fw fa-mobile-alt' />
        {{-- <x-partials.nav-tree label="Credits" icon='fas fa-fw fa-coins' route="client.credits">
        <x-partials.nav-tree-item route='client.credits.transactions' label='Transaction' />
    </x-partials.nav-tree> --}}

        <x-partials.nav-item route='client.config' label='Config' icon='fas fa-fw fa-cog' />

        <!-- Divider -->
    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    @if (!tenant())
        {{-- <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
                more!</p>
            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
        </div> --}}
    @endif

</ul>
<!-- End of Sidebar -->
