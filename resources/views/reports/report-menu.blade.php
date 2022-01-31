<ul class="nav nav-tabs nav-tabs-vertical flex-column mr-lg-3 wmin-lg-200 mb-lg-0 border-bottom-0">

    <li class="nav-item"><a href="/inventory/reports/sale" class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-sale-report") active @endif "><i class="icon-menu7 mr-2"></i> Sale Reports</a></li>

    <li class="nav-item"><a href="/inventory/reports/purchase" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-purchase-report") active @endif "><i class="icon-store2 mr-2"></i> Purchase Reports</a></li>
    <li class="nav-item"><a href="/inventory/reports/expenses" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-expense-report") active @endif "><i class="icon-store2 mr-2"></i> Expense Reports</a></li>

    <li class="nav-item"><a href="/inventory/reports/drug/usage" class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-drug-usage-report") active @endif " ><i class="icon-feed mr-2"></i> Drug Usage</a></li>
    <li class="nav-item"><a href="/inventory/reports/drug/stock" class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-drug-stock") active @endif "><i class="icon-stack3 mr-2"></i> Drug Stock Count</a></li>
    <li class="nav-item"><a href="/inventory/reports/drug/low/stock" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-low-drug-stock") active @endif  "><i class="icon-bell3 mr-2"></i> Low Stock Count</a></li>
    <li class="nav-item"><a href="/inventory/reports/drug/low/expiry" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-low-drug-expiry") active @endif  "><i class="icon-calendar2 mr-2"></i> Expiring Drugs</a></li>
   {{-- <li class="nav-item"><a href="#vertical-left-tab2" class="nav-link " data-toggle="tab"><i class="icon-certificate mr-2"></i> Inventory Audit Report</a></li>
    <li class="nav-item"><a href="#vertical-left-tab2" class="nav-link " data-toggle="tab"><i class="icon-cog4 mr-2"></i> Inventory Adjustments</a></li>
    <li class="nav-item"><a href="#vertical-left-tab2" class="nav-link " data-toggle="tab"><i class="icon-droplet mr-2"></i> Lab/Scan Items</a></li>
    <li class="nav-item"><a href="#vertical-left-tab2" class="nav-link " data-toggle="tab"><i class="icon-file-spreadsheet2 mr-2"></i> Revenue</a></li>--}}
    <li class="nav-item"><a href="/inventory/daily/collections" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-daily-collections") active @endif  "><i class="icon-price-tag mr-2"></i> Daily Collection</a></li>
    <li class="nav-item"><a href="/inventory/monthly/collections" class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-monthly-collections") active @endif  " ><i class="icon-calendar52 mr-2"></i> Monthly Collection</a></li>
    {{--<li class="nav-item"><a href="/invoices class="nav-link  @if(\Illuminate\Support\Facades\Route::currentRouteName()=="pharmacy-low-drug-expiry") active @endif  " data-toggle="tab"><i class="icon-cash mr-2"></i> Invoice Listings</a></li>--}}
</ul>