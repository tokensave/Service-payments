@php($currencies = App\Services\Currencies\Models\Currency::getCashed())

<ul class="navbar-nav mb-2 mb-lg-0">
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ currency() }}
        </a>

        <ul class="dropdown-menu">
            @foreach($currencies as $currency)
                <li>
                    <a href="{{ route('currency', $currency) }}" class="dropdown-item">
                        {{ $currency->id }}
                    </a>
                </li>
            @endforeach
        </ul>

    </li>
</ul>
