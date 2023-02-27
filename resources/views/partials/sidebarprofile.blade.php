<div class="col-span-2 hidden sm:block">
    <ul>
      <li class="mt-5 cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700 {{ request()->is('profile') ? 'border-l-blue-700 text-blue-700' : '' }}"><a href="/profile">My Profile</a></li>
      <li class="mt-5 cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700 {{ request()->is('profile/change-password') ? 'border-l-blue-700 text-blue-700' : '' }}"><a href="/profile/change-password"> Change Password </a></li>
      <li class="mt-5 cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">My Booking</li>
      <li class="mt-5 cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Waiting for payment</li>
    </ul>
  </div>