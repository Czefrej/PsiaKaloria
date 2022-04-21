<div class="account-sidebar">
    <div class="title text-left mb-md-5">
        <h2 class="title-sm-mobile">Moje konto</h2>
    </div>
    <div class="nav-wrapper">
        <ul class="m-0 p-0">
            <li><a href="{{route("account.settings")}}" @if(Route::current()->getName() == 'account.settings') class="active" @endif>Ustawienia</a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->role != "shelter")
                <li><a href="{{route("account.create-user")}}" @if(Route::current()->getName() == 'account.create-user') class="active" @endif>Dodaj użytkownika</a></li>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role != "shelter")
                <li><a href="{{route("account.shelters")}}" @if(Route::current()->getName() == 'account.shelters') class="active" @endif>Schroniska</a></li>
            @endif
            <li><a href="{{route("account.purchase-history")}}" @if(Route::current()->getName() == 'account.purchase-history') class="active" @endif>Historia zakupów</a></li>
            <li><a href="{{route("account.subscriptions")}}" @if(Route::current()->getName() == 'account.subscriptions') class="active" @endif>Moje subskrypcje</a></li>
        </ul>
    </div>
</div>
