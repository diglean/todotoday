<div>
  <form action="">
    <div class="flex flex-col items-center pl-10 pr-10 pt-5 pb-10 rounded-xl bg-white">
      <h1 class="text-xl">Registre-se</h1>
      <span class="mb-5">Já é cadastrado? <a class="text-blue-500" href="/user/login">Entre</a></span>
      @error('name') <span class="error">{{ $message }}</span> @enderror
      <input wire:model="name" type="text" placeholder="Nome" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2">
      @error('email') <span class="error">{{ $message }}</span> @enderror
      <input wire:model="email" type="email" placeholder="Email" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2">
      @error('password') <span class="error">{{ $message }}</span> @enderror
      <input wire:model="password" type="password" placeholder="Senha" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2">
      @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
      <input wire:model="confirm_password" type="password" placeholder="Confirmar Senha" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2">

      <button wire:click.prevent="createUser" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-colors">Registrar-se</button>
    </div>
  </form>
</div>
