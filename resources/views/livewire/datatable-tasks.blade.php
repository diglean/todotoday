<div class="overflow-x-auto mr-3 ml-3 flex flex-col items-center">

  <h1 class="font-bold text-xl mb-5">{{ $title ?? 'Dados Registrados' }}</h1>
  @if ($table_data->count() > 0)
    <div class="overflow-hidden rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full bg-white w-full">
        <thead class="bg-gray-100 divide-y divide-gray-200">
          <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Nome</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Categoria</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Descrição</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Criado em</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Estado</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">Ação</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach ($table_data as $value)
            <tr>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">{{ $value->name }}</td>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">{{ $value->category->translate() }}</td>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">{{ $value->description }}</td>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">{{ $value->created_at->format('d/m/Y H:i') }}</td>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">{{ $value->status->translate() }}</td>
              <td class="py-3 px-4 text-gray-700 truncate max-w-xs">
                <a href="/task/create/{{ $value->id }}/{{ $user_id }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" /><path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" /></svg></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="overflow-hidden rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full bg-white w-full">
        <thead class="bg-gray-100 divide-y divide-gray-200">
          <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600 rounded-t-lg">
              Não há nenhuma tarefa atribuída a você
            </th>
          </tr>
        </thead>
      </table>
    </div>
  @endif
  <div class="mt-10">
    {{ $table_data->links('vendor.livewire.tailwind') }}
  </div>
  &nbsp;
  <a
    href="/task/create/{{$user_id}}"
    class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-900 text-white font-semibold rounded-full shadow-md hover:from-blue-900 hover:to-blue-600 transition-all duration-300 ease-in-out"
  >
    Criar nova
  </a>
</div>