<div class="flex flex-row">
  <form action="">
    <div class="flex flex-col items-center p-10 rounded-xl bg-white shadow-lg">


      <h1 class="mb-5 text-xl">{{ $task_id ? 'Editar tarefa' : 'Criar tarefa' }}</h1>
      
      
      @if (session()->has('message'))
        <div class="{{ session('message.class') }} mb-2">
          {{ session('message.text') }}
        </div>
      @endif

      <div class="grid grid-cols-2 gap-1">
        <div>
          <label for="name">Nome</label>
          @error('name') <span class="error">{{ $message }}</span> @enderror
          <input
            id="name"
            wire:model="name"
            type="text"
            maxLength="30"
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2"
          >
        </div>
  
        <div>
          <label class="block" for="category">Categoria</label>
          @error('category') <span class="error">{{ $message }}</span> @enderror
          <select
            id="category"
            wire:model="category"
            placeholder="Categoria"
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2"
          >
            <option value="chore" selected>Tarefa</option>
            <option value="feature">Implementação</option>
            <option value="fix">Conserto</option>
            <option value="service_request">Requis. Trabalho</option>
          </select>
        </div>
  
        <div>
          <label class="block" for="status">Estado</label>
          @error('status') <span class="error">{{ $message }}</span> @enderror
          <select
            id="status"
            wire:model="status"
            placeholder="Estado"
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2"
          >
            <option value="chore" selected>Tarefa</option>
            <option value="canceled">Cancelado</option>
            <option value="doing">Fazendo</option>
            <option value="done">Feito</option>
            <option value="pending">Pendente</option>
            <option value="overdue">Vencida</option>
          </select>
        </div>
  
        <div>
          <label class="block" for="overdue_date">Data de vencimento</label>
          @error('overdue_date') <span class="error">{{ $message }}</span> @enderror
          <input
            id="overdue_date"
            wire:model="overdue_date"
            type="date"
            class="appearance-none w-full py-2 px-4 bg-gray-100 text-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent mb-2"
          >
        </div>
      </div>

      <label class="block" for="description">Descrição</label>
      @error('description') <span class="error">{{ $message }}</span> @enderror
      <textarea
        id="description"
        wire:model="description"
        placeholder="Descrição"
        maxLength="100"
        class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent shadow-sm transition-shadow mb-2 resize-none"
      ></textarea>


      @if ($task_id)
        <div class="flex flex-row">
          <button
            wire:click.prevent="deleteTask"
            class="mt-5 px-6 py-2 bg-gradient-to-r from-red-500 to-red-900 text-white font-semibold rounded-full shadow-md hover:from-red-900 hover:to-red-600 transition-colors"
          >
            Excluir tarefa
          </button>
          &nbsp;
          <button
            wire:click.prevent="updateTask"
            class="mt-5 px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-colors"
          >
            Editar tarefa
          </button>
        </div>
      @else
        <button
          wire:click.prevent="createTask"
          class="mt-5 px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-colors"
        >
          Criar tarefa
        </button>
      @endif

      @script
        <script>
            $wire.on('toast:success', function(toast) {
              toastr.success(toast.message, null, {
                progressBar: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                positionClass: 'toast-bottom-left'
              });
            });

            $wire.on('toast:error', function(toast) {
              toastr.error(toast.message, null, {
                progressBar: true,
                showMethod: 'slideDown',
                hideMethod: 'slideUp',
                positionClass: 'toast-bottom-left'
              });
            });
        </script>
      @endscript
    </div>
  </form>
</div>
