@if (AUTH::user()->roles == 'ADMIN')
    <ul class="min-h-full space-y-2">
        <li><a href="{{ route('dashboard-admin') }}"
                class=" hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>
        <li><a href="{{ route('banners.index') }}"
                class=" hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/banners*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-images"></i>Banners</a>
        </li>
        <li><a href="{{ route('products.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/products*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-store"></i>Products</a>
        </li>
        <li><a href="{{ route('category.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/category*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-list-ol"></i>Categories Product</a>
        </li>
        <li><a href="{{ route('payment-methods.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/payment-method*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-credit-card fa-sm"></i>Payment Method</a>
        </li>
        <li><a href="{{ route('transactions.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/transactions*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-money-bill-wave fa-sm"></i>Transactions</a>
        </li>
        <li><a href="{{ route('users-admin.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/users-admin*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-users"></i>User</a>
        </li>
    </ul>
@else
    <ul class="min-h-full space-y-2">
        <li><a href="{{ route('dashboard-cashier') }}"
                class=" hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('cashier') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>

        <li><a href="{{ route('transactions-cashier.index') }}"
                class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('cashier/transactions*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-money-bill-wave fa-sm"></i>Transactions</a>
        </li>

    </ul>
@endif
