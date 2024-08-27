<div class="flex flex-col items-center p-5 rounded-lg bg-white mr-2 max-h-56 shadow-lg">
  <div>
    <img class="w-[60px] rounded-full" src="{{ session('user_data.profile_picture_url') }}" alt="profile picture">
  </div>
  <div>
    {{ session('user_data.name') }}
  </div>
  &nbsp;
  <div>
    <a
      href="/"
      class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-all duration-300 ease-in-out"
    >
      Sair
    </a>
  </div>
</div>