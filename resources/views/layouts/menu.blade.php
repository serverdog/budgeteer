<li class="{{ Request::is('accounttypes*') ? 'active' : '' }}">
    <a href="{{ route('accounttypes.index') }}"><i class="fa fa-edit"></i><span>Accounttypes</span></a>
</li>

<li class="{{ Request::is('accounts*') ? 'active' : '' }}">
    <a href="{{ route('accounts.index') }}"><i class="fa fa-edit"></i><span>Accounts</span></a>
</li>

<li class="{{ Request::is('currencies*') ? 'active' : '' }}">
    <a href="{{ route('currencies.index') }}"><i class="fa fa-edit"></i><span>Currencies</span></a>
</li>

<li class="{{ Request::is('liabilities*') ? 'active' : '' }}">
    <a href="{{ route('liabilities.index') }}"><i class="fa fa-edit"></i><span>Liabilities</span></a>
</li>

<li class="{{ Request::is('periods*') ? 'active' : '' }}">
    <a href="{{ route('periods.index') }}"><i class="fa fa-edit"></i><span>Periods</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('bills*') ? 'active' : '' }}">
    <a href="{{ route('bills.index') }}"><i class="fa fa-edit"></i><span>Bills</span></a>
</li>

<li class="{{ Request::is('billItems*') ? 'active' : '' }}">
    <a href="{{ route('billItems.index') }}"><i class="fa fa-edit"></i><span>Bill Items</span></a>
</li>

