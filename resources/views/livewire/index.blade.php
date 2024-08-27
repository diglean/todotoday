<div class="flex flex-col md:flex-row">
  <div class="flex flex-col items-center pt-5 pb-10 rounded-xl bg-white md:pl-2 md:pr-2">
    @if ($user)
      <livewire:datatable-tasks :user_id="$user->id" data_type="tasks" title="Tarefas atribuídas a você"/>
    @else
      <div class="flex flex-col items-center mr-6 ml-6">
        <h1 class="font-bold text-xl text-center">Bem Vindo ao TodoToday, sua aplicação para criar lista de tarefas super organizadas.</h1>
        <span class="text-center">Faça seu <a href="user/login" class="text-blue-500">Login</a> para registrar suas tarefas.</span>
        <h1 class="text-center">Ainda não tem uma conta? faça seu <a class="text-blue-500" href="/user/create">Registro</a></h1>
        <h1 class="text-center">ou</h1>
        <a href="/task/create" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-colors">Criar nova tarefa</a>
      </div>
    @endif
  </div>
</div>
