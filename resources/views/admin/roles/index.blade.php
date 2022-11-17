<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl w-full sm:w-full md:w-3/4">{{ __('Role Adminitration Panel') }}</h2>
    </x-slot>

    <div class="container mt-10">
        <div class="card mx-auto w-full md:w-1/2 text-center">
            <div class="card-header bg-primary text-white">
                <div class="card-title flex justify-between items-center">
                    <h4>
                        {{ __('list of roles') }}
                    </h4>

                <a href="{{ route('roles.create') }}" class="text-white cursor-pointer" title="{{ __('add role') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </a>
                </div>
            </div>
            <div class="card-body">
                <table id="role" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td width="20%">{{ $role->id }}</td>
                            <td width="60%">{{ $role->name }}</td>
                            <td width="20%" class="flex justify-between text-center mx-auto w-full">
                                <a href="{{ route('roles.show',$role->id) }}" class="text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                      </svg>
                                </a>
                                <a href="{{ route('roles.edit',$role->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                      </svg>
                                </a>

                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST" class="text-red-600">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                                      </svg>
                                    </button>

                                </form>
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>





    @push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
    $('#role').DataTable({
      "columnDefs": [{
          "targets":[2],
          "orderable":false
      }]

    });
setTimeout(function(){
    $('#alert').remove()
},300)

} );
    </script>

    @endpush
</x-admin-layout>
